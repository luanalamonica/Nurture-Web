// document.getElementById('loginForm').addEventListener('submit', function(event) {

//     event.preventDefault();

//     window.location.href = 'login.html';
// });

$(document).on('click','#altera_senha',function(e){
    e.preventDefault();
    var usuario = $('[name=username]').val();
    var senha1 = $('[name=password1]').val();
    var senha2 = $('[name=password2]').val();
    if(senha1 == senha2){
        $.ajax({
            url:'../PHP/esqSenha.php',
            type:'post',
            dataType:'json',
            data:{username:usuario, password1:senha1, password2:senha2},
            success:function(data){
                if(!data.success){
                    alert(data.msg);
                    return;
                }else{
                    alert(data.msg);
                    window.location.href = '../HTML/login.html';
                }
            },
        });
    }else{
        alert('Senhas diferentes!!');
        return;
    }
    
});