const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');

module.exports = {
  entry: path.resolve(__dirname, './src/js/main.js'),
  output: {
    path: path.resolve(__dirname, './public'),
    filename: './js/main.js'
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: './css/main.css'
    }),
    new HtmlWebpackPlugin({
      filename: './index.html',
      template: './src/index.ejs'
    })
  ],
  resolve: {
    extensions: [
      '.js'   // for style-loader
    ]
  },
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'postcss-loader',
          'sass-loader',
          'import-glob-loader'
        ]
      },
      {
        test: /\.(jpg|png|gif)$/,
        use: {
          loader: 'file-loader',
          options: {
            name: './images/[name].[ext]',
            outputPath: './',
            publicPath: path => '.' + path
          }
        }
      },
      {
        test: /\.ejs$/,
        use: [
          'html-loader',
          'ejs-html-loader'
        ]
      }
    ]
  }
}
