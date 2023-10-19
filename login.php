<?php
ob_start();
include_once 'php/cod_login.php';
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
        $_SESSION["dados"] = $dados;
        header("Location: php/cod_login.php");
    }
?>
<?php
    if(isset($_SESSION["msg"])){
        echo $_SESSION["msg"];
        unset($_SESSION["msg"]);
    }
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