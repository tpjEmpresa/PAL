<?php
session_start();
ob_start();
include_once 'conexao.php';

if(isset($_SESSION["dados"])){
    $dados = $_SESSION["dados"];
    unset($_SESSION["dados"]);
}

if (!empty($dados['CadUsuario'])) {
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

    $query_usuario = 'SELECT email FROM user WHERE email =:email LIMIT 1';
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
    $result_usuario->execute();

    if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
        $email = 1;
    }else{
        $email = 0;
    }

    if (in_array("", $dados)) {
        $empty_input = true;
        $_SESSION["msg"] = '<script>alert("Erro: Necessário preencher todos campos")</script>';
        header("Location: http://localhost/PIT/Sprint3/PAL/cadastro.php");
    }elseif(strlen($dados['nickName'])<3){
        $empty_input = true;
        $_SESSION["msg"] = '<script>alert("Erro: Nome de usuario curto")</script>';
        header("Location: http://localhost/PIT/Sprint3/PAL/cadastro.php");
    }elseif (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
        $empty_input = true;
        $_SESSION["msg"] = '<script>alert("Erro: Necessário preencher com e-mail válido")</script>';
        header("Location: http://localhost/PIT/Sprint3/PAL/cadastro.php");
    }elseif($idade < 14){
        $empty_input = true;
        $_SESSION["msg"] = '<script>alert("Erro: Nescessário ter mais de 14 anos")</script>';
        header("Location: http://localhost/PIT/Sprint3/PAL/cadastro.php");
    }elseif(!isset($dados['termoServico'])){
        $empty_input = true;
        $_SESSION["msg"] = '<script>alert("Erro: Necessário concordar com os termos de serviço")</script>';
        header("Location: http://localhost/PIT/Sprint3/PAL/cadastro.php");
    }elseif($email == 1){
        $empty_input = true;
        $_SESSION["msg"] = '<script>alert("Erro: Email já cadastrado")</script>';
        header("Location: http://localhost/PIT/Sprint3/PAL/cadastro.php");
    }

    if (!$empty_input) {
        $senhasub = md5($dados['senha']);
        $query_usuario = "INSERT INTO User (nickName, dt_nascimento, email, senha, termoServico) VALUES (:nickName, :dt_nascimento, :email, :senha, :termoServico)";
        $cad_usuario = $conn->prepare($query_usuario);
        $cad_usuario->bindParam(':nickName', $dados['nickName'], PDO::PARAM_STR);
        $cad_usuario->bindParam(':dt_nascimento', $dados['dt_nascimento'], PDO::PARAM_STR);
        $cad_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
        $cad_usuario->bindParam(':senha', $senhasub, PDO::PARAM_STR);
        $cad_usuario->bindParam(':termoServico', $dados['termoServico'], PDO::PARAM_STR);
        $cad_usuario->execute();

        if ($cad_usuario->rowCount()) {
            $query_usuario = 'SELECT id_user, nickName FROM User WHERE nickName =:nickName  LIMIT 1';
            $result_usuario = $conn->prepare($query_usuario);
            $result_usuario->bindParam(':nickName', $dados['nickName'], PDO::PARAM_STR);
            $result_usuario->execute();
            $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
            $_SESSION['id_user'] = $row_usuario['id_user'];

            $defaultdesc = "Digite sua descrição";
            if (isset($_SESSION['id_user'])){
                $query_usuario = "INSERT INTO Perfil (descricao, Id_user_fk) VALUES (:descricao, :Id_user_fk)";
                $cad_usuario = $conn->prepare($query_usuario);
                $cad_usuario->bindParam(':descricao', $defaultdesc, PDO::PARAM_STR);
                $cad_usuario->bindParam(':Id_user_fk', $_SESSION['id_user'], PDO::PARAM_INT);
                $cad_usuario->execute();
                if ($cad_usuario->rowCount()) {
                    unset($dados);
                    unset($_SESSION['id_user']);
                    header("Location: http://localhost/PIT/Sprint3/PAL/login.php");
                }else {
                    $_SESSION["msg"] = '<script>alert("Erro: Usuário não cadastrado")</script>';
                    header("Location: http://localhost/PIT/Sprint3/PAL/cadastro.php");
                }
            }
        }
    }
}
?>