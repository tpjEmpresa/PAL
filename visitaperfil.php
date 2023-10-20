<?php
session_start();
ob_start();
include_once 'php/conexao.php';

if(!isset($_SESSION['id_user'])){
    $_SESSION = [];
    $_SESSION['msg'] = '<script>alert("Erro: Necessário realizar o login para acessar a página!")</script>';
    header("Location: index.php");
    exit();
}elseif($_SESSION['id_user'] == $_SESSION['visita']){
  header("Location: perfil.php");
}

$query_perfil = "SELECT id_perfil, descricao FROM Perfil WHERE Id_user_fk = :id LIMIT 1";
$result_perfil = $conn->prepare($query_perfil);
$result_perfil->bindParam(':id', $_SESSION['visita'], PDO::PARAM_STR);
$result_perfil->execute();

if (($result_perfil) AND ($result_perfil->rowCount() != 0)) {
    $row_perfil = $result_perfil->fetch(PDO::FETCH_ASSOC);
} else {
    $_SESSION['msg'] = '<script>alert("Erro: Usuário não encontrado!")</script>';
    header("Location: busca.php");
    exit();
    unset($_SESSION['visita']);
}

$query_usuario = "SELECT id_user,nickname FROM user WHERE id_user = :id LIMIT 1";
$result_usuario = $conn->prepare($query_usuario);
$result_usuario->bindParam(':id', $_SESSION['visita'], PDO::PARAM_STR);
$result_usuario->execute();
$row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
//unset($_SESSION['visita']);

$query_jogo = "SELECT jogo, ranking FROM Jogo WHERE Id_perfil_fk = ".$row_perfil['id_perfil']." LIMIT 2";
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

    if (!empty($_POST['report'])) {
      $_SESSION["reportid"] = $_POST['report'];
      header("Location: report.php");
    }
    
    if(isset($_SESSION["msg"])){
        echo $_SESSION["msg"];
        unset($_SESSION["msg"]);
    }
?>
<header class="sticky top-0 z-10">
  <nav class="flex justify-between p-2 px-2 sm:px-6 bg-zinc-800">
    <a href="index.php"><!--LINK PRA LOGO, N SEI PRA ONDE MANDA CPA A LADNING PAGE SL-->
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
    <a  class="border border-zinc-400 rounded-sm m-1 p-1 text-zinc-500 hover:text-black hover:border-black" href="busca.php">ir para pagina de busca</a>
  </div>
</header>
    



<!---
<main class="lg:m-16 lg:mx-64">
    <div class="bg-zinc-100 w-full px-3 font-mono flex justify-between"><p class="font-mono">Perfil do <span class="font-semibold "><php echo $_SESSION['nickName']; ?></span></p><a href="editarPerfil.php" class="hover:text-black text-zinc-700 font-mono">Editar perfil</a></div>
    <div class="flex border md:flex-row flex-col justify-evenly">

        <div class="sm:w-1/3 p-3 flex sm:flex-col gap-3 w-full border-2 border-red-200">
            <div class="w-80 h-80 m-auto bg-[url('pics/pfp.jpg')] bg-cover bg-center">
                foto
            </div>
            <div>
                <h1 class="text-sm text-zinc-400 text-center">minhas redes socias</h1>
                <div class="flex justify-center md:flex-row flex-col ">
                    <div><a href="#"><img src="pics/steam.png" alt="" class="w-12 mx-auto " /></a></div>
                    <div><a href="#"><img src="pics/twitter.png" alt="" class="w-12 mx-auto opacity-90" /></a></div>
                </div>
            </div>
        </div>


        <div class="flex flex-1 flex-col justify-around border p-3 sm:w-2/3">
            <div class="text-zinc-300 h-1/3">
                <h1 class="text-sm text-zinc-400">sobre mim</h1>
                <p class="ml-3"><php echo $row_usuario['descricao']; ?></p>
            </div>
            <div class="flex-1">
                <h1 class="text-sm text-zinc-400 mb-1">jogos jogados</h1>
                <div class=" bg-zinc-800 min-h-2/3 flex w-fit  flex-wrap">

                <php
				foreach ($conn->query($query_jogo) as $row) {
				?>
					<div class="flex gap-3 px-6 m-3 bg-zinc-900 w-fit h-fit border-zinc-700 border rounded-sm">
                        <div class="text-center">
                            <h1 class="text-sm text-zinc-400">jogo</h1>
                            <p class="font-semibold text-md text-zinc-300"><php print $row['jogo'];?></p>
						</div>
						<div class="text-center ">
                            <h1 class="text-sm text-zinc-400">rank</h1>
                            <p class="font-semibold text-md text-zinc-300"><php print $row['ranking'];?></p>
						</div>
					</div>
				<php
					}
				?>
                



                    

        

                </div>
            </div>
        </div>
    </div>
