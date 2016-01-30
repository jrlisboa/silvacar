<?php

include 'scripts/conecta.php';

session_start();

$login = $_POST["login"];
$senha = $_POST["senha"];

$result = mysql_query("SELECT * FROM user WHERE login='$login' and senha='$senha'");

if(mysql_num_rows($result) > 0){

	$_SESSION['login'] = $login;
	$_SESSION['senha'] = $senha;
	

	header('location:perfil.php');
}
else{

	unset($_SESSION['login']);
	unset($_SESSION['senha']);
	header('location:login.php');
}


?>