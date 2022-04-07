<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description', 255)->nullable();
            $table->string('link')->nullable();
            $table->string('link_title')->nullable();
            $table->jsonb('technologies')->nullable();
            $table->string('image')->nullable();
            $table->unsignedInteger('owner_id')->require();
            $table->unsignedInteger('order');
            $table->boolean('active')->default(0);
            $table->boolean('featured');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
