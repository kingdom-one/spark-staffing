const path = require( 'path' );
const defaultConfig = require( '@wordpress/scripts/config/webpack.config.js' );

module.exports = {
	...defaultConfig,
	...{
		entry: {
			index: `./src/index.js`,
			compensation: './scss/pages/compensation-survey.scss',
		},

		output: {
			path: __dirname + `/build`,
			filename: `[name].js`,
		},
	},
};
