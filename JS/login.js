// document.getElementById('loginForm').addEventListener('submit', function(event) {

//     event.preventDefault();

//     window.location.href = 'sobreNos.html';
// });

$(document).on('click','#enviar_form',function(e){
    e.preventDefault();
    var usuario = $('[name=username]').val();
    var senha = $('[name=password]').val();
    $.ajax({
        url:'../PHP/login.php',
        type:'post',
        dataType:'json',
        data:{username:usuario, password:senha},
        success:function(data){
            if(!data.success){
                alert(data.msg);
                return;
            }else{
                window.location.href = '../HTML/sobreNos.html';
            }
        },
    });
});
