<?php
session_start();
ob_start();
include_once 'php/conexao.php';

if(!isset($_SESSION['id_user'])){
    $_SESSION = [];
    $_SESSION['msg'] = '<script>alert("Erro: Necessário realizar o login para acessar a página!")</script>';
    header("Location: index.php");
    exit();
}elseif($_SESSION['id_user'] == $_SESSION['reportid']){
  header("Location: busca.php");
}

$query_usuario = "SELECT id_user,nickname FROM user WHERE id_user = :id LIMIT 1";
$result_usuario = $conn->prepare($query_usuario);
$result_usuario->bindParam(':id', $_SESSION['reportid'], PDO::PARAM_STR);
$result_usuario->execute();
$row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
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
  if (!empty($_POST['btnreport'])) {
    if (!empty($_POST['radio'])){
      $vlr = 0;

      $query_perfil = "SELECT reputacao FROM Perfil WHERE Id_user_fk = :id LIMIT 1";
      $result_perfil = $conn->prepare($query_perfil);
      $result_perfil->bindParam(':id', $row_usuario['id_user'], PDO::PARAM_STR);
      $result_perfil->execute();
      $row_perfil = $result_perfil->fetch(PDO::FETCH_ASSOC);

      switch ($_POST["radio"]) {
      case 1:
        $vlr = 10;
        //echo '<script>alert("1")</script>';
        break;
      case 2:
        $vlr = 20;
        //echo '<script>alert("2")</script>';
        break;
      case 3:
        $vlr = 30;
        //echo '<script>alert("3")</script>';
        break;
      case 4:
        $vlr = 40;
        //echo '<script>alert("4")</script>';
        break;
      case 5:
        $vlr = 50;
        //echo '<script>alert("5")</script>';
        break;
      default:
        $vlr = 0;
        //echo '<script>alert("6")</script>';
      }

      $row_perfil["reputacao"] = $row_perfil["reputacao"] - $vlr;

      $query_up_usuario = "UPDATE perfil SET reputacao = :reputacao WHERE Id_user_fk = :id";
      $edit_usuario = $conn->prepare($query_up_usuario);
      $edit_usuario->bindParam(':reputacao', $row_perfil["reputacao"], PDO::PARAM_STR);
      $edit_usuario->bindParam(':id', $row_usuario['id_user'], PDO::PARAM_INT);
      $edit_usuario->execute();
      echo '<script>alert("Reportado")</script>';
      header("Location: busca.php");
    }
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
    

<section class="bg-white dark:bg-zinc-900">
  <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
      <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-zinc-900 dark:text-white">Reportar <?php echo $row_usuario['nickname'];?></h2>
      <p class="mb-8 font-light text-center text-zinc-500 dark:text-zinc-400 text-lg">
        Motivo da sua denuncia:</p>  
      <div class="flex justify-center">  
        <form action="" method="POST" class="space-y-8 text-center p-6 w-1/2 mx-center bg-zinc-800 rounded-md ">

            <div class="flex items-center mb-4 text-center mx-auto">
                <input type="radio" value="1" name="radio" class="w-4 h-4 text-red-600 bg-gray-100 accent-red-500">
                <label
                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Assédio ou bullying</label>
            </div>
            <div class="flex items-center mb-4 text-center mx-auto">
                <input type="radio" value="2" name="radio" class="w-4 h-4 text-red-600 bg-gray-100 accent-red-500">
                <label
                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Racismo</label>
            </div>
            <div class="flex items-center mb-4  mx-auto">
                <input type="radio" value="3" name="radio" class="w-4 h-4 text-red-600 bg-gray-100 accent-red-500">
                <label
                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Promove terrorismo</label>
            </div>
            <div class="flex items-center mb-4 text-center mx-auto">
                <input type="radio" value="4" name="radio" class="w-4 h-4 text-red-600 bg-gray-100 accent-red-500">
                <label
                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Spam ou enganoso</label>
            </div>

            <div class="flex items-center mb-4 text-center mx-auto">
                <input type="radio" value="5" name="radio" class="w-4 h-4 text-red-600 bg-gray-100 accent-red-500">
                <label
                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">O problema não está entre os listados acima</label>
            </div>

            <button type="submit" name="btnreport" value="1" class="mt-3 rounded-sm px-5 py-2 bg-red-600 text-white duration-300 hover:bg-red-700">Enviar</button>
        </form>
      </div>  
  </div>
</section> 

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