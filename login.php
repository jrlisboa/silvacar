<!DOCTYPE html>
<html>
<head>
	<title>Silvacar | Centro Automotivo</title>
 	<meta charset="UTF-8"></meta>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" type="text/css" href="css/cadastro.css">
  

  <?php

    include 'scripts/conecta.php';
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
  	<div class="tit-form-cadastro">Faça o Login para ver serviços em andamento! <a href="index.php" class="voltar">Voltar ao Site</a></div>

  	<div class="form-cadastro">

              <form align="center" method="post" action="open.php" id="formlogin" name="formlogin">

                <span class="l-contato-cadastro">Login:</span></br>
                <input type="text" name="login" id="login" class="caixa1"></input></br></br>

                <span class="l-contato-cadastro">Senha:</span></br>
                <input type="password" name="senha" id="senha" class="caixa1"></input></br></br>

                <input type="submit" name="logar-cliente" class="btn-cadastrar" value="Logar"></input>
              </form>
  	</div>
  </div></center>
</body>
</html>