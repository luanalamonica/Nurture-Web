<?php
    include "conexao.php";

    $usuario = $_POST['username'];
    $senha   = $_POST['password'];
    $retorno;

    $query = "SELECT * FROM usuario WHERE email = ? AND senha = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('ss', $usuario, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['id'] = $row['ID_USUARIO'];
        $retorno     = array('success'=>TRUE, 'type'=>'success', 'msg'=>'Usuário encontrado!');
    } else {
        $retorno     = array('success'=>FALSE, 'type'=>'danger', 'msg'=>'Usuário não encontrado!');
    }

    die(json_encode($retorno));
?>