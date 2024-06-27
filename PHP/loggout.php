<?php
    include "conexao.php";

    // Limpar todas as variáveis de sessão
    session_unset();

    // Destruir a sessão
    session_destroy();

    header('Location: ../HTML/login.html');
    exit;
?>