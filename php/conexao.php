<?php

//Informações do baco de dados
$host = "localhost";    //Host do banco dados
$user = "root";         //Usuario
$pass = "";             //Senha
$dbname = "tpj";        //Nome do banco dados
$port = 3306;           //Porta utilizada

//Conexao com a porta
$conn = new PDO("mysql:host=$host;port=$port;dbname=".$dbname, $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Conexao sem a porta
//$conn = new PDO("mysql:host=$host;dbname=".$dbname, $user, $pass);