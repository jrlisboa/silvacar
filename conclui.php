<?php

	include 'scripts/conecta.php';

session_start();
	$id = $_GET['id'];
    $alterar = "UPDATE `serv` SET `estado` = '1' WHERE `serv`.`id` = $id";

    mysql_query($alterar);
    header("location:adm.php");
        
?>