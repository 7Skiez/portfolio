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
    .js("resources/js/particles.js", "js")
    .webpackConfig({
        module: {
            rules: [
                {
                    test: /\.(js|jsx)$/,
                    exclude: /node_modules/,
                    use: {
                        loader: "babel-loader",
                    },
                },
                {
                    test: /\.js$/,
                    use: {
                        loader: "babel-loader",
                        options: {
                            presets: ["@babel/preset-env"],
                            plugins: ["@babel/plugin-syntax-dynamic-import"],
                        },
                    },
                    exclude: /node_modules/,
                },
                {
                    test: /three\/examples\/js/,
                    use: "imports-loader?THREE=three",
                },
                {
                    test: /\.(glsl|frag|vert)$/,
                    use: [
                        "glslify-import-loader",
                        "raw-loader",
                        "glslify-loader",
                    ],
                },
            ],
        },
    })
    .webpackConfig((webpack) => {
        return {
            plugins: [
                new webpack.ProvidePlugin({
                    THREE: "three",
                }),
            ],
        };
    })
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