</main>
        -->

<main class="flex  flex-col">
  <section class="flex h-64 flex-col md:flex-row sm:relative
  bg-[url('pics/banner.png')]
  bg-cover  bg-center bg-no-repeat
  ">
    <div class="my-auto flex shrink-0 flex-col p-2 sm:pl-20 sm:flex-row ">
      <div class="h-40 w-40 shrink-0 overflow-hidden rounded-full bg-[url('pics/pfp.jpg')] bg-cover bg-center"></div>
      <div class="flex h-fit flex-col rounded-sm bg-zinc-700 p-2 text-lg bg-opacity-80 text-white">
        <?php echo '<h1 class="md:text-xl font-medium"> '.substr($row_usuario['nickname'], 1).' </h1>';?>
        <h1 class="hidden sm:block md:text-md">conta criada 19 de out, 2023</h1>
      </div>
    </div>
  </section>

  <div class="flex flex-1 flex-col justify-between bg-zinc-900 p-4 text-zinc-200 sm:flex-row h-16">
  <form name="" method="POST" action="">
  <?php
          echo '<td><button type="submit" name="report" value="'.$row_usuario['id_user'].'" class=""><p class="text-sm text-red-800 hover:text-red-600 transition-colors pr-4">report</p></button></td>';
  ?>
  <!-- <a href="editarPerfil.php" class="hover:text-white text-zinc-400 w-fit h-fit font-mono">Editar perfil</a> -->
  </form>
    <div class="flex sm:w-2/3 flex-col gap-4">
      <div class="grid-col-2 grid justify-evenly rounded-sm bg-zinc-800 p-2 md:grid-cols-3 ">
      <?php
              foreach ($conn->query($query_jogo) as $row) {
          ?>
					<div class="flex gap-3 px-6 m-3 bg-zinc-900 w-fit h-fit border-zinc-700 border rounded-sm">
                        <div class="text-center">
                            <h1 class="text-sm text-zinc-400">jogo</h1>
                            <p class="font-semibold text-md text-zinc-300"><?php print $row['jogo'];?></p>
						</div>
						<div class="text-center ">
                            <h1 class="text-sm text-zinc-400">rank</h1>
                            <p class="font-semibold text-md text-zinc-300"><?php print $row['ranking'];?></p>
						</div>
					</div>
          <?php
              }
      ?>
      </div>
      <div class="flex flex-col justify-center gap-2 text-center hidden sm:block">
        <h1 class="text-xl font-semibold">Lista de Amigos</h1>
        <button class="m-auto w-fit rounded-sm bg-red-700 px-4 text-black transition-colors hover:bg-red-600 hover:text-zinc-200">V</button>
      </div>
    </div>


    <div class="flex sm:w-1/3 flex-col gap-4 p-4">
      <div class="text-xl">
        <h1 class="pb-2">Sobre</h1>
        <div class="break-words rounded-sm bg-zinc-800 p-1 text-sm">
          <p><?php echo $row_perfil['descricao']; ?></p>
        </div>
      </div>
      <div class="text-xl">
        <h1 class="pb-2">Redes Sociais</h1>
        <div class="flex gap-1">
          <div><a href="#"><img src="pics/steam.png" alt="" class="w-10" /></a></div>
          <div><a href="#"><img src="pics/twitter.png" alt="" class="w-10" /></a></div>
        </div>
      </div>
    </div>
  </div>
</main>



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

</body>
</html>