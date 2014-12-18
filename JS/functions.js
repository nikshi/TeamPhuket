$(document).ready(function(){
    $('#registerButton').attr("disabled", false);

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

        if(wordCounter > 1 || username.indexOf(" ") > 0){
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

    $('#email').keyup(function(){
        var email = $('#email').val();

        var pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if(pattern.test(email)){
            $('#positive-email').show('fast');
            $('#negative-email').hide();
        } else{
            $('#positive-email').hide();
            $('#negative-email').show('fast');
        }
    });

});

function showCommentForm(id) {
    var button = document.getElementById('btn-' + id);
    var form = document.getElementById('comment-form-' + id);
    if (button.innerHTML == 'Write a comment') {
        form.removeAttribute('style');
        button.innerHTML = 'Hide comment form';
    } else {
        button.innerHTML = 'Write a comment';
        form.setAttribute('style', 'display:none;');
    }
}

function removeComments(id){
    var comment = document.getElementById('comment' + id);
    document.getElementById('comments').removeChild(comment);
}

function confirmDelete() {
    if (confirm('Are you sure you want to delete this?')) {
        //Make ajax call
        $.ajax({
            url: "scriptDelete.php",
            type: "POST",
            data: {id : 5},
            dataType: "html",
            success: function() {
                alert("It was succesfully deleted!");
            }
        });

    }
}