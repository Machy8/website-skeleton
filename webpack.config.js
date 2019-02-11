let
	miniCssExtractPlugin = require('mini-css-extract-plugin'),

	assetsDir = './public/assets',
	assetsFrontDir = assetsDir + '/front',
	assetsFrontSassDir = assetsFrontDir + '/sass',
	outputDir = __dirname + '/public/webtemp';


module.exports = function (env) {
	env = env || {};

	return {
		mode: env.mode || 'production',
		devtool: '#eval-source-map',
		performance: {hints: false},
		plugins: [
			new miniCssExtractPlugin({
				filename: '_[name].css',
				chunkFilename: '_[id].css'
			})
		],
		output: {
			path: outputDir,
			publicPath: '/webtemp',
			filename: '_[name].js'
		},
		module: {
			rules: [
				{
					test: /\.(css|scss|sass)$/,
					use: [
						miniCssExtractPlugin.loader,
						{loader: 'css-loader', options: {importLoaders: 1}},
						{loader: 'postcss-loader', options: {plugins: () => [
							require('autoprefixer'),
							require('postcss-clean')
						]}},
						'sass-loader'
					]
				},
				{
					test: /\.(png|jpg|gif|svg|eot|ttf|woff|woff2|webp)$/,
					loader: 'file-loader'
				}
			]
		},
		entry: {

		}
	}
};
