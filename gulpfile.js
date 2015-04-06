var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
        .scripts([
            "resources/js/vendor/jquery/jquery-1.10.2.js",
            "resources/js/vendor/jquery/jquery-ui-1.10.4.custom.min.js",
            "resources/js/vendor/bootstrap/bootstrap.js",
            "resources/js/vendor/get-shit-done/gsdk-checkbox.js",
            "resources/js/vendor/get-shit-done/gsdk-checkbox.js",
            "resources/js/vendor/get-shit-done/gsdk-radio.js",
            "resources/js/vendor/get-shit-done/gsdk-bootstrapswitch.js",
            "resources/js/vendor/get-shit-done/get-shit-done.js",
            "resources/js/vendor/get-shit-done/custom.js",
            "resources/js/vendor/get-shit-done/login-register.js",
        ], "public/js/vendor.js", 'resources/js')
        .version(["js/vendor.js", "css/app.css"]);
});
