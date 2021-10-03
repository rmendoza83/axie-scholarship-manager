const mix = require('laravel-mix');

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

mix.js('resources/js/app.ts', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    .webpackConfig(webpack => {
        return {
            module: {
                rules: [
                    // We're registering the TypeScript loader here. It should only
                    // apply when we're dealing with a `.ts` or `.tsx` file.
                    {
                        test: /\.tsx?$/,
                        // use: [
                        //     'vue-style-loader',
                        //     //'css-loader',
                        //     //'sass-loader'
                        // ],
                        loader: 'ts-loader',
                        options: {
                            appendTsSuffixTo: [/\.vue$/]
                        },
                        exclude: /node_modules/,
                    },
                    {
                        test: /\.vue$/,
                        loader: 'vue-loader',
                    }
                ],
            },
            resolve: {
                // We need to register the `.ts` extension so Webpack can resolve
                // TypeScript modules without explicitly providing an extension.
                // The other extensions in this list are identical to the Mix
                // defaults.
                extensions: ['*', '.js', '.jsx', '.vue', '.ts', '.tsx'],
            },
            plugins: [
                new webpack.DefinePlugin({
                    __VUE_OPTIONS_API__: false,
                    __VUE_PROD_DEVTOOLS__: false,
                }),
            ]
        }
    });
