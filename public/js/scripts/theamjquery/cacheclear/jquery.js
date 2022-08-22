$(document).on("click", ".cache-clear", function(event){
    event.preventDefault();
    var action=$(this).attr('href');
    $.ajax({
        type: 'GET',
        url: action,
        dataType: "JSON",
        success: function(result) {
            var message = (result,"message") ? result.message : "";
            var type = (result,"type") ? result.type : 'error' ? result.type : 'success';
            if (result.type=='error') {
                    toastr['error'](message, { showMethod: 'slideDown', hideMethod: 'slideUp', timeOut: 2000});
            }else{
                toastr['success'](message, { showMethod: 'slideDown', hideMethod: 'slideUp', timeOut: 3000});
                setTimeout(function() { window.location.href ='/admin/dashboard'; }, 3000);
            }
        }
    }); 
})