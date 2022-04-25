const mix = require("laravel-mix");

require("laravel-mix-tailwind");
require("laravel-mix-purgecss");
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

 mix.setPublicPath('../../../public/jd')
    .sass("./assets/sass/app.scss", "css")
    .js("./assets/js/app.js", "js")
    .js("../app/assets/js/settings.js", "js")
    .tailwind("./tailwind.config.js")
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
            resolve: {
                modules: [
                    path.resolve(__dirname, 'node_modules')
                ]
            },
            plugins: [
                new webpack.ProvidePlugin({
                    THREE: "three",
                }),
            ],
        };
    })
    // .browserSync({
    //     watch: true,
    //     files: [
    //         "../../../public/ivno/*",
    //         "../../../public/ivno/**/*",
    //         "../../../public/ivno/**/*.+(html|css|js)",
    //         "../../../**/*.php",
    //         "../../../**/**/*.php",
    //         "../../../**/**/**/*.php",
    //         "../app/*.php",
    //         "../app/**/*.+(php|css|scss|js)",
    //         "../vendor/**/**/*.+(php|css|scss|js)",
    //         "../vendor/**/*.php",
    //         "./*.php",
    //         "./**/*.+(php|css|scss|js)",
    //         "./**/*.+(php|css|scss|js)"
    //     ],
    //     reloadDelay: 100,
    //     proxy: {
    //         target: "127.0.0.1:40",
    //         ws: true,
    //     },
    // })
    .disableSuccessNotifications();
