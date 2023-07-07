$(function () {

    $('.unwrap-block').on('click', function () {
        $('#wrapped-block').show();
        $('.unwrap-block').hide();
    });
    $('.wrap-block').on('click', function () {
        $('#wrapped-block').hide();
        $('.unwrap-block').show();
    });

    // COMPANIES PAGE START
    // show form field according to the chosen company type
    $('#company-type').on('change', function () {
        console.log($('div[id^="#fields_"]'))
        $('div[id^="fields_"]').each(function (element) {
            $(this).hide();
        });

        $('#fields_' + $(this).val()).show();
    });
    if ($('#company-type').length > 0 && $('#company-type').val() !== '') {
        $('#fields_' + $('#company-type').val()).show();
    }
    // COMPANIES PAGE END

    // SELECT2 INIT START
    $('#managers_assigning').select2();
    $('#roles-multiselect').select2();
    // SELECT2 INIT END
});
