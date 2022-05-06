
function createMessage(msg, type) {  
    $("#msg-alert").text(msg);
    var currentColor = $("#msg-alert").attr('data-color');
    $("#msg-alert").removeClass("alert-" + currentColor);
    $("#msg-alert").addClass("alert-" + type);
    $("#msg-alert").attr('data-color', type);
    $("#msg-alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
    });
}


$(document).on("click", ".deletePost", function () {
    var id = $(this).attr('data-id');
    var parent = $(this).parent().parent().parent();
    if (confirm('Are you sure ?')) {
        $.ajax({
            'url': '/api/post/' + id,
            'method': 'DELETE',
            success: function (data) { 
                createMessage('Deleted Post', 'danger');
                $(parent).remove();
            }
        })
    }
});

$(document).on("click", ".alert", function () {
    $(this).hide();
});

