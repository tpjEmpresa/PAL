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

        @keyframes rotate {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
        }

        .gradient {
        --size: 250px;
        --speed: 50s;
        --easing: cubic-bezier(0.8, 0.2, 0.2, 0.8);

        width: var(--size);
        height: var(--size);
        filter: blur(calc(var(--size) / 5));
        background-image: linear-gradient(hsl(360, 82, 57, 85%), hsl(252, 82, 57));
        animation: rotate var(--speed) var(--easing) alternate infinite;
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        }

        @media (min-width: 720px) {
        .gradient {
            --size: 500px;
        }
        }

    </style>
</head>
<body>

<header class="sticky top-0 z-10">
  <nav class="flex justify-between p-2 px-2 sm:px-6 bg-zinc-800">
    <a href="index.php"><!--LINK-->
        <div>
        <img src="pics/pal.png" alt="logo" class="" width="120"> 
        </div>
    </a>

    <a class=" border text-white px-4 p-2 rounded-md cursor-pointer hover:border hover:border-red-600 
    hover:bg-red-600 font-semibold flex transition-all"
    href="login.php"><!--LINK login-->
      <p class="m-auto">ENTRAR</p>
    </a>
  </nav>
</header>

<main class="flex justify-center h-full bg-[url('pics/bgland.jpg')] bg-cover bg-center bg-fixed bg-no-repeat">
  <div class=" flex justify-center flex-col text-center gap-2 ">
    <p class="font-bold text-6xl pb-2 text-zinc-100" >
      Player's and Allie's <br> Locator
    </p>

      <a class=" border border-zinc-100 bg-white bg-opacity-20 text-zinc-100 text-xl px-6 p-4 rounded-md cursor-pointer hover:border hover:border-red-600 hover:bg-red-600 hover:text-white transition-all font-semibold flex w-3/5 mx-auto"
      href="cadastro.php"><!--LINK cadastro-->
        <p class="m-auto">CRIAR CONTA</p>
      </a>
  </div>
</main>

<div class="bg-zinc-800 h-20"></div>

<!--PLANOS-->
<section class="bg-white dark:bg-zinc-900">
  <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
      <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
          <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">O plano perfeito para você</h2>
          <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Nossos planos foram desenvolvidos para atender tanto jogadores casuais quanto aqueles que buscam uma experiência premium.</p>
      </div>
      <div class="space-y-8 lg:grid lg:grid-cols-2 sm:gap-6 xl:gap-10 lg:space-y-0">
          <!-- Pricing Card -->
          <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-zinc-800 dark:text-white">
              <h3 class="mb-4 text-2xl font-semibold">FREE</h3>
              <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Nosso plano Free oferece recursos incríveis para ajudar você a encontrar parceiros de jogo ideais de forma gratuita.</p>
              <div class="flex justify-center items-baseline my-8">
                  <span class="mr-2 text-5xl font-extrabold">$0</span>
                  <span class="text-gray-500 dark:text-gray-400">/mês</span>
              </div>
              <!-- List -->
              <ul role="list" class="mb-8 space-y-4 text-left">
                  <li class="flex items-center space-x-3">
                      <!-- Icon -->
                      <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                      <span>Visualização de perfis</span>
                  </li>
                  <li class="flex items-center space-x-3">
                      <!-- Icon -->
                      <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                      <span>Acesso à página de busca</span>
                  </li>
                  <li class="flex items-center space-x-3">
                      <!-- Icon -->
                      <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                      <span>Adicionar jogos</span>
                  </li>
                  <li class="flex items-center space-x-3">
                      <!-- Icon -->
                      <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                      <span>Adicionar redes sociais</span>
                  </li>
                  <li class="flex items-center space-x-3">
                      <!-- Icon -->
                      <svg class="flex-shrink-0 w-5 h-5 text-yellow-500 dark:text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                      <span>Exibição de anuncios</span>
                  </li>
              </ul>
              <a href="cadastro.php" class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:ring-primary-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-primary-900">Cria Conta</a>
          </div>
          <!-- Pricing Card -->
          
          <!-- Pricing Card -->
          <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-zinc-800 dark:text-white">
              <h3 class="mb-4 text-2xl font-semibold">PREMIUM</h3>
              <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Nosso Plano Premium vai além das expectativas. </p>
              <div class="flex justify-center items-baseline my-8">
                  <span class="mr-2 text-5xl font-extrabold">$5</span>
                  <span class="text-gray-500 dark:text-gray-400">/mês</span>
              </div>
              <!-- List -->
              <ul role="list" class="mb-8 space-y-4 text-left">
                  <li class="flex items-center space-x-3">
                      <!-- Icon -->
                      <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                      <span>Visualização de perfis</span>
                  </li>
                  <li class="flex items-center space-x-3">
                      <!-- Icon -->
                      <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                      <span>Acesso à página de busca</span>
                  </li>
                  <li class="flex items-center space-x-3">
                      <!-- Icon -->
                      <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                      <span>Adicionar jogos</span>
                  </li>
                  <li class="flex items-center space-x-3">
                      <!-- Icon -->
                      <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                      <span>Adicionar redes sociais</span>
                  </li>
                  <li class="flex items-center space-x-3">
                      <!-- Icon -->
                      <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                      <span>Sem anuncios</span>
                  </li>
                  <li class="flex items-center space-x-3">
                      <!-- Icon -->
                      <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                      <span>Badge de verificado</span>
                  </li>
                  <li class="flex items-center space-x-3">
                      <!-- Icon -->
                      <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                      <span >Foto de perfil animada</span>
                  </li>
              </ul>
              <a href="cadastro.php" class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:ring-primary-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-primary-900">Criar Conta</a>
          </div>
      </div>
  </div>
</section>

<div class="m-4 flex h-20 gap-10 border-b border-zinc-400 p-3"></div>

<!--SOBRE-->
<section class="flex sm:h-3/6 h-full m-4 sm:justify-between bg-zinc-900 flex-col sm:flex-row text-zinc-800 ">

        <div class="sm:w-2/4 p-4 ">
          <h1 class="text-4xl font-semibold pb-2 text-white">Quem Somos?</h1>
          <p class="text-zinc-200 text-lg ml-3">Uma empresa especializada em proporcionar uma experiência única e envolvente no mundo dos jogos online cooperativos. Nosso principal objetivo é ajudar jogadores a encontrarem os amigos ideais para unirem forças e enfrentarem desafios virtuais juntos.</p>
          <br>
          <a href="saibamais.php" class="p-2 ml-3 text-zinc-100 border rounded-sm hover:bg-zinc-100 hover:text-zinc-800 transition-colors">SAIBA MAIS</a>
        </div>

        <div class="bg-zinc-900 sm:w-2/4 h-full  mx-2  bg-[url('pics/grupo.png')] bg-contain bg-center  bg-no-repeat">

        </div>
</section>



<!--RODA PE-->
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