module.exports = {
    plugins: [
      require('autoprefixer')({
        browsers: 'last 5 versions'
      }),
      require('csswring')({
        preserveHacks: true
      })
    ]
}
