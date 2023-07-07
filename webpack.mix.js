let mix = require('laravel-mix');

mix.copy('resources/admin/images', 'public/assets/admin/images');
mix.copy('resources/admin/fonts', 'public/assets/admin/fonts');

mix.sass('resources/admin/css/app.scss', 'public/assets/admin/css/app.css')
    .js('resources/admin/js/app.js', 'public/assets/admin/js/app.js')
    .vue()
    .version();

mix.scripts([
        // 'public/admin/js/build.js',
        'public/assets/admin/js/vendor/jquery-ui.min.js',
//         'public/admin/js/vendor/fullcalendar.min.js',
//         'public/admin/js/vendor/Chart.bundle.min.js',
//         'public/admin/js/vendor/jquery.dataTables.js',
//         'public/admin/js/vendor/jquery-jvectormap-1.2.2.min.js',
//         'public/admin/js/vendor/jquery-jvectormap-world-mill-en.js',
//         'public/admin/js/vendor/dataTables.bootstrap4.js',
//         'public/admin/js/vendor/dataTables.responsive.min.js',
//         'public/admin/js/vendor/dataTables.buttons.min.js',
//         'public/admin/js/vendor/dataTables.keyTable.min.js',
//         'public/admin/js/vendor/dataTables.select.min.js',
    ],
    'public/assets/admin/js/app.js'
);
