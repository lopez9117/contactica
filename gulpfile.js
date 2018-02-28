var elixir = require('laravel-elixir');



elixir(function(mix) {
    mix.sass('app.scss');


    mix.scripts([

    	'node_modules/jquery/dist/jquery.js',
    	'node_modules/bootstrap-sass/assets/javascripts/bootstrap.js'
    	],'public/js/all.js','./')
});
