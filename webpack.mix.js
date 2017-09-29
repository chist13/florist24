require('laravel-mix')

	.browserSync('http://0.0.0.0:8000/')

    .js('resources/assets/js/app.js', 'public/js/')

    .options({
      extractVueStyles: true
    })
