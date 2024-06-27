// document.getElementById('loginForm').addEventListener('submit', function(event) {

//     event.preventDefault();

//     window.location.href = 'perfil.html';
// });


$(document).on('click','#criar_conta',function(e){
    e.preventDefault();
    var nome = $('[name=name]').val();
    var usuario = $('[name=username]').val();
    var senha = $('[name=password]').val();
    var nascimento = $('[name=birthday]').val();
    $.ajax({
        url:'../PHP/criarConta.php',
        type:'post',
        dataType:'json',
        data:{username:usuario, password:senha, nome:nome, dt_nascimento:nascimento},
        success:function(data){
            console.log(data)
            if(!data.success){
                alert(data.msg);
                return;
            }else{
                alert(data.msg);
                window.location.href = '../HTML/login.html';
            }
        },
    });
});