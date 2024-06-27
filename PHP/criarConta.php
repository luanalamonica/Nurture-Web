<?php
    include "conexao.php";
    
    $nome           = $_POST['nome'];
    $email          = $_POST['username'];
    $senha          = $_POST['password'];
    $dt_nascimento  = calcularIdade($_POST['dt_nascimento']);
    $retorno;

    $query = "SELECT * FROM usuario WHERE email = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $retorno = array('success'=>FALSE, 'type'=>'danger', 'msg'=>'Usuário já existe!');
    } else {
        $sql = "INSERT INTO usuario (nome,email,senha,idade) VALUES ('$nome','$email','$senha',$dt_nascimento)";
        $rs = $con->query($sql);
        if($rs){
            $retorno = array('success'=>TRUE, 'type'=>'success', 'msg'=>'Usuário criado com sucesso!');
        }else{
            $retorno = array('success'=>FALSE, 'type'=>'danger', 'msg'=>'Erro ao criar usuário! '.$result);
        }
    }

    die(json_encode($retorno));

    function calcularIdade($dataNascimento) {
        // Criar objetos DateTime para a data de nascimento e a data atual
        $dataNascimentoObj = DateTime::createFromFormat('Y-m-d', $dataNascimento);
        $dataAtualObj = new DateTime();

        // Verificar se a data de nascimento é válida
        if (!$dataNascimentoObj || $dataNascimentoObj->format('Y-m-d') !== $dataNascimento) {
            return 'Formato de data inválido';
        }

        // Calcular a diferença de anos entre a data atual e a data de nascimento
        $idade = $dataAtualObj->diff($dataNascimentoObj)->y;

        return $idade;
    }    
?>