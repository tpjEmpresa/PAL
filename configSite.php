<?php
ob_start();
include_once 'php/conexao.php';
include_once 'php/cod_configSite.php';

if(!isset($_SESSION['id_user'])){
  $_SESSION = [];
  $_SESSION['msg'] = '<script>alert("Erro: Necessário realizar o login para acessar a página!")</script>';
  header("Location: index.php");
  exit();
}

$query_usuario = "SELECT senha, nickName, dt_nascimento, email FROM User WHERE id_user = :id_user LIMIT 1";
$result_usuario = $conn->prepare($query_usuario);
$result_usuario->bindParam(':id_user', $_SESSION['id_user'], PDO::PARAM_STR);
$result_usuario->execute();
if (($result_usuario) AND ($result_usuario->rowCount() != 0)) {
  $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
}
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
    if (!empty($dados['EditUser'])) {
        $_SESSION["dados"] = $dados;
        header("Location: php/cod_configSite.php");
    }
    if (!empty($dados['EditSenha'])) {
        $_SESSION["dados"] = $dados;
        header("Location: php/cod_configSite.php");
    }
    if (!empty($dados['ApagarConta'])) {
      $_SESSION["dados"] = $dados;
      header("Location: php/cod_configSite.php");
    }
?>
<?php
    if(isset($_SESSION["msg"])){
        echo $_SESSION["msg"];
        unset($_SESSION["msg"]);
    }
?>

<header class="sticky top-0 z-10">
  <nav class="flex justify-between p-2 px-2 sm:px-6 bg-zinc-800">
    <a href="index.php"><!-- LINK PRA LOGO, N SEI PRA ONDE MANDA CPA A LADNING PAGE SL  -->
        <div>
        <img src="pics/pal.png" alt="logo" class="" width="120"> 
        </div>
    </a>

    <div class="flex text-white gap-2">
      <div class="m-auto ">

      <div class="flex gap-2">

      
        <a href="notificacao.php"><div class="h-8 w-8 shrink-0 overflow-hidden bg-[url('pics/bell.png')] bg-cover bg-center invert hover:opacity-75 ">
        <!--FOTO NOTIFICACAO-->
        </div></a>

        <!-- MENU DROP DOWN-->
        <div class="dropdown my-auto">
          <button class="font-mono hover:bg-zinc-700 p-1">
            <?php echo $_SESSION['nickName']; ?><i>▼</i></button><!--NOME USER-->

          <div class="absolute bg-zinc-800  rounded-md border dropdown-menu opacity-0 invisible right-10 ">
            <ul class="text-sm font-medium">

              <a href="editarPerfil.php">
                <li class="hover:bg-zinc-100 hover:text-black p-2 transition-colors">
                Editar Perfil<!--LINK editar perfil-->
                </li>
              </a>
              <a href="configSite.php">
                <li class="hover:bg-zinc-100 hover:text-black p-2  transition-colors">
                  Configuracão do site<!--LINK config site-->
                </li>
              </a>
              <a href="php/logout.php">
                <li  class="hover:bg-zinc-100 hover:text-black p-2 text-sm  transition-colors">
                Sair<!--LINK-->
                </li>
              </a>
            </ul>
          </div>
          <style>
            .dropdown:focus-within .dropdown-menu {
            opacity:1;
            transform: translate(0) scale(1);
            visibility: visible;
            }
          </style>
        </div>

      </div>
      </div>

    <!-- MANDA PRO PERFIL DA PESSOA LOGADA-->
      <a href="perfil.php" class="m-auto">
        <div class="h-8 w-8 shrink-0 overflow-hidden bg-[url('pics/pfp.jpg')] bg-cover bg-center ">
            <!--FOTO USER-->
        </div>
      </a>
    </div>
  </nav>

  <!-- BGLH DE BUSCA -- TAVA NO FIGMA- AINDA VOU MUDAR-->
  <div class="flex justify-center border-y border-zinc-800  bg-white">
    <a  class="border border-zinc-400 rounded-sm m-1 p-1 text-zinc-500 hover:text-black hover:border-black" 
    href="perfil.php">ir para perfil</a>
  </div>
