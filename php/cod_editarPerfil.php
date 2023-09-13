<?php
session_start();
ob_start();
include_once 'conexao.php';

if(isset($_SESSION["dados"])){
    $dados = $_SESSION["dados"];
    unset($_SESSION["dados"]);
}

        if (!empty($dados['EditPerfil'])) {
            $empty_input = false;
            $dados = array_map('trim', $dados);

            if (in_array("", $dados)) {
                $empty_input = true;
                $_SESSION['msg'] = '<script>alert("Erro: Necessário preencher todos campos")</script>';
                header("Location: http://localhost/PIT/Sprint3/PAL/editarPerfil.php");
            }

            if (!$empty_input) {
                $query_up_usuario = "UPDATE perfil SET descricao = :descricao WHERE Id_user_fk = :id";
                $edit_usuario = $conn->prepare($query_up_usuario);
                $edit_usuario->bindParam(':descricao', $dados['descricao'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':id', $_SESSION['id_user'], PDO::PARAM_INT);
                if ($edit_usuario->execute()){

                  if (isset($dados['jogo'])){
                    if ($dados['jogo'] == "cs:go"){
                      $rank = $dados['rankcs'];
                    }else if ($dados['jogo'] == "valorant"){
                      $rank = $dados['rankval'];
                    }else {
                      $rank = "Error";
                    }

                    if ($dados['jogo'] != "none"){
                      $query_usuario = "INSERT INTO Jogo (jogo, ranking, Id_perfil_fk) VALUES (:jogo, :ranking, :Id_perfil_fk)";
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
                        header("Location: http://localhost/PIT/Sprint3/PAL/editarPerfil.php");
                      }
                    }
                  }

                    header("Location: http://localhost/PIT/Sprint3/PAL/Perfil.php");

                }else{
                    $_SESSION['msg'] = '<script>alert("Perfil não editado!")</script>';
                    header("Location: http://localhost/PIT/Sprint3/PAL/editarPerfil.php");
                }
            }

        }

        if (!empty($dados['removejogo'])){
          $query_del_jogo = "DELETE FROM Jogo WHERE id_jogo = :id";
          $edit_jogo = $conn->prepare($query_del_jogo);
          $edit_jogo->bindParam(':id', $_SESSION['id_jogo'], PDO::PARAM_INT);
          if ($edit_jogo->execute()){
            unset($_SESSION['id_jogo']);
          }
        }
        
        ?>