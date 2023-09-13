<?php
ob_start();
include_once 'php/cod_cadastro.php';
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
</head>
<body>
<?php

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if (!empty($dados['CadUsuario'])) {
        $_SESSION["dados"] = $dados;
        header("Location: php/cod_cadastro.php");
    }
?>
<?php
    if(isset($_SESSION["msg"])){
        echo $_SESSION["msg"];
        unset($_SESSION["msg"]);
    }
?>

<div class="flex h-screen bg-[url('pics/bg0.png')] m-auto bg-contain bg-repeat">
  <form name="cad-usuario" method="POST" action="" class=" flex flex-col gap-4 bg-zinc-900 h-fit p-4 md:p-14 m-auto rounded-md md:w-1/3">
    <h1 class="text-xl text-zinc-200 text-center">Cadastro</h1>
    <div>
        <label for="" class="text-md text-white font-mono">nome usuario</label>
        <input type="text" name="nickName" placeholder="nickname" class="px-2 rounded-sm p-1 text-lg w-full" id="user" oninput=mascara_user() value="<?php if (isset($dados['nickName'])) {echo $dados['nickName'];}?>" required>
    </div>

    <div>
        <label for="" class="text-md text-white font-mono">email</label><br>
        <input type="text" name="email" placeholder="email" class="px-2 w-full rounded-sm p-1 text-lg" id="email" value="<?php if (isset($dados['email'])) {echo $dados['email'];}?>" required>
    </div>
    <div>
        <label for="" class="text-md text-white font-mono">senha</label><br>
        <input type="password" name="senha" placeholder="senha" class="px-2 w-full rounded-sm p-1 text-lg" value="<?php if (isset($dados['senha'])) {echo $dados['senha'];}?>" required>
    </div>
    <div>
        <label for="" class="text-md text-white font-mono">data de nascimento</label><br>
        <input type="date" name="dt_nascimento" max="9999-12-31" id="" class="px-2 w-full rounded-sm p-1 text-lg" value="<?php if (isset($dados['dt_nascimento'])) {echo $dados['dt_nascimento'];}?>" required>
    </div>
    <div class="flex gap-2 text-zinc-100">
      <input type="checkbox" name="termoServico" value="1" id="" required>
      <p>termos de serviço</p>
    </div>
    
    <input type="submit" value="Cadastrar" name="CadUsuario" class="bg-red-700 rounded-sm hover:text-zinc-200 transition-all font-medium p-2 hover:bg-red-600">

    <a class="text-zinc-400 hover:text-zinc-200" href="login.php">já tem uma conta? login</a>
</form>
</div>
<script src="mascara.js"></script>
</body>
</html>