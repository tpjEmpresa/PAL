<?php
ob_start();
include_once 'php/conexao.php';
include_once 'php/cod_editarPerfil.php';

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
$row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
$_SESSION['id_perfil'] = $row_usuario['id_perfil'];

$query_jogo = "SELECT id_jogo, jogo, ranking FROM Jogo WHERE Id_perfil_fk = ".$_SESSION['id_perfil']." LIMIT 2";
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
    if (!empty($dados['EditPerfil'])) {
        $_SESSION["dados"] = $dados;
        header("Location: php/cod_editarPerfil.php");
    }
    if (!empty($dados['removejogo'])) {
      $_SESSION["dados"] = $dados;
      header("Location: php/cod_editarPerfil.php");
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
        <img src="/pics/pal.png" alt="logo" class="" width="120"> 
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




<main class="flex h-screen bg-zinc-900 m-10">
  <div class="m-4 flex flex-1 rounded-md  p-4 flex-col gap-2">
    <form name="edit-usuario" method="POST" action="" class="mx-auto flex flex-col gap-2 sm:w-1/3 w-full">
      <label for="" class="text-md text-zinc-400">mude sobre você</label>
      <textarea name="descricao" placeholder="descricao" maxlength="300" minlength="10" class="rounded-sm mb-3 p-1 px-2 text-lg resize-none h-36" required><?php echo $row_usuario['descricao']; ?></textarea>

      <label class="text-md text-zinc-400">Adicione os jogos que voce joga</label>
      <label for=""class="text-sm text-zinc-400">jogo:</label>
        <select name="jogo" class="rounded-sm p-1 px-2 text-lg" onchange="qualjg()" id="combox" required>
            <option value="none"></option>
            <option value="cs:go">cs:go</option>
            <option value="valorant">Valorant</option>
        </select>
        <label for=""class="text-sm text-zinc-400">rank:</label>
        <select name="rankcs" class="rounded-sm p-1 px-2 text-lg" id="csgo">
            <option value="nenhum"></option>
            <option value="nenhum">nenhum</option>
            <option value="prata">prata</option>
            <option value="ouro">ouro</option>
            <option value="mestre guadiao">mestre guadiao</option>
            <option value="xerife">xerife</option>
            <option value="aguia">aguia</option>
            <option value="supremo">supremo</option>
            <option value="global">global</option>
        </select>
        <select name="rankval" class="rounded-sm hidden p-1 px-2 text-lg" id="valorant">
            <option value="nenhum"></option>
            <option value="nenhum">nenhum</option>
            <option value="ferro">ferro</option>
            <option value="bronze">bronze</option>
            <option value="prata">prata</option>
            <option value="ouro">ouro</option>
            <option value="platina">platina</option>
            <option value="diamante">diamante</option>
            <option value="imortal">imortal</option>
            <option value="radiant">radiant</option>
        </select>

      <script>
        function qualjg() {
            var selectedOption = document.getElementById("combox").value;

            if (selectedOption === "cs:go") {
            document.getElementById("csgo").classList.remove("hidden");
            document.getElementById("valorant").classList.add("hidden");
            }
            else if (selectedOption === "valorant") {
            document.getElementById("csgo").classList.add("hidden");
            document.getElementById("valorant").classList.remove("hidden");
            }
            else {
            document.getElementById("csgo").classList.add("hidden");
            document.getElementById("valorant").classList.add("hidden");
            }
        }
      </script>


      <input type="submit" value="Editar" name="EditPerfil" class="rounded-sm bg-red-700 p-2 font-medium transition-all hover:bg-red-600 hover:text-zinc-200" />

      <div class="mx-auto flex flex-col gap-4  m-3">

      <label class="text-md text-zinc-400 text-center">remova os jogos </label>

      <?php
        foreach ($conn->query($query_jogo) as $row) {
      ?>
        <div class="flex gap-6 px-10 p-2 justify-between text-lg font-medium rounded-md border border-red-500  text-zinc-200" >
          <div class="text-center w-full">
            
            <p><span class="text-sm text-zinc-400">jogo: </span><?php print $row['jogo'];?></p>
            <p><span class="text-sm text-zinc-400">rank: </span><?php print $row['ranking'];?></p>
          </div>
          <?php
          echo '<td><button type="submit" name="removejogo" value="'.$row['id_jogo'].'" class="text-red-700  hover:text-red-500 hover:bg-zinc-950  px-2 rounded-md">Delete</button></td>';
          ?>
        </div> 
      <?php
        }
      ?>

    </form>

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