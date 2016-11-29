$(document).ready(function(){

    $('#login').on('click', function(e) {
        e.preventDefault();
        var email    = $('#email').val();
        var password = $('#password').val();
        $.ajax({
            url : 'public/app/login.php',
            type: 'POST',
            data : {
                email   : email,
                password: password
            },
            beforeSend: function(){
                $('#login_icon').removeClass();
                $('#login_icon').addClass('fa fa-spinner fa-spin');
            },
            success: function(data) {
                var obj = JSON.parse(data);
                console.log(obj);
                if(obj.success) {
                    location.replace('test.php');
                }else {
                    window.location.replace('');
                }
            },
            error: function (data) {
                console.log(data);
            }
        });
    });


});