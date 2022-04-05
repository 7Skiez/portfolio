const mix = require("laravel-mix");

require("laravel-mix-tailwind");
require("laravel-mix-purgecss");
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass("resources/sass/app.scss", "css")
    .js("resources/js/app.js", "js")
    .js("resources/js/settings.js", "js")
    .tailwind("./tailwind.config.js")
    .browserSync({
        watch: true,
        files: [
            "public/themes/tailwind/js/**/*",
            "public/themes/tailwind/css/**/*",
            "public/**/*.+(html|php)",
            "**/*.php",
        ],
        reloadDelay: 10,
        proxy: {
            target: "127.0.0.1:39",
            ws: true,
        },
    })
    .disableSuccessNotifications();
