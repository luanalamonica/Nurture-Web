<?php
    include "conexao.php";
    if(isset($_POST['id'])){
        $id = $_POST['id'];

        $query = "SELECT * FROM usuario WHERE id_usuario = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result = $stmt->get_result();
    }else{
        $id = $_SESSION['id'];

        $query = "SELECT * FROM usuario WHERE id_usuario = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param('s', $id);
        $stmt->execute();
        $result = $stmt->get_result();
    }
?>

<!DOCTYPE html>

    <html lang="pt-br">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nurture</title>
        <link rel="icon" href="../imagens/logo.png" type="image/png">
        <link rel="stylesheet" href="../CSS/perfil.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
                          <span class="txt-link">Au Pairs</span>
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

            <div class="information">

                
                
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='Luana'>
                            <img src='../imagens/".($row['SEXO']=='F'?'mulher':'homem').$row['ID_USUARIO'].".png' alt='Profile Picture' class='profile-picture'>
                            <h1 id='titulo_nome'></h1>
                          </div>";
                    echo "<p><h2>Contact Information</h2></p>
                            <p id='paragrafo_email'>Email: ".$row['EMAIL']."</p>
                            <p id='paragrafo_tel'>Phone: +55 (".intval(substr($row['TELEFONE'],0,2)).")".intval(substr($row['TELEFONE'],2,20))."</p>
                            <p id='paragrafo_ender'>Address: ".$row['CIDADE'].", ".$row['PAIS']."</p>
                            <p><h2>About Me</h2></p>
                            <p id='paragrafo_idade'>".$row['IDADE']." years</p>
                            <p id='paragrafo_sobre_mim'>".$row['SOBRE_MIM']."</p>
                        ";
                }
                if(isset($_POST['id'])) echo "<a href='all-pairs.php' class='edit-button'>Voltar</a>";
                ?>
            </div>
          
                
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
    

</html>