<?php

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

<header class="sticky top-0 z-10">
  <nav class="flex justify-between p-2 px-2 sm:px-6 bg-zinc-800">
    <a href="index.php"><!--LINK PRA LOGO, N SEI PRA ONDE MANDA CPA A LADNING PAGE SL-->
        <div>
        <img src="/pics/pal.png" alt="logo" class="" width="120"> 
        </div>
    </a>

    <div class="flex text-white gap-2">
      <div class="m-auto ">

      <div class="flex gap-2">

      
        <a href="#"><div class="h-8 w-8 shrink-0 overflow-hidden bg-[url('pics/bell.png')] bg-cover bg-center invert hover:opacity-75 ">
        <!--FOTO NOTIFICACAO-->
        </div></a>

        <!-- MENU DROP DOWN-->
        <div class="dropdown my-auto">
          <button class="font-mono hover:bg-zinc-700 p-1">UserName<i>▼</i></button><!--NOME USER-->

          <div class="absolute bg-zinc-800  rounded-md border dropdown-menu opacity-0 invisible right-10 ">
            <ul class="text-sm font-medium">
              <li class="hover:bg-zinc-100 hover:text-black p-2 transition-colors">
                <a href="editarPerfil.php">Editar Perfil</a><!--LINK editar perfil-->
              </li>
              <li class="hover:bg-zinc-100 hover:text-black p-2  transition-colors">
                <a href="configSite.php">Configuracão do site</a><!--LINK config site-->
              </li>
              <li  class="hover:bg-zinc-100 hover:text-black p-2 text-sm  transition-colors">
                <a href="">Sair</a><!--LINK-->
              </li>
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
      <a href="" class="m-auto">
        <div class="h-8 w-8 shrink-0 overflow-hidden bg-[url('pics/pfp.jpg')] bg-cover bg-center ">
            <!--FOTO USER-->
        </div>
      </a>
    </div>
  </nav>

  <!-- BGLH DE BUSCA -- TAVA NO FIGMA- AINDA VOU MUDAR-->
  <div class="flex justify-center border-y border-zinc-800  bg-white">
    <a  class="border border-zinc-400 rounded-sm m-1 p-1 text-zinc-500 hover:text-black hover:border-black" 
    href="perfil.php">ir para meu perfil</a>
  </div>
</header>

<main class="flex flex-col">
  <h1 class="text-3xl text-zinc-400 text-center w-full  p-3">Configuracões do Site</h1>

  <div class=" h-5"></div>

  <div class="container  m-auto sm:w-1/3 text-zinc-100 text-center">
    <h2 class="text-xl text-zinc-100">Minha conta:</h2>
    <p class="text-sm text-zinc-400 ">Conectado como <?php echo $dados['emailV'];?></p>

    <form name="editUsuario" method="POST" action="" 
    class=" flex flex-col p-2 text-black">
      <label for="" class="text-md text-white font-mono">mudar nome de usuario</label>
      <input type="text" name="nickName" id="user" oninput=mascara_user()  
      class="px-2 rounded-sm p-1 text-lg" value="<?php if (isset($dados['nickName'])) {echo $dados['nickName'];} else{echo $dados['nickNameV'];}?>" required>

      <label for="" class="text-md text-white font-mono">mudar email</label>
      <input type="text" name="email" id="email" 
      class="px-2 rounded-sm p-1 text-lg" value="<?php if (isset($dados['email'])) {echo $dados['email'];} else{echo $dados['emailV'];}
        ?>" required>

      <label for="" class="text-md text-white font-mono">mudar data de nascimento</label>
      <input type="date" name="dt_nascimento" max="9999-12-31" id="" 
      class="px-2 rounded-sm p-1 text-lg" value="<?php if (isset($dados['dt_nascimento'])) {echo $dados['dt_nascimento'];} else{echo $dados['dt_nascimentoV'];}?>" required>

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
      <input type="password"  name="Insenha" 
      class="px-2 rounded-sm p-1 text-lg" required>
      <label for="" class="text-md text-white font-mono">confirmar nova senha</label>
      <input type="password"  name="Cnsenha" 
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