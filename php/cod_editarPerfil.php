<?php
session_start();
ob_start();
include_once 'conexao.php';

if(isset($_SESSION["dados"])){
    $dados = $_SESSION["dados"];
    unset($_SESSION["dados"]);
}

if (isset($dados['removejogo'])){
	$query_del_jogo = "DELETE FROM Jogo WHERE id_jogo = :id";
	$edit_jogo = $conn->prepare($query_del_jogo);
	$edit_jogo->bindParam(':id', $dados['removejogo'], PDO::PARAM_INT);
	$edit_jogo->execute();
	header("Location: http://localhost:3000/editarPerfil.php");
}
 
if (!empty($dados['EditPerfil'])) {
    $empty_input = false;
    $dados = array_map('trim', $dados);

    if (in_array("", $dados)) {
        $empty_input = true;
        $_SESSION['msg'] = '<script>alert("Erro: Necessário preencher todos campos")</script>';
        header("Location: http://localhost:3000/editarPerfil.php");
    }

    if (!$empty_input) {
        $query_up_usuario = "UPDATE perfil SET descricao = :descricao WHERE Id_user_fk = :id";
        $edit_usuario = $conn->prepare($query_up_usuario);
        $edit_usuario->bindParam(':descricao', $dados['descricao'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':id', $_SESSION['id_user'], PDO::PARAM_INT);

		$query_jogo = "SELECT id_jogo, jogo, ranking FROM Jogo WHERE Id_perfil_fk = ".$_SESSION['id_perfil']." LIMIT 2";
		$result_jogo = $conn->prepare($query_jogo);
		$result_jogo->execute();

		if (($result_jogo) AND ($result_jogo->rowCount() != 0)) {
		$row_jogo = $result_jogo->fetch(PDO::FETCH_ASSOC);
		}

        if ($edit_usuario->execute()){
            if (isset($dados['jogo'])){
                if ($dados['jogo'] == "cs:go"){
					if($row_jogo['jogo'] == "cs:go"){
						$_SESSION['msg'] = '<script>alert("Erro: Jogo já cadastrado")</script>';
        				header("Location: http://localhost:3000/editarPerfil.php");
					}else{
						$rank = $dados['rankcs'];
					}
                }else if ($dados['jogo'] == "valorant"){
					if($row_jogo['jogo'] == "valorant"){
						$_SESSION['msg'] = '<script>alert("Erro: Jogo já cadastrado")</script>';
        				header("Location: http://localhost:3000/editarPerfil.php");
					}else{
                    $rank = $dados['rankval'];
					}
                }else {
                    $rank = "Error";
                }

                if ($dados['jogo'] != "none"){
                	$query_usuario = "INSERT INTO Jogo (jogo, ranking, Id_perfil_fk) VALUES (:jogo, :ranking,:Id_perfil_fk)";
                    $cad_usuario = $conn->prepare($query_usuario);
                    $cad_usuario->bindParam(':jogo', $dados['jogo'], PDO::PARAM_STR);
                    $cad_usuario->bindParam(':ranking', $rank, PDO::PARAM_STR);
                    $cad_usuario->bindParam(':Id_perfil_fk', $_SESSION['id_perfil'], PDO::PARAM_INT);
                    $cad_usuario->execute();
                    if ($cad_usuario->rowCount()) {
                    	unset($dados);
                        unset($_SESSION['id_perfil']);
                    }else {
                    	$_SESSION['msg'] = '<script>alert("Erro: Usuário não cadastrado")</script>';
                        header("Location: http://localhost:3000/login.php");
                    }
                }
            }
        header("Location: http://localhost:3000/Perfil.php");
        }else{
            $_SESSION['msg'] = '<script>alert("Perfil não editado!")</script>';
            header("Location: http://localhost:3000/editarPerfil.php");
        }
    }
}