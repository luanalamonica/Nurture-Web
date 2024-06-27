<?php
    session_start();

    $response = array('logado' => false);

    if (isset($_SESSION['id'])) {
        $response['logado'] = true;
    }

    header('Content-Type: application/json');
    die(json_encode($response));
?>