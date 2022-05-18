<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Imgproxy\UrlBuilder;
use League\MimeTypeDetection\ExtensionMimeTypeDetector;
use TCG\Voyager\Facades\Voyager;

class convertImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'image:convert {format}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert images to desired format';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        ini_set('max_execution_time', 1800);
        $detector = new ExtensionMimeTypeDetector();
        $fileNames = collect(Storage::disk(config('filesystems.default'))->allFiles());

        $oldNames = $fileNames->filter(function ($file) use ($detector, $fileNames) {

            $detectMT = fn ($file) => $detector->detectMimeTypeFromFile($file);
            $fileIsImg = str_contains($detectMT($file), 'image/');
            $hasSameMT = ($detectMT($file) === $detectMT('.' . $this->argument('format')));
            $desiredCopyExists = $fileNames->contains(rtrim($file, '.' . File::extension($file)) . $this->argument('format'));
            return ($fileIsImg && !$hasSameMT && !$desiredCopyExists);
        });

        $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();

        foreach ($oldNames as $oldName) {

            $domain = Voyager::model('Setting')->where('key', 'like', '%.domain')->first()->value;

            $builtUrl = (new UrlBuilder(config('imgproxy.base_url'), config('imgproxy.key'), config('imgproxy.salt')))
                ->build($domain . '/image/' . str_replace('/', '|', $oldName), 0, 0, 'force', 'no', false, $this->argument('format'))
                ->useAdvancedMode()
                ->toString();

            $content = Http::timeout(90)->get($builtUrl);

            if ($content->successful()) {

                $newName = \Str::replaceLast(File::extension($oldName), $this->argument('format'), $oldName);

                $saved = Storage::disk(config('voyager.storage.disk'))->put($newName, $content);

                if ($saved) {

                    foreach ($tables as $table) {
                        // $columns = \Schema::getColumnListing($table);
                        $records = DB::table($table)->get()->filter(function ($record) use ($oldNames) {
                            $contains = [];
                            foreach ($record as $feild) $contains[] = $oldNames->containsStrict(str_replace('\\', '/', $feild));
                            return count(array_filter($contains));
                        });

                        if ($records->isEmpty()) continue;

                        $records->transform(fn ($record) => str_replace('\\', '/', (array)$record));

                        foreach ($records as $record) {
                            $feilds = array_filter((array)$record, fn ($feild) => str_replace('\\', '/', $feild) === $oldName);
                            if (!$feilds) continue;
                            $update = [];
                            foreach ($feilds as $k => $v) $update[$k] = $newName;
                            $feildName = array_search($oldName, $feilds);
                            DB::table($table)->where($feildName, 'like', '%' . File::name($oldName) . '.' . File::extension($oldName))->update($update);
                        }
                    }
                    Storage::disk(config('voyager.storage.disk'))->delete($oldName);
                    dump([$oldName => 'Conversion Successful']);
                } else {
                    dump([$newName => 'Saving Failed']);
                    continue;
                }
            } else dump([
                $oldName => 'Conversion Failed',
                'builtUrl' => $builtUrl,
                'content' => $content->body()
            ]);
        }
    }
}
