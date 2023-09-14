<?php
session_start();
ob_start();
include_once 'conexao.php';

if(isset($_SESSION["dados"])){
    $dados = $_SESSION["dados"];
    unset($_SESSION["dados"]);
}

if (!empty($dados['SendLogin'])) {
    $query_usuario = 'SELECT id_user, nickName, email, senha FROM user WHERE email =:email LIMIT 1';
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
    $result_usuario->execute();

    if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
        $dados['senha'] = md5($dados['senha']);

        if($dados['senha'] == $row_usuario['senha']){
            $_SESSION['id_user'] = $row_usuario['id_user'];
            $_SESSION['nickName'] = $row_usuario['nickName'];
            header("Location: http://localhost:3000/perfil.php");
        }else{
			$_SESSION["msg"] = '<script>alert("Erro: Usuário ou senha inválida!")</script>';
        	header("Location: http://localhost:3000/perfil.php");
        }
        }else{
			$_SESSION["msg"] = '<script>alert("Erro: Usuário ou senha inválida!")</script>';
    	header("Location: http://localhost/PIT/Sprint3/PAL/login.php");
    }
        
}