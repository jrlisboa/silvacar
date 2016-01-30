<!DOCTYPE html>
<html>
<head>
	<title>Silvacar | Centro Automotivo</title>
 	<meta charset="UTF-8"></meta>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/cadastro.css">

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
  
  if(isset($_POST['cadastrar-cliente'])){
    
      $nome = $_POST["nome"];
      $email = $_POST["email"];
      $telefone = $_POST["telefone"];
      $endereco = $_POST["endereco"];
      $cpf = $_POST["cpf"];
      $login = $_POST["login"];
      $senha = $_POST["senha"];

      $insere = "INSERT INTO user (nome,email,telefone,endereco,cpf,login,senha) VALUES ('$nome', '$email', '$telefone', '$endereco', '$cpf','$login','$senha')";

      if (empty($_POST["nome"] && $_POST["email"] && $_POST["telefone"] && $_POST["endereco"] && $_POST["cpf"] && $_POST["login"] && $_POST["senha"])) {
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
</head>
<body>
  <center><div class="topo">

    <div class="imagem-topo">

      <img src="img/logo.jpg">
    </div>

    <div class="textinho-top">
      <span><strong>Contato: </strong>(11) 93241-0887 | (11) 99811-2234</span>
    </div>
  </div></center>

  <center><div class="conteudo-form">
  	<div class="tit-form-cadastro">Cadastrando um novo cliente! <a href="index.php" class="voltar">Voltar ao Site</a></div>

  	<div class="form-cadastro">

              <form align="center" action="cadastro.php" method="post">
                <span class="l-contato-cadastro">Nome:</span></br>
                <input type="text" name="nome" class="caixa1"></input></br></br>

                <span class="l-contato-cadastro">Email:</span></br>
                <input type="text" name="email" class="caixa1"></input></br></br>

                <span class="l-contato-cadastro">Telefone:</span></br>
                <input type="text" name="telefone" class="caixa1"></input></br></br>

                <span class="l-contato-cadastro">Endereço:</span></br>
                <input type="text" name="endereco" class="caixa1"></input></br></br>

                <span class="l-contato-cadastro">CPF:</span></br>
                <input type="text" name="cpf" class="caixa1"></input></br></br>

                <span class="l-contato-cadastro">Login:</span></br>
                <input type="text" name="login" class="caixa1"></input></br></br>

                <span class="l-contato-cadastro">Senha:</span></br>
                <input type="password" name="senha" class="caixa1"></input></br></br>

                <input type="submit" name="cadastrar-cliente" class="btn-cadastrar" value="Cadastrar"></input>
              </form>
  	</div>
  </div></center>
</body>
</html>