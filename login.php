<?php
session_start();
ob_start();
include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="pics/ico.png" type="image/x-icon">
    <title>PAL</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
 
 
    <style>
      *{
        font-family: 'Inter';
      }
        body{
            height: 100vh;
            --tw-bg-opacity: 1;
            background-color: rgb(24 24 27 / var(--tw-bg-opacity));
        }
    </style>
<body>
  <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

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
                header("Location: perfil.php");
            }else{
              echo '<script>alert("Erro: Usuário ou senha inválida!")</script>';
              //$_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Usuário ou senha inválida!</p>";
            }
        }else{
          echo '<script>alert("Erro: Usuário ou senha inválida!")</script>';
          //$_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Usuário ou senha inválida!</p>";
        }

        
    }

    // if(isset($_SESSION['msg'])){
    //     echo $_SESSION['msg'];
    //     unset($_SESSION['msg']);
    // }
  ?>

<div class="flex h-screen bg-[url('pics/bg0.png')] m-auto bg-contain bg-repeat">
  <form name="login" method="POST" action="" class=" flex flex-col gap-4 bg-zinc-900 h-fit p-4 md:p-14 m-auto rounded-md md:w-1/3">
    <h1 class="text-xl text-zinc-200 text-center">Login</h1>

    <input type="text" name="email" placeholder="email" class="px-2 rounded-sm p-1 text-lg" id="email" value="<?php if (isset($dados['email'])) {echo $dados['email'];}?>" required>

    <input type="password" name="senha" placeholder="senha" class="px-2 rounded-sm p-1 text-lg" required>

    <input type="submit" value="Acessar" name="SendLogin" class="bg-red-700 rounded-sm hover:text-zinc-200 transition-all font-medium p-2 hover:bg-red-600">
    <a class="text-zinc-400 hover:text-zinc-200" href="https://youtu.be/-zd62MxKXp8" target="_blank">Esqueceu a senha?</a>
    <a class="text-zinc-400 hover:text-zinc-200" href="cadastro.php">não tem uma conta? cadastro</a>
</form>

</div>
<script src="mascara.js"></script>
</body>
</html>