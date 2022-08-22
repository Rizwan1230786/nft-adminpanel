$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});
var previousText = $('.submit_button').html();
$(document).on({
    ajaxStart: function () {
        $(".submit_button").html('<i class="fas fa-circle-notch fa-spin"></i> Processing...');
    },
    ajaxStop: function () {
        $(".submit_button").html(previousText);
    },
    ajaxError: function () {
        $(".submit_button").html(previousText);
    }
});


$('.formSubmited').submit(function (e) {
    e.preventDefault();
    var self = this;
    var action = $(this).attr('action');
    var data = new FormData(this);
    if (validateForm()) {
        $.ajax({
            type: 'POST',
            url: action,
            dataType: "JSON",
            data: data,
            processData: false,
            contentType: false,
            success: function (result) {
                var message = (result, "message") ? result.message : "";
                var type = (result, "type") ? result.type : 'error' ? result.type : 'success';
                if (result.type == 'error') {
                    toastr['error'](message, { showMethod: 'slideDown', hideMethod: 'slideUp', timeOut: 2000 });
                } else {
                    toastr['success'](message, { showMethod: 'slideDown', hideMethod: 'slideUp', timeOut: 2000 });
                    setTimeout(function () { window.location.href = '/admin/category/list'; }, 1000);
                }
            }
        });

    }
});
function validateForm() {
    var check = true;
    $('.validationForm').find(validate_input).each(function () {
        if (!$(this).hasClass('notrequired') && !$(this).val()) {
            check = false
            $(this).addClass('is-invalid');
        }
    });
    return check;
}

      // Select All checkbox click//
