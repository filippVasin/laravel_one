$(document).ready(function () {
    $('#sendForm').on('submit', function (e) {
        e.preventDefault();
        $(".alert").addClass('none');
        $.ajax({
            type: 'POST',
            url: 'message/store',
            data: $('#sendForm').serialize(),
            success: function (result) {

                var result = jQuery.parseJSON(result);

                var plusMessage = '<div class="well"><h5>' + result['name'] + '</h5>' + result['text'] + '</div>';
                $("#list").prepend(plusMessage);

            },
            error: function (jqXhr, json, errorThrown) {
                var errors = jqXhr.responseJSON;
                var errorsHtml = '';
                $.each(errors['errors'], function (index, value) {
                    errorsHtml += value + '<br>';
                });
                $(".alert").removeClass('none');
                $(".alert").html(errorsHtml);
            }
        });
    });
});