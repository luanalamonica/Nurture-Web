<?php
    include "conexao.php";

    $query = "SELECT * FROM usuario where id_usuario <> ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('s', $_SESSION['id']);
    $stmt->execute();
    $result = $stmt->get_result();
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurture</title>
    <link rel="icon" href="../imagens/logo.png" type="image/png">
    <link rel="stylesheet" href="../CSS/au-pairs.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

    <nav>
        
        <div class="dropdown" id="myDropdown">

        <a class="botao" href="../HTML/all-pairs.html">Au Pairs</a>
        <a class="botao" href="../HTML/sobreNos.html">About Us</a>
        <a class="botao" href="../HTML/perfil.html">My profile</a>

        </div>  
        <script src="../JS/menuCima.js"></script>

       <div class="menu-lateral">

        <div class="btn-expandir">
            <i class="bi bi-list"></i>
        </div>

        <ul>

            <li class="item-menu">
                <a href="../HTML/all-pairs.html">  
                      <span class="icon"></span>
                      <span class="txt-link">Au pairs</span>
                 </a>
            </li> 
            
            <li class="item-menu">
                <a href="../HTML/sobreNos.html">  
                    <span class="icon"></span>
                    <span class="txt-link">About Us</span>
                </a>
            </li>

            <li class="item-menu">
                <a href="../HTML/perfil.html">  
                      <span class="icon"></span>
                      <span class="txt-link">My profile</span>
                 </a>
            </li> 
                      
            <li class="item-menu">
                <a href="../PHP/loggout.php">  
                      <span class="icon"></span>
                      <span class="txt-link">Exit</span>
                 </a>
            </li>

        </ul>

    </nav>
    <section>
    <h2>Meet our best Au Pairs!</h2>
    <br>
    <br>
    <div class="au-pair">
    <?php
    while($row = $result->fetch_assoc()){
        echo "<div class='elementos-externos'>
                <div class='retangulo-branco'>
                    <input type='hidden' value='".$row['ID_USUARIO']."'></input>
                    <p>".$row['NOME']."</p>
                    <p>".$row['IDADE']." anos</p>
                    <p><i class='material-icons'>location_on</i>".$row['PAIS']."</p>
                </div>
                <div class='retangulo-pessego'></div>
                <img src='../imagens/".($row['SEXO']=='F'?'mulher':'homem').$row['ID_USUARIO'].".png' alt='Imagem' class='imagem'>
            </div>";
    }
    
    ?>
    </div>
    </section>
</body>
<div class="container">
    <nav> 
        <img src="../imagens/logo2.png" width="70" height="72">
        <img src="../imagens/download.png" width="90">
    </nav>  

    <h2>Contact Us</h2>
    <p>If you have any questions, please contact the Nurture developer team via email:
    <b>nurture.contact@gmail.com</b>   
    <p>Or if you prefer, on our phone:
    <b>+55 (14) 3030 - 3030</b>
    <p>Nurture
    <i class="bi bi-instagram"></i>
    <i class="bi bi-facebook"></i>
    <i class="bi bi-linkedin"></i>

    <p><h5>Copyright © 2024, all rights reserved.</h5></p>
</div>
<script src="../JS/all-pairs.js"></script>

</html>