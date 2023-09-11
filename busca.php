<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
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
            --tw-bg-opacity: 1;
            background-color: rgb(39 39 42 / var(--tw-bg-opacity));
        }
    </style>
</head>
<body>
<header class="sticky top-0 z-10">
  <nav class="flex justify-between p-2 px-2 sm:px-6 bg-zinc-800">
    <a href="#1"><!--LINK-->
        <div>
        <img src="/imgs/pal.png" alt="logo" class="" width="120"> 
        </div>
    </a>

    <div class="flex text-white gap-2">
      <div class="m-auto ">

      <div class="flex gap-2">
        <a href="#"><div class="h-8 w-8 shrink-0 overflow-hidden bg-[url('imgs/bell.png')] bg-cover bg-center invert hover:opacity-75 ">
        <!--FOTO NOTIFY-->
        </div></a>
        <div class="dropdown my-auto">
          <button class="font-mono hover:bg-zinc-700 p-1">UserName<i>👇</i></button><!--NOME USER-->

          <div class="absolute bg-zinc-800  border dropdown-menu opacity-0 invisible right-10 ">
            <ul class="text-sm font-medium">
              <li class="hover:bg-zinc-100 hover:text-black p-2 transition-colors">
                <a href="">Editar Perfil</a><!--LINK-->
              </li>
              <li class="hover:bg-zinc-100 hover:text-black p-2  transition-colors">
                <a href="">Configuracão do site</a><!--LINK-->
              </li>
              <li  class="hover:bg-red-100 hover:text-black p-2  transition-colors">
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
    
      <a href="" class="m-auto">
        <div class="h-8 w-8 shrink-0 overflow-hidden bg-[url('https://exploringbits.com/wp-content/uploads/2022/01/Manga-PFP-6.jpg?ezimgfmt=rs:300x300/rscb3/ng:webp/ngcb3')] bg-cover bg-center ">
            <!--FOTO USER-->
        </div>
       </a>
    </div>
  </nav>
  <div class="flex justify-center border-y border-zinc-800  bg-white">
    <input type="text"  class="border border-zinc-400  text-zinc-500" placeholder="busca">
  </div>
</header>

<section class="flex sm:flex-row flex-col gap-8 p-4 text-zinc-100 bg-zinc-800">

  <form action="" method="post">
    <h1 class="text-2xl">FILTROS</h1>
    <h2>Jogos</h2>
    <div class="flex sm:gap-0 gap-2 sm:flex-col ">
      <div class="flex gap-2 text-lg ">    
        <input type="checkbox" name="" id="" class="w-5 h-5 my-auto cursor-pointer">
        <label for="">CS:GO</label>
      </div>
      <div class="flex gap-2 text-lg sm:mb-3 ">    
        <input type="checkbox" name="" id="" class="w-5 h-5 my-auto cursor-pointer">
        <label for="">VALORANT</label>
      </div>

      <input type="submit" value="FILTRAR" class="bg-zinc-100 border hover:bg-zinc-800 px-3 mx-3 sm:mx-0 h-fit text-zinc-800 hover:text-zinc-100 font-semibold cursor-pointer transition-all">
  </form>
    

  </div>
  <div class=" w-full grid sm:grid-cols-4  gap-2 ">

    <div class="container border sm:w-fit w-full flex flex-col p-2 rounded-sm ">
      <div class="flex justify-between">
        <a href="#"><h1 class="text-xl font-medium px-3 py-1 hover:text-white transition-colors">nome user</h1></a>
        <a class="text-sm text-red-800 hover:text-red-600 transition-colors" href="">report</a>
      </div>
      <img src="https://exploringbits.com/wp-content/uploads/2022/01/Manga-PFP-6.jpg?ezimgfmt=rs:300x300/rscb3/ng:webp/ngcb3" alt="" height="50" width="50" class="mx-3 my-1 "/>
      <p class="text-sm text-zinc-500 px-3 ">tags:</p>
      <div class="px-6 pt-4 pb-2 flex flex-row flex-wrap">
            <span class=" bg-zinc-200 rounded-full px-3 py-1 text-sm font-semibold text-zinc-700 mr-2 mb-2 hover:text-zinc-600 hover:bg-zinc-300 transition-colors">#CSGO</span>
            <span class=" bg-zinc-200 rounded-full px-3 py-1 text-sm font-semibold text-zinc-700 mr-2 mb-2  hover:text-zinc-600 hover:bg-zinc-300 transition-colors">#VALORANT</span>

      </div>
    </div>

    


    
    

    

    


    

  </div>
</main>

</body>
</html>