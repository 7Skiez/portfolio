<?php

/*
 * This file is part of Laravel HTMLMin.
 *
 * (c) Graham Campbell <graham@alt-three.com>
 * (c) Raza Mehdi <srmk@outlook.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Providers\HTMLMin\Minifiers;

/**
 * This is the blade minifier class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 * @author Trevor Fitzgerald <fitztrev@gmail.com>
 */
class BladeMinifier extends \HTMLMin\HTMLMin\Minifiers\BladeMinifier
{
    // /**
    //  * Should minification be forcefully enabled.
    //  *
    //  * @var bool
    //  */
    // protected $force;

    // /**
    //  * Create a new instance.
    //  *
    //  * @param bool $force
    //  *
    //  * @return void
    //  */
    // public function __construct($force)
    // {
    //     $this->force = $force;
    // }

    // /**
    //  * Get the minified value.
    //  *
    //  * All credit to Trevor Fitzgerald for the regex here.
    //  * See the original here: http://bit.ly/U7mv7a.
    //  *
    //  * @param string $value
    //  *
    //  * @return string
    //  */
    public function render($value)
    {
        if ($this->shouldMinify($value)) {
            $replace = [
                '/<!--[^\[](.*?)[^\]]-->/s' => '',
                "/<\?php/"                  => '<?php ',
                "/\n([\S])/"                => ' $1',
                "/\r/"                      => '',
                "/\n/"                      => '',
                "/\t/"                      => ' ',
                '/ +/'                      => ' ',

                "/>\n</"                    => '><',
                "/>\s+\n</"                 => '><',
                "/>\n\s+</"                 => '><',
                "/\>[\r\n ]+\</"            => '><',
                "/\s\s+/"                   => '',
                "/[\s+]?\=[\s+]?/"          => '=',
                "/[\s+]?\,[\s+]?/"          => ',',
                "/[\s+]?\:[\s+]?/"          => ':',
                "/[\s+]?\;[\s+]?/"          => ';',
                "/(?<=\")\s+(?=(\W|\w))/"   => '',
                "/(?<=\>)(\s+)(?=\<)/"      => '',
                "/(?<=\{)\s+(?=(\W|\w))/"   => '',
                "/(?<=\})\s+(?=(\W|\w))/"   => '',
                "/(?<=(\W|\w))\s+(?=\})/"   => '',
                "/(?<=(\W|\w))\s+(?=\{)/"   => ''
            ];

            $value = preg_replace(array_keys($replace), array_values($replace), $value);
        } else {
            // Where skip minification tags are used let's remove them from markdown or blade.
            $value = preg_replace("/<!--[\s]+skip\.minification[\s]+-->/", '', $value);
        }

        return toOneLine($value);
    }
}
