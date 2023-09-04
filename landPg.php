<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="imgs/ico.png" type="image/x-icon">
    <title>PAL</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
 
    <style>
      *{
        font-family: 'Inter';
      }
        body{
            height: 100vh;
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
    <a href="#1"><!--LINK-->
        <div>
        <img src="imgs/pal.png" alt="logo" class="" width="120"> 
        </div>
    </a>

    <a class=" border text-white px-4 p-2 rounded-md cursor-pointer hover:border hover:border-red-600 
    hover:bg-red-600 font-semibold flex transition-all"
    href="#"><!--LINK-->
      <p class="m-auto">ENTRAR</p>
    </a>
  </nav>
</header>

<main class="flex justify-center h-full bg-[url('imgs/bgland.jpg')] bg-cover bg-center bg-fixed bg-no-repeat">
  <div class=" flex justify-center flex-col text-center gap-2 ">
    <p class="font-bold text-6xl pb-2 text-zinc-100">
      Player's and Allie's <br> Locator
    </p>

      <a class=" border border-zinc-100 text-zinc-100 text-xl px-6 p-4 rounded-md cursor-pointer hover:border hover:border-red-600 hover:bg-red-600 hover:text-white transition-all font-semibold flex w-3/5 mx-auto"
      href="#"><!--LINK-->
        <p class="m-auto">CRIAR CONTA</p>
      </a>
  </div>
</main>

<div class="bg-zinc-800 h-20"></div>

<!--PLANOS-->
<section class="bg-zinc-800 h-full flex sm:justify-evenly sm:flex-row flex-col gap-2 text-zinc-800 ">

        <div class="bg-zinc-100 sm:w-2/5 w-full flex flex-col my-auto h-3/4 sm:rounded-md shadow-2xl">
          <h1 class="m-auto text-4xl font-semibold">FREE</h1>
          <ul class="list-disc p-2 m-auto text-xl">
            <li>asas</li>
            <li>asas</li>
            <li>asas</li>
            <li>asas</li>
          </ul>
          <a class="m-auto mx-auto border w-2/5 border-black  text-xl p-2 rounded-md cursor-pointer hover:border hover:border-red-600 hover:bg-red-600 hover:text-white transition-all font-semibold flex mx-4"
           href="#"><!--LINK-->
            <p class="m-auto">CRIAR CONTA</p>
          </a>
        </div>

        <div class="bg-zinc-100 sm:w-2/5 w-full flex flex-col my-auto h-3/4 sm:rounded-md shadow-2xl">
          <h1 class="m-auto text-4xl font-semibold">PREMIUM</h1>
          <ul class="list-disc p-2 m-auto text-xl">
            <li>asas</li>
            <li>asas</li>
            <li>asas</li>
            <li>asas</li>
          </ul>
          <a class="m-auto mx-auto border w-2/5 border-black  text-xl p-2 rounded-md cursor-pointer hover:border hover:border-red-600 hover:bg-red-600 hover:text-white transition-all font-semibold flex mx-4"
           href="#"><!--LINK-->
            <p class="m-auto">CRIAR CONTA</p>
          </a>
        </div>
</section>

<div class="bg-zinc-800 h-20"></div>

<!--SOBRE-->
<section class="flex sm:h-3/6 h-full sm:justify-between bg-zinc-100 flex-col sm:flex-row text-zinc-800 ">

        <div class="sm:w-2/4 p-4">
          <h1 class="text-4xl font-semibold pb-2">Quem Somos?</h1>
          <p class="">Equipe formada for um grupo de estudantes, PAL tambem conhecida como TPJ, foi uma e Empresa criada com o unico intuito de criar um mundo melhor.</p>
        </div>

        <div class="bg-zinc-100 sm:w-2/4 h-full  bg-[url('imgs/grupo.png')] bg-contain bg-center  bg-no-repeat">

        </div>
</section>

<div class="bg-zinc-800 h-20"></div>

<!--RODA PE-->
<footer class="h-40 bg-zinc-800 text-zinc-400 flex flex-col">
  <div class="flex justify-evenly p-2  mx-4 my-auto gap-4">
    <div class="flex sm:gap-20 gap-4">
      <a  class=" hover:text-zinc-100 transition-colors"
      href="">SUPORTE</a><!--LINK-->
      <p>*</p>
      <a class=" hover:text-zinc-100 transition-colors"
      href="" >SAIBA MAIS</a><!--LINK-->
      <p>*</p>
      <a  class=" hover:text-zinc-100 transition-colors"
      href="">CONTATO</a><!--LINK-->
    </div>
    <div>
      <a class=" hover:text-zinc-100 transition-colors"
      href="">CRIAR CONTA / ENTRAR</a><!--LINK-->
    </div>
  </div>

  <div class="text-center p-2 text-sm my-auto">
    TODOS OS DIREITOS RESERVADOS A TPJEMPRESA @2023
  </div>
</footer>
</body>
</html>