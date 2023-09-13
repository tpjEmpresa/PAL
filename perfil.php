<?php
session_start();
ob_start();
include_once 'php/conexao.php';

if(!isset($_SESSION['id_user'])){
    $_SESSION = [];
    $_SESSION['msg'] = '<script>alert("Erro: Necessário realizar o login para acessar a página!")</script>';
    header("Location: index.php");
    exit();
}

$query_usuario = "SELECT id_perfil, descricao FROM Perfil WHERE Id_user_fk = :id LIMIT 1";
$result_usuario = $conn->prepare($query_usuario);
$result_usuario->bindParam(':id', $_SESSION['id_user'], PDO::PARAM_STR);
$result_usuario->execute();

if (($result_usuario) AND ($result_usuario->rowCount() != 0)) {
    $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
} else {
    $_SESSION['msg'] = '<script>alert("Erro: Usuário não encontrado!")</script>';
    header("Location: index.php");
    exit();
}

$query_jogo = "SELECT jogo, ranking FROM Jogo WHERE Id_perfil_fk = ".$row_usuario['id_perfil']." LIMIT 2";
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
    <a  class="border border-zinc-400 rounded-sm m-1 p-1 text-zinc-500 hover:text-black hover:border-black" href="busca.php">ir para pagina de busca</a>
  </div>
</header>
    

<main class="sm:m-16 ">
    <div class="bg-zinc-100 w-full px-3 font-mono flex justify-between"><p class="font-mono">Perfil do <span class="font-semibold "><?php echo $_SESSION['nickName']; ?></span></p><a href="editarPerfil.php" class="hover:text-black text-zinc-700 font-mono">Editar perfil</a></div>
    <div class="flex border sm:flex-row flex-col">

        <div class="sm:w-1/3 p-3 flex sm:flex-col gap-3 w-full ">
            <div class="w-80 h-80 m-auto bg-[url('pics/pfp.jpg')] bg-cover bg-center">
                foto
            </div>
            <div>
                <h1 class="text-sm text-zinc-400 text-center">minhas redes socias</h1>
                <div class="flex justify-center sm:flex-row flex-col ">
                    <div><a href="#"><img src="pics/steam.png" alt="" class="w-12 mx-auto " /></a></div>
                    <div><a href="#"><img src="pics/twitter.png" alt="" class="w-12 mx-auto opacity-90" /></a></div>
                </div>
            </div>
        </div>


        <div class=" flex flex-1 flex-col justify-around p-3">
            <div class="text-zinc-300 h-1/3">
                <h1 class="text-sm text-zinc-400">sobre mim</h1>
                <p class="ml-3"><?php echo $row_usuario['descricao']; ?></p>
            </div>
            <div class="flex-1">
                <h1 class="text-sm text-zinc-400 mb-1">jogos jogados</h1>
                <div class=" bg-zinc-800 min-h-2/3 flex  flex-wrap">

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
            </div>
        </div>
    </div>
</main>

</body>
</html>