import 'bootstrap/dist/js/bootstrap.bundle.min.js';
window._ = require('lodash');
window.$ = window.jQuery = require('jquery');
window.metisMenu = require('metismenu');
window.slimscroll = require('jquery-slimscroll');
window.select2 = require('select2');
window.moment = require('moment');
window.toastr = require('toastr');
window.axios = require('axios');
window.transliteration = require('transliteration');

// =====================================================================================================================
// Global configs
// =====================================================================================================================

// AXIOS
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
window.axios.defaults.headers.common['Accept-Language'] = $('html').attr('lang');

// DATATABLES
window.globalDataTableConfig = {
    keys        : true,
    processing  : true,
    serverSide  : true,
    searching   : true,
    fixedColumns: true,
    autoWidth   : false,
    responsive  : true,
    stateSave   : true,
    searchDelay : 500,
    order       : [[0, 'desc']],
    lengthMenu  : [[50, 100, 250, 500], [50, 100, 250, 500]],
    pageLength  : 250,
    language    : {
        paginate: {
            previous: '<i class="mdi mdi-chevron-left">',
            next    : '<i class="mdi mdi-chevron-right">'
        }
    },
};

// FLASH MESSAGES
window.toastr.options = {
    "closeButton"      : true,
    "debug"            : false,
    "newestOnTop"      : true,
    "progressBar"      : true,
    "positionClass"    : "toast-top-center",
    "preventDuplicates": true,
    "onclick"          : null,
    "showDuration"     : "300",
    "hideDuration"     : "1000",
    "timeOut"          : "6000",
    "extendedTimeOut"  : "1000",
    "showEasing"       : "swing",
    "hideEasing"       : "linear",
    "showMethod"       : "fadeIn",
    "hideMethod"       : "fadeOut"
};
