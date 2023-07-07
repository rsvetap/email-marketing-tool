$(function () {

    $('.confirm-sync-form').click(function (event) {

        event.preventDefault();

        let button = $(this).find('button');
        let spinner = button.find('.fa-spinner');

        if (!confirm('Do you want to run the process?')) {
            return;
        }

        button.prop('disabled', true);
        spinner.removeClass('d-none');

        axios.post($(this).attr('action'), $(this).serialize())
            .then(function (response) {
                window.toastr.success(response.data.message);
            })
            .catch(function (error) {
                window.toastr.error(error.response.data.message);
            })
            .finally(function () {
                button.prop('disabled', false);
                spinner.addClass('d-none');
            });
    });

    $('.confirm-full-sync-form').click(function (event) {

        event.preventDefault();

        let button = $(this).find('button');
        let spinner = button.find('.fa-spinner');

        if (!confirm('Do you want to run the process?')) {
            return;
        }

        button.prop('disabled', true);
        spinner.removeClass('d-none');

        axios.post($(this).attr('action'), $(this).serialize())
            .then(function (response) {
                window.toastr.success(response.data.message);
            })
            .catch(function (error) {
                window.toastr.error(error.response.data.message);
            })
            .finally(function () {
                $('#dt-job-batches').DataTable().draw('full-reset');
                $('#dt-jobs').DataTable().draw('full-reset');
            });
    });

    $('.sluggable').on('input', function () {

        let str = $(this).val();

        // Use transliteration function to convert Cyrillic characters to Latin equivalents
        str = transliteration.transliterate(str);

        // Replace all special characters | symbols with a space
        str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();

        // Trim spaces at start and end of string
        str = str.replace(/^\s+|\s+$/gm, '');

        // Replace space with dash/hyphen
        str = str.replace(/\s+/g, '-');

        $($(this).attr('data-slug-target')).val(str);
    });
});