const path = require( 'path' );
const defaultConfig = require( '@wordpress/scripts/config/webpack.config.js' );

module.exports = {
	...defaultConfig,
	...{
		entry: {
			index: `./src/index.js`,
			compensation: './src/compensation/index.js',
		},

		output: {
			path: __dirname + `/build`,
			filename: `[name].js`,
		},
	},
};
