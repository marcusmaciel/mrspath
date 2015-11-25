$(document).ready(function () {

});

function getDetails() {
    $.ajax({
        url: 'controllers/posts/posts.php',
        dataType: 'json',
        success: function (data, textStatus, jqXHR) {
            
        }
    });
}