require('laravel-mix')

	.browserSync('http://127.0.0.1:8000/')

    .js('resources/assets/js/app.js', 'public/js/')

    .options({
      extractVueStyles: true
    })
