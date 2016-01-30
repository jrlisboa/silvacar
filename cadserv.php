<?php

  include "scripts/conecta.php";
  error_reporting(0);

  session_start();

    if((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)){

      unset($_SESSION['login']);
      unset($_SESSION['senha']);
      header("location:index.php");
    }

    $login = $_SESSION['login'];
    $senha = $_SESSION['senha'];
  
  if(isset($_POST['cadastrar-servico'])){
    
      $cliente = $_POST["nome"];
      $servico = $_POST["servico"];
      $inicio = $_POST["inicio"];
      $entrega = $_POST["entrega"];
      $preco = $_POST["preco"];

      $insere = "INSERT INTO serv (cliente,serv,dat_ini,dat_ent,valor) VALUES ('$cliente', '$servico', '$inicio', '$entrega', '$preco')";

        $inseriu = mysql_query($insere);

        if($inseriu){
        echo "

        <script>
              alert('Cadastrado com sucesso!');
        </script>


        "; header("location: index.php");
        } else{
        echo "

        <script>
              alert('Erro ao enviar!');
          </script>

        ";header("location: index.php");
    }
      }
?>