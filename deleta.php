<?php

	include 'scripts/conecta.php';

session_start();
	$id = $_GET['id'];
    $deletar = "DELETE FROM `serv` WHERE `serv`.`id` = $id";

    mysql_query($deletar);
        header("location:adm.php");
        
?>