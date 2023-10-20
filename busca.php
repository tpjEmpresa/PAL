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

//$query_usuario = "SELECT id_user, nickName, id_perfil FROM user join perfil on (id_user = id_user_fk) WHERE id_user != ".$_SESSION['id_user'].";";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
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

    //$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if (!empty($_POST['visita'])) {
      $_SESSION["visita"] = $_POST['visita'];
      header("Location: visitaperfil.php");
    }
    if (!empty($_POST['report'])) {
      $_SESSION["reportid"] = $_POST['report'];
      header("Location: report.php");
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
    <a  class="border border-zinc-400 rounded-sm m-1 p-1 text-zinc-500 hover:text-black hover:border-black" 
    href="perfil.php">ir para perfil</a>
  </div>
</header>

<main class="flex sm:flex-row flex-col gap-8 p-4 text-zinc-100 bg-zinc-900">
<!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->


<?php
$query_usuario = "SELECT id_user, nickName, id_perfil, MAX(CASE WHEN jogo = 'cs:go' THEN jogo END) AS csgo, MAX(CASE WHEN jogo = 'valorant' THEN jogo END) AS valorant FROM user JOIN perfil ON (id_user = id_user_fk) LEFT JOIN jogo ON (id_perfil = id_perfil_fk) GROUP BY id_user, nickName, id_perfil;";
    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $csChecked = isset($_POST['cs']) ? $_POST['cs'] : false;
        $vaChecked = isset($_POST['va']) ? $_POST['va'] : false;
        $reChecked = isset($_POST['re']) ? $_POST['re'] : false;
        
        if($reChecked){
          $query_usuario = "SELECT id_user, nickName, id_perfil, MAX(CASE WHEN jogo = 'cs:go' THEN jogo END) AS csgo, MAX(CASE WHEN jogo = 'valorant' THEN jogo END) AS valorant FROM user JOIN perfil ON (id_user = id_user_fk) LEFT JOIN jogo ON (id_perfil = id_perfil_fk) GROUP BY id_user, nickName, id_perfil;";

        }

        if ($csChecked) {
          $query_usuario = "SELECT 
          id_user, 
          nickName, 
          id_perfil,
          csgo 
      FROM 
          (SELECT 
              id_user, 
              nickName, 
              id_perfil,
              MAX(CASE WHEN jogo = 'cs:go' THEN jogo END) AS csgo,
              MAX(CASE WHEN jogo = 'valorant' THEN jogo END) AS valorant
          FROM 
              user
          JOIN 
              perfil ON (id_user = id_user_fk)
          LEFT JOIN 
              jogo ON (id_perfil = id_perfil_fk)
          GROUP BY 
              id_user, 
              nickName, 
              id_perfil) AS subquery
      WHERE 
          csgo IS NOT NULL
          AND valorant IS NULL;";
 
          
        }

        if ($vaChecked) {
          $query_usuario = "SELECT 
          id_user, 
          nickName, 
          id_perfil,
          valorant
      FROM 
          (SELECT 
              id_user, 
              nickName, 
              id_perfil,
              MAX(CASE WHEN jogo = 'cs:go' THEN jogo END) AS csgo,
              MAX(CASE WHEN jogo = 'valorant' THEN jogo END) AS valorant
          FROM 
              user
          JOIN 
              perfil ON (id_user = id_user_fk)
          LEFT JOIN 
              jogo ON (id_perfil = id_perfil_fk)
          GROUP BY 
              id_user, 
              nickName, 
              id_perfil) AS subquery
      WHERE 
          csgo IS NULL
          AND valorant IS NOT NULL;";
        }

        if($csChecked && $vaChecked ){
          $query_usuario = "SELECT 
          id_user, 
          nickName, 
          id_perfil,
          csgo,
          valorant
      FROM 
          (SELECT 
              id_user, 
              nickName, 
              id_perfil,
              MAX(CASE WHEN jogo = 'cs:go' THEN jogo END) AS csgo,
              MAX(CASE WHEN jogo = 'valorant' THEN jogo END) AS valorant
          FROM 
              user
          JOIN 
              perfil ON (id_user = id_user_fk)
          LEFT JOIN 
              jogo ON (id_perfil = id_perfil_fk)
          GROUP BY 
              id_user, 
              nickName, 
              id_perfil) AS subquery
      WHERE 
          csgo IS NOT NULL
          AND valorant IS NOT NULL;";
        }

    }
