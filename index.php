<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css" media="screen">
    <title>Denucias de Usuarios</title>
</head>
<body>
    
<div>
    <h1 id="titulo">Denuncias</h1>
    <p id="subtitulo" >Faça sua denuncia aqui.</p>
    <br>
</div>


<form method="POST" action="processa.php">
    <fieldset class="grupo">
        <div class="campo">
            <label for="meuusu"><strong>Meu Usuário</strong></label>
            <input type="text" name="nomeusu" placeholder="Digite o seu usuário" id="nome" required>
        </div>

        <div class="campo">
            <label for="usudenunciado"><strong>Usuário Denunciado</strong></label>
            <input type="text" name="nomedenu" placeholder="Digite o usuário denunciado"  id="nome" required>
        </div>

        <div class="campo">
             <label for="jogo"><strong>Jogo</strong></label>
             <input type="text" name="jogo" placeholder="Digite o nome do jogo" id="jogo" required>
        </div>
    </fieldset>

    <div class="campo">
        <label for="tipo"><strong>Tipo de denuncia</strong></label>
        <textarea type="text" name="tipo"  placeholder="Digite o tipo de denuncia: recismo..., assédio verbal...."  style="width: 26em" ></textarea>
    </div>

    <div class="campo">
        <br>
        <label for=""><strong>Motivo da denuncia:</strong></label>
        <textarea name="motivo" placeholder="Fale um pouco mais...." id="motivo" cols="30" rows="6" style="width: 26em"></textarea>
    </div>

    <button class="botao" type="submit">Denunciar</button>

</form>

<?php
if(isset($_SESSION['msg'])){
    echo  $_SESSION['msg'];
    unset ($_SESSION['msg']);
}
?>


</body>
</html>

