<?php
    session_start();
    $con = new mysqli("localhost","root","","Nature_Web");

    if (!$con) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

?>