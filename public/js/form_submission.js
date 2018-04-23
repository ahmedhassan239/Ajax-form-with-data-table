$('#form').submit(function(e) {
    e.preventDefault();
    var form = $(this);
    var button = $(this).find('button[type="submit"]');
    var btnOldText = button.text();
    var action = $(this).attr('action');
    var alertArea = $(this).find('#alert-area');

    var loading = button.attr('data-loading');
    button.html(loading);
    button.prop('disabled', true);

    var formData = new FormData($(this)[0]);

    $.ajax({
        url: action,
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(data) {
            alertArea.removeClass('alert-danger').addClass('alert-success').html(data.msg).show();
            button.html(btnOldText);
            // $(document).scrollTop(0);
            button.prop('disabled', false);
            if($('.scroll-to-top').length > 0){
                $('.scroll-to-top').click();
            }
            form.find('input[type="text"]').val("");
            table.ajax.reload();
        },
        error: function(data) {
            var error = JSON.parse(data.responseText);
            console.log(error);
            var errors = "";
            for (var key in error) {
                if (error.hasOwnProperty(key)) {
                    console.log(typeof(error[key]));
                    if (typeof(error[key]) == 'string') {
                        errors += error[key] + "<br>";
                    } else {
                        for (var index in error[key]) {
                            errors += error[key][index] + "<br>";
                        }
                    }
                }
            }
            alertArea.removeClass('alert-success').addClass('alert-danger').html(errors).show();
            button.html(btnOldText);
            button.prop('disabled', false);
            if($('.scroll-to-top').length > 0){
                $('.scroll-to-top').click();
            }
        }
    });
});
