$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});
var previousText = $('.submit_button').html();
$(document).on({
    ajaxStart: function() {
        $(".submit_button").html('<i class="fas fa-circle-notch fa-spin"></i> Processing...');
    },
    ajaxStop: function() {
        $(".submit_button").html(previousText);
    },
    ajaxError: function() {
        $(".submit_button").html(previousText);
    }
});


$('.formSubmited').submit(function(e) {
    e.preventDefault();
    var self = this;
    var action=$(this).attr('action');
    if (validateForm()) {
            $.ajax({
                type: 'POST',
                url:  action,
                dataType: "JSON",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(result) {
                    var message = (result,"message") ? result.message : "";
                    var type = (result,"type") ? result.type : 'error' ? result.type : 'success';
                    if (result.type=='error') {
                            toastr['error'](message, { showMethod: 'slideDown', hideMethod: 'slideUp', timeOut: 2000});
                    }else{
                        toastr['success'](message, { showMethod: 'slideDown', hideMethod: 'slideUp', timeOut: 2000});
                        setTimeout(function() { window.location.href ='/admin/role-list'; }, 1000);
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

const selectAll = document.querySelector('#selectAll'),
 checkboxList = document.querySelectorAll('[type="checkbox"]');
selectAll.addEventListener('change', t => {
 checkboxList.forEach(e => {
   e.checked = t.target.checked;
 });
});