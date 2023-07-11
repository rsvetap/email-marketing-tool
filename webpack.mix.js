let mix = require('laravel-mix');

mix.copy('resources/admin/images', 'public/assets/admin/images');
mix.copy('resources/admin/fonts', 'public/assets/admin/fonts');

mix.sass('resources/admin/css/app.scss', 'public/assets/admin/css/app.css')
    .js('resources/admin/js/app.js', 'public/assets/admin/js/app.js')
    .sourceMaps()
    .webpackConfig({devtool: 'inline-source-map'})
    .version();
