<?php
session_start();
include("conexao.php");

$meuUsu = filter_input(INPUT_POST, 'nomeusu', FILTER_SANITIZE_STRING);
$Usudenu = filter_input(INPUT_POST, 'nomedenu', FILTER_SANITIZE_STRING);
$jogo = filter_input(INPUT_POST, 'jogo', FILTER_SANITIZE_STRING);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
$motivo = filter_input(INPUT_POST, 'motivo', FILTER_SANITIZE_STRING);

//echo "Usuario: $meuUsu <br>";
//echo "Usuario Denunciado: $Usudenu <br>";
//echo "Jogo: $jogo <br>";
//echo "Tipo: $denuncia <br>";
//echo "Motivo: $motivo <br>";

$result_denuncia = "INSERT INTO Report (meu_usuario, denunciado_usuario, jogo, tipo, explicacao) VALUES ('$meuUsu', '$Usudenu', '$jogo', '$tipo', '$motivo' )";
$resultado_denuncia = mysqli_query($conn, $result_denuncia);

if (mysqli_insert_id($conn)) {

    $_SESSION['msg'] = "<p style='color:green;'> Denuncia realizada com sucesso";
Header("Location: index.php");
} 
else{
    $_SESSION['msg'] = "<p style='color:red;'> Denuncia não foi realizada com sucesso";
    Header("Location: index.php");
}
?>