</header>

<main class="flex flex-col">
  <h1 class="text-3xl text-zinc-400 text-center w-full  p-3">Configuracões do Site</h1>

  <div class=" h-5"></div>

  <div class="container  m-auto sm:w-1/3 text-zinc-100 text-center">
    <h2 class="text-xl text-zinc-100">Minha conta:</h2>
    <p class="text-sm text-zinc-400 ">Conectado como <?php echo $row_usuario['email'];?></p>

    <form name="editUsuario" method="POST" action="" 
    class=" flex flex-col p-2 text-black">
      <label for="" class="text-md text-white font-mono">mudar nome de usuario</label>
      <input type="text" name="nickName" id="user" oninput=mascara_user()  
      class="px-2 rounded-sm p-1 text-lg" value="<?php echo $row_usuario['nickName'];?>" required>

      <label for="" class="text-md text-white font-mono">mudar email</label>
      <input type="text" name="email" id="email" 
      class="px-2 rounded-sm p-1 text-lg" value="<?php echo $row_usuario['email'];?>" required>

      <label for="" class="text-md text-white font-mono">mudar data de nascimento</label>
      <input type="date" name="dt_nascimento" max="9999-12-31" id="" 
      class="px-2 rounded-sm p-1 text-lg" value="<?php echo $row_usuario['dt_nascimento'];?>" required>

      <input type="submit" value="Confirmar Mudanças" name="EditUser" 
      class="cursor-pointer bg-green-500 mt-2 border-green-500 border hover:border-white hover:text-white transition-colors">

    </form>
  </div>

  <div class=" h-10"></div>

  <div class="container  m-auto sm:w-1/3 text-zinc-100 text-center">
    <h2 class="text-xl text-zinc-100">Configurações Avançadas:</h2>
    <form name="editSenha" method="POST" action="" 
    class="flex flex-col p-2 text-black">
      <label for="" class="text-md text-white font-mono">insira uma nova senha</label>
      <input type="password"  name="Nsenha" 
      class="px-2 rounded-sm p-1 text-lg" required>
      <label for="" class="text-md text-white font-mono">confirmar nova senha</label>
      <input type="password"  name="Csenha" 
      class="px-2 rounded-sm p-1 text-lg" required>
      <input type="submit" value="Confirmar Mudanças" 
      class="cursor-pointer bg-green-500 mt-2 border-green-500 border hover:border-white hover:text-white transition-colors" name="EditSenha">
    </form>
  </div>

  <div class="container  m-auto sm:w-1/3 text-zinc-100 text-center">
    <form name="apagarConta" method="POST" action="" class="flex flex-col p-2 text-black">
      <label for="" class="text-lg text-red-500 font-mono">Apagar Conta</label>
      <label for="" class="text-md text-zinc-100 font-mono">Sua Senha</label>
      <input type="password"  name="Dsenha" 
      class="px-2 rounded-sm p-1 text-lg" required>

      <input type="submit" value="APAGAR CONTA" 
      class="cursor-pointer bg-red-500 mt-2 border-red-500 border hover:border-white hover:text-white transition-colors" name="ApagarConta">
    </form>
  </div>
  
</main>
<div class=" h-10"></div>

<footer class="m-3 flex h-20 gap-10 border-t border-zinc-400 p-3 sm:mx-16">
  <div class="flex gap-2 w-1/3">
    <a href="" class="my-auto text-sm text-zinc-400">
      <span> ©2023 TPJ, Inc.</span>
    </a>
  </div>
  <div class="my-auto w-full ">
    <ul class="flex  text-zinc-400 justify-evenly text-sm">
      <li class="underline hover:text-white"><a href="suporte.php">SUPORTE</a></li>
      <li class="underline hover:text-white"><a href="saibaMais.php">SAIBA MAIS</a></li>
      <li class="underline hover:text-white"><a href="contato.php">CONTATO</a></li>
    </ul>
  </div>
</footer>
<script src="mascara.js"></script>
</body>
</html>