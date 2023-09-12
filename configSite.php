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

<main class="flex h-screen">
  <div class="flex w-1/3 justify-center bg-zinc-950">
    <div class="w-full  p-3 h-fit overflow-hidden">
      <h1 class="font-medium text-zinc-400 pb-5">Configurações</h1>

      <div class="grid gap-2 text-zinc-300 ">
        <a class="bg-zinc-700 hover:bg-zinc-600 p-1 rounded-md hover:text-zinc-200"
        href="#">Minha Conta</a>

        <a class="bg-zinc-700 opacity-80 hover:opacity-60 p-1 rounded-md hover:text-zinc-300 cursor-not-allowed" >Notificaçõess(🏗️)</a>

        <a class="bg-zinc-700 opacity-80 hover:opacity-60 p-1 rounded-md hover:text-zinc-300 cursor-not-allowed" >Apps Conectados(🏗️)</a>

        <a class="bg-zinc-700 hover:bg-zinc-600 p-1 rounded-md hover:text-zinc-200 "
        href="#">Configurações Avançadas</a>
      </div>
    </div>

  </div>
  <div class="flex flex-1 bg-zinc-900 p-6 flex-col text-zinc-200">
    <h1 class="font-medium pb-5">Conta</h1>
    <div class="flex flex-col gap-10">
      <div class="">
        <h1 class="font-medium text-2xl pb-2">Minha Conta:</h1>
        <p class="text-sm">Conectado como <?php echo $dados['emailV'];?></p>
        <form name="editUsuario" method="POST" action="" class="flex flex-col gap-1 sm:w-1/3 text-zinc-800">

          <input type="text" name="nickName" id="user" oninput=mascara_user() placeholder="mudar nome" class="px-2 rounded-sm p-1 text-lg" value="<?php if (isset($dados['nickName'])) {echo $dados['nickName'];} else{echo $dados['nickNameV'];}?>" required>

          <input type="text" name="email" placeholder="mudar email" id="email" class="px-2 rounded-sm p-1 text-lg" value="<?php if (isset($dados['email'])) {echo $dados['email'];} else{echo $dados['emailV'];}
            ?>" required>

          <input type="date" name="dt_nascimento" max="9999-12-31" id="" class="px-2 rounded-sm p-1 text-lg" value="<?php if (isset($dados['dt_nascimento'])) {echo $dados['dt_nascimento'];} else{echo $dados['dt_nascimentoV'];}?>" required>

          <input type="submit" value="Confirmar" name="EditUser" class="bg-green-800 hover:text-white transition-colors bg-opacity-80 hover:bg-opacity-100 cursor-pointer">

        </form>
      </div>

      <div>
        <!--Configurações Avançadas:-->
        <h1 class="font-medium text-2xl pb-2">Configurações Avançadas:</h1>
        <div class="flex flex-col gap-6">

            <div class="text-zinc-800">
              <h1 class="underline font-medium text-zinc-200">Mudar senha</h1>
              <form name="editSenha" method="POST" action="" class="flex flex-col gap-1 sm:w-1/3 text-zinc-800">
                <input type="password" placeholder="Insira Nova senha" name="Insenha" class="px-2 rounded-sm p-1 text-lg" required>
                <input type="password" placeholder="Confirmar Nova senha" name="Cnsenha" class="px-2 rounded-sm p-1 text-lg" required>
                <input type="submit" value="Confirmar" class="bg-green-800 hover:text-white transition-colors bg-opacity-80 hover:bg-opacity-100 cursor-pointer" name="EditSenha">
              </form>
            </div>


            <div class="flex flex-col gap-1">
                <h1 class="underline font-medium">apagar conta</h1>
                <form name="apagarConta" method="POST" action="" class="flex flex-col gap-1 sm:w-1/3 text-zinc-800">
                    <input type="password" placeholder="Senha" name="Dsenha" class="px-2 rounded-sm p-1 text-lg" required>
                    <input type="submit" value="APAGAR CONTA" class="text-sm font-medium bg-red-600 hover:bg-red-700 border border-red-600 hover:border-white hover:text-white transition-all w-fit p-2 rounded-md cursor-pointer" name="ApagarConta">
                </form>
            </div>


          </div>
        </div>
      </div>
  </div>
  </div>
</main>
<script src="mascara.js"></script>
</body>
</html>