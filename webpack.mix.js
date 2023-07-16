let mix = require('laravel-mix');

mix.copy('resources/admin/images', 'public/assets/admin/images');
mix.copy('resources/admin/fonts', 'public/assets/admin/fonts');

mix.sass('resources/admin/css/app.scss', 'public/assets/admin/css/build.css')
    .js('resources/admin/js/app.js', 'public/assets/admin/js/app.js')
    .sourceMaps()
    .webpackConfig({devtool: 'inline-source-map'})
    .version();

mix.styles([
        'public/assets/admin/css/build.css',
        'public/assets/admin/css/vendor/icons.css',
    ],
    'public/assets/admin/css/app.css'
);
