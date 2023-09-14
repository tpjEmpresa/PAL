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

<section class="bg-white dark:bg-zinc-900">
  <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
      <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-zinc-900 dark:text-white">Entre em Contato</h2>
      <p class="mb-8 lg:mb-16 font-light text-center text-zinc-500 dark:text-zinc-400 sm:text-xl">Estamos sempre prontos para ajudar. Se você tiver alguma dúvida, sugestão ou precisar de suporte adicional, entre em contato conosco. Teremos o prazer de ajudá-lo a qualquer momento.</p>
      <form action="#" class="space-y-8">
          <div>
              <label for="email" class="block mb-2 text-sm font-medium text-zinc-900 dark:text-zinc-300">Seu email</label>
              <input type="email" id="email" class="shadow-sm bg-zinc-50 border border-zinc-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-zinc-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="name@gmail.com" required>
          </div>
          <div>
              <label for="subject" class="block mb-2 text-sm font-medium text-zinc-900 dark:text-zinc-300">Motivo</label>
              <input type="text" id="subject" class="block p-3 w-full text-sm text-zinc-900 bg-zinc-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-zinc-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Nos ajude a te ajudar" required>
          </div>
          <div class="sm:col-span-2">
              <label for="message" class="block mb-2 text-sm font-medium text-zinc-900 dark:text-zinc-400">Messagem</label>
              <textarea id="message" rows="6" class="block p-2.5 w-full text-sm text-zinc-900 bg-zinc-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-zinc-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Escreva o porque..."></textarea>
          </div>
          <button type="submit" class="mt-3 rounded-sm px-5 py-2 bg-red-600 text-white duration-300 hover:bg-red-700">Enviar</button>
      </form>
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