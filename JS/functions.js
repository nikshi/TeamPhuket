$(document).ready(function(){
    $('#password').keyup(function(){
        var password = $('#password').val();
        var confirm_pass = $('#confirm-pass').val();

        if(password == confirm_pass){
            $('#positive-pass').show('fast');
            $('#negative-pass').hide();
        }else{
            $('#negative-pass').show('fast');
            $('#positive-pass').hide();
        }

        if(confirm_pass.length == 0 && password.length == 0){
            $('#negative-pass').hide();
            $('#positive-pass').hide();
        }

        if((password.length < 4) && (password.length > 0)){
            $('#pass-length').show();
        } else{
            $('#pass-length').hide();
        }

    });

    $('#confirm-pass').keyup(function(){
        var password = $('#password').val();
        var confirm_pass = $('#confirm-pass').val();

        if(password == confirm_pass){
            $('#positive-pass').show('fast');
            $('#negative-pass').hide();
        }else{
            $('#negative-pass').show('fast');
            $('#positive-pass').hide();
        }

        if(confirm_pass.length == 0 && password.length == 0){
            $('#negative-pass').hide();
            $('#positive-pass').hide();
        }
    });

    
});