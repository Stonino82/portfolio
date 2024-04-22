// Configuración de Webpack

const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const TerserPlugin = require("terser-webpack-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');


module.exports = {
    // Modo de desarrollo o producción /comentado porqué esta definido en el script del package.json
    // mode: 'development',
    // Activar el modo de vigilancia /comentado porqué esta definido en el script del package.json
    // watch: true,
    // Archivos de entrada
    entry: ['./src/index.js'],
    // Mapas de origen
    devtool: 'source-map',
    // Archivos de salida
    output: {
        filename: 'bundle.min.js',
        path: path.resolve(__dirname, 'dist'),
    },
    // Cargadores
    module: {
        // Regla para archivos CSS
        rules: [
            {
                test: /\.(c|sc|sa)ss$/,
                use: [
                    // Extrae el código CSS de los archivos JavaScript
                    {
                        loader: MiniCssExtractPlugin.loader
                    },
                    // Cargador CSS estándar
                    {
                        loader: "css-loader",
                        options: {
                            sourceMap: true,
                            importLoaders: 2
                        },
                    },
                    // Cargador PostCSS
                    {
                        loader: 'postcss-loader',
                        options: {
                            postcssOptions: {
                                plugins: [
                                    [
                                        "autoprefixer",
                                        {
                                            overrideBrowserslist: ['last 2 versions', '> 1%']
                                        },
                                    ],
                                ],
                            },
                        },
                    },
                    // Cargador SASS
                    {
                        loader: "sass-loader",
                        options: {
                            sourceMap: true,
                        },
                    },
                ]
            }
        ]
    },
    // Optimizaciones
    optimization: {
        minimizer: [
            // Minificador de JavaScript
            new TerserPlugin(),
            // Minificador de CSS
            new CssMinimizerPlugin(),
        ],
        minimize: true,
    },
    // Plugins
    plugins: [
        // Extrae el código CSS de los archivos JavaScript
        new MiniCssExtractPlugin({
            filename: 'style.min.css'
        }),
        // Inicia un servidor de desarrollo
        new BrowserSyncPlugin({
            proxy: 'http://localhost/antoninolattene',
            files: ['./', './dist/*'],
            injectCss: true,
        },
            { reload: true, })
    ]
};