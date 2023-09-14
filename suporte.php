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

      


        <!-- MENU DROP DOWN-->
        <div class="dropdown my-auto">
          <button class="font-mono hover:bg-zinc-700 p-1">
            </button><!--NOME USER-->

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

</header>
    
<h2 class="mb-4 text-4xl p-3 tracking-tight font-extrabold text-center text-zinc-900 dark:text-white">
    Suporte 
</h2>

<section class="flex flex-col gap-8">
    <div class="sm:w-2/3 mx-auto p-2">
        <h2 class=" text-2xl tracking-tight font-extrabold  text-zinc-900 dark:text-white">Esqueci Minha senha</h2>
        <p class="text-sm text-zinc-300 ml-3">Se você esqueceu sua senha, não se preocupe. Vamos guiá-lo através do processo de recuperação da senha para que você possa acessar sua conta novamente. Siga as etapas abaixo:
            <span id="dots1">...</span>
            <br>
            <span id="more1" class="hidden">
            <span class="ml-3">1. Acesse o site do Players and Allies Locator. <br>  </span>
            <span class="ml-3">2. Na página de login, clique em "Esqueceu sua senha?". <br></span>
            <span class="ml-3">3. Insira o endereço de e-mail associado à sua conta. <br></span>
            <span class="ml-3">4. Você receberá um e-mail com a sua nova senha. <br></span>
            <br>
            Se você encontrar dificuldades durante o processo de recuperação de senha, entre em contato conosco. Nossa equipe de suporte terá prazer em ajudá-lo a recuperar o acesso à sua conta.
            </span>
        </p>
        <button onclick="toggleText1()" id="button1"
            class="mt-3 rounded-sm px-5 py-2 bg-red-600 text-white duration-300 hover:bg-red-700">Ver Mais</button>
    <a href="contato.php" class="hover:text-red-600 hover:underline text-white ml-3">Ir para pagina de Contato</a>
    </div>
    

    <div class="sm:w-2/3 mx-auto p-2">
        <h2 class=" text-2xl tracking-tight font-extrabold  text-zinc-900 dark:text-white">
            Como Consigo Apagar Minha Conta?
        </h2>
        <p class="text-sm text-zinc-300 ml-3">Se você deseja excluir sua conta do Players and Allies Locator, siga os passos abaixo:
            <span id="dots2">...</span>
            <br>
            <span id="more2" class="hidden">
            <span class="ml-3">1. Faça login na sua conta. <br>  </span>
            <span class="ml-3">2. Vá para as configurações do site. <br></span>
            <span class="ml-3">3. Procure a opção "Excluir conta" ou "Apagar conta".<br></span>
            <span class="ml-3">4. Confirme sua decisão seguindo as instruções adicionais fornecida. <br></span>
            <br>
            Lembre-se de que a exclusão da conta é uma ação permanente e todas as suas informações, amigos e dados associados serão removidos definitivamente. Portanto, certifique-se de estar certo da sua decisão antes de prosseguir com a exclusão. Se você tiver qualquer dificuldade ao tentar excluir sua conta, entre em contato conosco para obter assistência personalizada.
            </span>
        </p>
        <button onclick="toggleText2()" id="button2"
            class="mt-3 px-5 py-2 rounded-sm bg-red-600 text-white duration-300 hover:bg-red-700">Ver Mais</button>
        <a href="contato.php" class="hover:text-red-600 hover:underline text-white ml-3">Ir para pagina de Contato</a>
    </div>

    <div class="sm:w-2/3 mx-auto p-2">
        <h2 class=" text-2xl tracking-tight font-extrabold  text-zinc-900 dark:text-white">
            Não Consigo Mudar Meu Nome
        </h2>
        <p class="text-sm text-zinc-300 ml-3">Se você está com problemas para alterar o seu nome de usuário ou nome exibido no Players and Allies Locator, siga estas etapas:
            <span id="dots3">...</span>
            <br>
            <span id="more3" class="hidden">
            <span class="ml-3">1. Faça login na sua conta. <br>  </span>
            <span class="ml-3">2. Vá para as configurações do site. <br></span>
            <span class="ml-3">3. Procure a opção "Editar nome" ou "Alterar nome de usuário". <br></span>
            <span class="ml-3">4. Faça as alterações desejadas no seu nome e salve as alterações. <br></span>
            <br>
            Se você encontrar algum problema durante este processo ou se a opção não estiver disponível, entre em contato com nossa equipe de suporte. Faremos o possível para ajudar a resolver o problema e atualizar o seu nome conforme desejado.
            </span>
        </p>
        <button onclick="toggleText3()" id="button3"
            class="mt-3 rounded-sm px-5 py-2 bg-red-600 text-white duration-300 hover:bg-red-700">Ver Mais</button>

            <a href="contato.php" class="hover:text-red-600 hover:underline text-white ml-3">Ir para pagina de Contato</a>
    </div>
    <script>
        function toggleText1() {
            var dots = document.getElementById("dots1");
            var moreText = document.getElementById("more1");
            var button = document.getElementById("button1");

            if (dots.classList.contains("hidden")) {
                // Show the dots
                dots.classList.remove("hidden");

                // Hide the more text
                moreText.classList.add("hidden");

                // change text of the button
                button.innerHTML = "Ver Mais";
            } else {
                // Hide the dots
                dots.classList.add("hidden");

                // hide the more text
                moreText.classList.remove("hidden");

                // change text of the button
                button.innerHTML = "Ver Menos";
            }
        }

        function toggleText2() {
            var dots = document.getElementById("dots2");
            var moreText = document.getElementById("more2");
            var button = document.getElementById("button2");

            if (dots.classList.contains("hidden")) {
                // Show the dots
                dots.classList.remove("hidden");

                // Hide the more text
                moreText.classList.add("hidden");

                // change text of the button
                button.innerHTML = "Ver Mais";
            } else {
                // Hide the dots
                dots.classList.add("hidden");

                // hide the more text
                moreText.classList.remove("hidden");

                // change text of the button
                button.innerHTML = "Ver Menos";
            }
        }
        function toggleText3() {
            var dots = document.getElementById("dots3");
            var moreText = document.getElementById("more3");
            var button = document.getElementById("button3");

            if (dots.classList.contains("hidden")) {
                // Show the dots
                dots.classList.remove("hidden");

                // Hide the more text
                moreText.classList.add("hidden");

                // change text of the button
                button.innerHTML = "Ver Mais";
            } else {
                // Hide the dots
                dots.classList.add("hidden");

                // hide the more text
                moreText.classList.remove("hidden");

                // change text of the button
                button.innerHTML = "Ver Menos";
            }
        }
    </script>









</section>

<div class=" h-20"></div>

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