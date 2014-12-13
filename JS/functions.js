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

    $('#username').keyup(function(){
        var username = $('#username').val();
        var wordCounter = username.match(/(\w+)/g).length;
        var validWordLength = false;
        var validWordsCount = false;

        if(wordCounter > 1){
            $('#user-length').show();
            validWordsCount = false;
        } else{
            $('#user-length').hide();
            validWordsCount = true;
        }

        if(username.length < 3){
            $('#userCharacter-length').show();
            validWordLength = false;
        } else{
            $('#userCharacter-length').hide();
            validWordLength = true;
        }

        if(validWordLength && validWordsCount){
            $('#positive-user').show('fast');
            $('#negative-user').hide();
        }else{
            $('#positive-user').hide();
            $('#negative-user').show('fast');
        }
    });
});