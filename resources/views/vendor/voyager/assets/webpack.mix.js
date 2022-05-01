const mix = require("laravel-mix");
let path = require("path");
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

mix.setPublicPath("../../../../../public/vendor/voyager")
    .js("./js/settings.js", "js")
    .webpackConfig({
        resolve: {
            modules: [path.resolve(__dirname, "node_modules")],
        },
    })
    .options({
        terser: {
            extractComments: false,
        },
    })
    .extract()
    .version()
    .disableSuccessNotifications();
