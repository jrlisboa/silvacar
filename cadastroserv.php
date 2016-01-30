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
    
      $nome = $_POST["nome"];
      $servico = $_POST["servico"];
      $modelo = $_POST["modelo"];
      $entrega = $_POST["entrega"];
      $preco = $_POST["preco"];

      $insere = "INSERT INTO servicofaz (nome,servico,modelo,entrega,preco) VALUES ('$nome', '$servico', '$modelo', '$entrega', '$preco')";

      if (empty($_POST["nome"] && $_POST["servico"] && $_POST["modelo"] && $_POST["entrega"] && $_POST["preco"])) {
        echo "

              <script>
              alert('Preencha Todos os Campos!');
              </script>

        ";

      }else{

        $inseriu = mysql_query($insere);

        if($inseriu){
        echo "

        <script>
              alert('Cadastrado com sucesso!');
              </script>

        ";
        } else{
        echo "

        <<script>
              alert('Erro ao enviar!');
              </script>

        ";
    }
  }
      }
?>