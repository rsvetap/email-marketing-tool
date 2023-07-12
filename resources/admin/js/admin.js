$(function () {

    $('.unwrap-block').on('click', function () {
        $('.wrapped-block').show();
        $('.unwrap-block').hide();
    });
    $('.wrap-block').on('click', function () {
        $('.wrapped-block').hide();
        $('.unwrap-block').show();
    });

    // SELECT2 INIT START

    $('.select2').each(function() {
        console.log($(this));
        $(this).select2();
    });

    // SELECT2 INIT END

    $('input[type="checkbox"]').change(function () {
        let value = $(this).is(':checked') ? 1 : 0;
        $(this).val(value)
    });
});
