<?php
session_start();
ob_start();
include_once 'conexao.php';
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

            if (!empty($dados['CadUsuario'])) {
                $empty_input = false;

                $dados = array_map('trim', $dados);

                $ano_td = date("Y");
                $mes_td = date("m");
                $dia_td = date("d");

                $dia_user = substr($dados['dt_nascimento'], 8);
                $mes_user = substr($dados['dt_nascimento'], 5, -3);
                $ano_user = substr($dados['dt_nascimento'], 0, -6);

                if ($mes_td > $mes_user){
                    $idade = ($ano_td - $ano_user);
                }elseif ($mes_td == $mes_user and $dia_td >= $dia_user){
                    $idade = ($ano_td - $ano_user);
                }else{
                    $idade = ($ano_td - $ano_user) - 1;
                }

                if($_POST["captcha"] != $_SESSION["captcha"]){
                    $empty_input = true;
                    echo '<script>alert("Erro: Captcha incorreto")</script>';
                }
                elseif (in_array("", $dados)) {
                    $empty_input = true;
                    echo '<script>alert("Erro: Necessário preencher todos campos")</script>';
                }elseif(strlen($dados['nickName'])<3){
                    $empty_input = true;
                    echo '<script>alert("Erro: Nome de usuario curto")</script>';
                }elseif (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
                    $empty_input = true;
                    echo '<script>alert("Erro: Necessário preencher com e-mail válido")</script>';
                }elseif($idade < 14){
                    $empty_input = true;
                    echo '<script>alert("Erro: Nescessário ter mais de 14 anos")</script>';
                }elseif(!isset($dados['termoServico'])){
                    $empty_input = true;
                    echo '<script>alert("Erro: Necessário concordar com os termos de serviço")</script>';
                }

                if (!$empty_input) {
                    $senhasub = md5($dados['senha']);
                    $query_usuario = "INSERT INTO User (nickName, dt_nascimento, email, senha, termoServico) VALUES (:nickName, :dt_nascimento, :email, :senha, :termoServico)";
                    $cad_usuario = $conn->prepare($query_usuario);
                    $cad_usuario->bindParam(':nickName', $dados['nickName'], PDO::PARAM_STR);
                    $cad_usuario->bindParam(':dt_nascimento', $dados['dt_nascimento'], PDO::PARAM_STR);
                    $cad_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
                    $cad_usuario->bindParam(':senha', $senhasub, PDO::PARAM_STR);
                    $cad_usuario->bindParam(':termoServico', $dados['termoServico'], PDO::PARAM_STR);
                    $cad_usuario->execute();

                    if ($cad_usuario->rowCount()) {
                        $query_usuario = 'SELECT id_user, nickName FROM User 
                        WHERE nickName =:nickName  LIMIT 1';
                        $result_usuario = $conn->prepare($query_usuario);
                        $result_usuario->bindParam(':nickName', $dados['nickName'], PDO::PARAM_STR);
                        $result_usuario->execute();
                        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
                        $_SESSION['id_user'] = $row_usuario['id_user'];

                        $defaultdesc = "Digite sua descrição";
                        if (isset($_SESSION['id_user'])){
                            $query_usuario = "INSERT INTO Perfil (descricao, Id_user_fk) VALUES (:descricao, :Id_user_fk)";
                            $cad_usuario = $conn->prepare($query_usuario);
                            $cad_usuario->bindParam(':descricao', $defaultdesc, PDO::PARAM_STR);
                            $cad_usuario->bindParam(':Id_user_fk', $_SESSION['id_user'], PDO::PARAM_INT);
                            $cad_usuario->execute();
                            if ($cad_usuario->rowCount()) {
                                unset($dados);
                                unset($_SESSION['id_user']);
                                header("Location: login.php");
                            }else {
                                echo '<script>alert("Erro: Usuário não cadastrado")</script>';
                            }
                        }
                    }
                }
                //else {echo "<p style='color: red; font-size: 1.5em;'>Erro: Usuário não cadastrado pinto</p>";}
            }
        ?>

<div class="flex h-screen bg-[url('pics/bg0.png')] m-auto bg-contain bg-repeat">
  <form name="cad-usuario" method="POST" action="" class=" flex flex-col gap-4 bg-zinc-900 h-fit p-4 md:p-14 m-auto rounded-md md:w-1/3">
    <h1 class="text-xl text-zinc-200 text-center">Cadastro</h1>
    <div>
        <label for="" class="text-md text-white font-mono">nome usuario</label>
        <input type="text" name="nickName" placeholder="nickname" class="px-2 rounded-sm p-1 text-lg w-full" id="user" oninput=mascara_user() value="<?php if (isset($dados['nickName'])) {echo $dados['nickName'];}?>" required>
    </div>

    <div>
        <label for="" class="text-md text-white font-mono">email</label><br>
        <input type="text" name="email" placeholder="email" class="px-2 w-full rounded-sm p-1 text-lg" id="email" value="<?php if (isset($dados['email'])) {echo $dados['email'];}?>" required>
    </div>
    <div>
        <label for="" class="text-md text-white font-mono">senha</label><br>
        <input type="password" name="senha" placeholder="senha" class="px-2 w-full rounded-sm p-1 text-lg" value="<?php if (isset($dados['senha'])) {echo $dados['senha'];}?>" required>
    </div>
    <div>
        <label for="" class="text-md text-white font-mono">data de nascimento</label><br>
        <input type="date" name="dt_nascimento" max="9999-12-31" id="" class="px-2 w-full rounded-sm p-1 text-lg" value="<?php if (isset($dados['dt_nascimento'])) {echo $dados['dt_nascimento'];}?>" required>
    </div>
    <div class="flex gap-2 text-zinc-100">
      <input type="checkbox" name="termoServico" value="1" id="" required>
      <p>termos de serviço</p>
    </div>

    <div class="flex flex-col text-zinc-200">
      <img src="captcha.php" alt="captcha" class="h-14">
      <input type="text" name="captcha" placeholder="capcha" class="px-2 rounded-sm text-zinc-900" required>
    </div>
    
    <input type="submit" value="Cadastrar" name="CadUsuario" class="bg-red-700 rounded-sm hover:text-zinc-200 transition-all font-medium p-2 hover:bg-red-600">

    <a class="text-zinc-400 hover:text-zinc-200" href="login.php">já tem uma conta? login</a>
</form>
</div>
<script src="mascara.js"></script>
</body>
</html>