?>
<!-- FORM DE FILTROS -->

  <form action="" method="post" class="sm:w-1/4">
    <h1 class="text-2xl">FILTROS</h1>
    <h2>Jogos</h2>
    <div class="flex sm:gap-0 gap-2 sm:flex-col flex-wrap">
      <div class="flex gap-2 text-lg ">    
        <input type="checkbox" name="cs" id="" class="w-5 h-5 my-auto cursor-pointer">
        <label for="">CS:GO</label>
      </div>
      <div class="flex gap-2 text-lg">    
        <input type="checkbox" name="va" id="" class="w-5 h-5 my-auto cursor-pointer">
        <label for="">VALORANT</label>
      </div>
      <div class="flex gap-2 text-lg sm:mb-3 ">    
        <input type="checkbox" name="re" id="" class="w-5 h-5 my-auto cursor-pointer">
        <label for="">remover filtros</label>
      </div>

      <input type="submit" value="FILTRAR" class="bg-zinc-100 border hover:bg-zinc-800 px-3 mx-3 sm:mx-0 h-fit text-zinc-800 hover:text-zinc-100 font-semibold cursor-pointer transition-all">
      </div>
    </form>

<!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->
<!-- GRID PROS CARDS-->

  <div class=" w-full grid md:grid-cols-4  gap-2 ">

<!--ESSA DIV AI EMBAXIO É O CARD Q MOSTRA O NOME, FOTO E OS JOGOS QUE O CARA JOGA-->
<?php
    foreach ($conn->query($query_usuario) as $row) {
?>
    <div id="hid" class="container border w-full flex flex-col p-2 rounded-sm ">
      <div class="flex justify-between">
      <form name="" method="POST" action="">
        <?php
          echo '<td><button type="submit" name="visita" value="'.$row['id_user'].'" class=""><h1 class="text-xl font-medium px-3 py-1 hover:text-white transition-colors">'. $row['nickName'].'</h1></button></td>';
        ?>
        <!-- <h1 class="text-xl font-medium px-3 py-1 hover:text-white transition-colors"><php print $row['nickName'];?></h1> -->
        <?php
          echo '<td><button type="submit" name="report" value="'.$row['id_user'].'" class=""><p class="text-sm text-red-800 hover:text-red-600 transition-colors">report</p></button></td>';
        ?>
        <!-- <a class="text-sm text-red-800 hover:text-red-600 transition-colors" href="report.php">report</a> -->
      </form>
      </div>
      <img src="pics/pfp.jpg" alt="" height="50" width="50" class="mx-3 my-1 "/>
      <p class="text-sm text-zinc-500 px-3 ">tags:</p>
      <div class="px-6 pt-4 pb-2 flex flex-row flex-wrap group">
                <span class=" bg-zinc-200 rounded-full px-3 py-1 text-sm h-fit font-semibold text-zinc-700 mr-2 mb-2 hover:text-zinc-600 hover:bg-zinc-300 transition-colors"><?php if(!empty($row['csgo'])){print $row['csgo'];}?></span>
                <span class=" bg-zinc-200 rounded-full px-3 py-1 text-sm h-fit font-semibold text-zinc-700 mr-2 mb-2 hover:text-zinc-600 hover:bg-zinc-300 transition-colors"><?php if(!empty($row['valorant'])){print $row['valorant'];}?></span>
      </div>
    </div>
<?php

    }
?>
    
  </div>
</main>
<!-- TO PRA COLOCAR O RODA PÉ SEGURA AE -->
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