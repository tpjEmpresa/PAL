<?php
session_start();
ob_start();
include_once 'conexao.php';

if(isset($_SESSION["dados"])){
    $dados = $_SESSION["dados"];
    unset($_SESSION["dados"]);
}

if (!empty($dados['EditUser'])) {
    $empty_input = false;

    $dados = array_map('trim', $dados);

    $ano_td = date("Y");
    $mes_td = date("m");
    $dia_td = date("d");

    $dia_user = substr($dados['dt_nascimento'], 8);
    $mes_user = substr($dados['dt_nascimento'], 5, -3);
    $ano_user = substr($dados['dt_nascimento'], 0, -6);

    if ($mes_td > $mes_user){
        $idade = ($ano_td - $ano_user);
    }elseif ($mes_td == $mes_user and $dia_td >= $dia_user){
        $idade = ($ano_td - $ano_user);
    }else{
        $idade = ($ano_td - $ano_user) - 1;
    }

    $query_usuario = 'SELECT id_user, email FROM user WHERE email =:email LIMIT 1';
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
    $result_usuario->execute();

    if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
        if($row_usuario['id_user'] == $_SESSION['id_user']){
          $email = 0;  
        }
        else{
            $email = 1;
        }
    }else{
        $email = 0;
    }

    if (in_array("", $dados)) {
        $empty_input = true;
        $_SESSION["msg"] = '<script>alert("Erro: Necessário preencher todos campos")</script>';
        header("Location: ../configSite.php");
    }elseif(strlen($dados['nickName'])<3){
        $empty_input = true;
        $_SESSION["msg"] = '<script>alert("Erro: Nome de usuario curto")</script>';
        header("Location: ../configSite.php");
    }elseif (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
        $empty_input = true;
        $_SESSION["msg"] = '<script>alert("Erro: Necessário preencher com e-mail válido")</script>';
        header("Location: ../configSite.php");
    }elseif($idade < 14){
        $empty_input = true;
        $_SESSION["msg"] = '<script>alert("Erro: Nescessário ter mais de 14 anos")</script>';
        header("Location: ../configSite.php");
    }elseif($email == 1){
        $empty_input = true;
        $_SESSION["msg"] = '<script>alert("Erro: Email já cadastrado")</script>';
        header("Location: ../configSite.php");
    }

    if (!$empty_input) {
        $query_up_usuario = "UPDATE User SET nickName = :nickName, dt_nascimento = :dt_nascimento, email = :email WHERE id_user = :id";
        $edit_usuario = $conn->prepare($query_up_usuario);
        $edit_usuario->bindParam(':nickName', $dados['nickName'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':dt_nascimento', $dados['dt_nascimento'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':id', $_SESSION['id_user'], PDO::PARAM_INT);
        if($edit_usuario->execute()){
            $_SESSION['nickName'] = $dados['nickName'];
            header("Location: ../perfil.php");
        }else{
            $_SESSION["msg"] = '<script>alert("Erro: Informações não alteradas")</script>';
            header("Location: ../configSite.php");
        }
    }
}

if (!empty($dados['EditSenha'])) {
    $empty_inputS = false;

    $dados = array_map('trim', $dados);

    if (in_array("", $dados)) {
        $empty_inputS = true;
        $_SESSION["msg"] = '<script>alert("Erro: Necessário preencher todos campos")</script>';
        header("Location: ../configSite.php");
    }

    if (!$empty_inputS) {
        if ($dados['Nsenha'] == $dados['Csenha']){
            $senhasub = md5($dados['Csenha']);
            $query_up_usuario = "UPDATE User SET senha = :senha WHERE id_user = :id";
            $edit_usuario = $conn->prepare($query_up_usuario);
            $edit_usuario->bindParam(':senha', $senhasub, PDO::PARAM_STR);
            $edit_usuario->bindParam(':id', $_SESSION['id_user'], PDO::PARAM_INT);
            if($edit_usuario->execute()){
                header("Location: ../perfil.php");
            }else{
                $_SESSION["msg"] = '<script>alert("Erro: Senha não alterada")</script>';
                header("Location: ../configSite.php");
            }
        }else{
            $_SESSION["msg"] = '<script>alert("Erro: As senhas não são iguais")</script>';
            header("Location: ../configSite.php");
        }
    }
}

if (isset($dados["ApagarConta"])){
    $query_perfil = "SELECT id_perfil FROM Perfil WHERE Id_user_fk = :id LIMIT 1";
    $result_perfil = $conn->prepare($query_perfil);
    $result_perfil->bindParam(':id', $_SESSION['id_user'], PDO::PARAM_STR);
    $result_perfil->execute();
    $row_perfil = $result_perfil->fetch(PDO::FETCH_ASSOC);

    $query_usuario = "SELECT senha FROM User WHERE id_user = :id_user LIMIT 1";
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->bindParam(':id_user', $_SESSION['id_user'], PDO::PARAM_STR);
    $result_usuario->execute();
    $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);

    $dados['Dsenha'] = md5($dados['Dsenha']);
    if($dados['Dsenha'] == $row_usuario['senha']){

        $query_del_jogo = "DELETE FROM Jogo WHERE Id_perfil_fk = :id";
        $edit_jogo = $conn->prepare($query_del_jogo);
        $edit_jogo->bindParam(':id', $row_perfil['id_perfil'], PDO::PARAM_INT);
        $edit_jogo->execute();

        $query_del_jogo = "DELETE FROM Perfil WHERE Id_user_fk = :id";
        $edit_jogo = $conn->prepare($query_del_jogo);
        $edit_jogo->bindParam(':id', $_SESSION['id_user'], PDO::PARAM_INT);
        $edit_jogo->execute();
        
        $query_del_user = "DELETE FROM User WHERE id_user = :id";
        $edit_user = $conn->prepare($query_del_user);
        $edit_user->bindParam(':id', $_SESSION['id_user'], PDO::PARAM_INT);
        if ($edit_user->execute()){
            header("Location: logout.php");
        }

    }else{
        $_SESSION["msg"] = '<script>alert("Erro: Senha inválida!")</script>';
        header("Location: ../configSite.php");
    }
}