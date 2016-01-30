<html>
	<head>
	<title>Silvacar | Centro Automotivo</title>
  	<meta charset="UTF-8"></meta>

	<link rel="stylesheet" type="text/css" href="css/estilo.css">
  	<link rel="stylesheet" type="text/css" href="css/cadastro.css">

    <?php

    include 'scripts/conecta.php';

    session_start();

    if((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)){

      unset($_SESSION['login']);
      unset($_SESSION['senha']);
      header("location:index.php");
    }

    $login = $_SESSION['login'];
    $senha = $_SESSION['senha'];

    $executar = mysql_query("SELECT nivel FROM user WHERE login='$login' and senha='$senha'");
    $nivel = mysql_fetch_array($executar) or die(mysql_error());
    $niv = $nivel['nivel'];

    $executar2 = mysql_query("SELECT nome FROM user WHERE login='$login' and senha='$senha'");
    $nomes = mysql_fetch_array($executar2) or die(mysql_error());
    $nome = $nomes['nome'];

    if($niv == 0){
          header("location: index.php");
    }

    //selecionar todos os dados que vão para a tabela serviços

    $executar3 = mysql_query("SELECT * FROM serv");

    //selecionar todos os dados que vão para a tabela clientes

    $executar6 = mysql_query("SELECT * FROM user");

    //selecionar id do cliente

    $query = mysql_query("SELECT id FROM user WHERE login='$login' and senha='$senha'");
    $ids = mysql_fetch_array($query) or die(mysql_error());
    $id = $ids['id'];

    //ver quantos servicos estão em andamento

    $executar4 = mysql_query("SELECT estado FROM serv WHERE estado=0");
    $num_andamento= 0;

    while ($andamento = mysql_fetch_array($executar4)) {
      $num_andamento = $num_andamento + 1;
    }

    //ver quantos servicos estão concluidos

    $executar5 = mysql_query("SELECT estado FROM serv WHERE estado=1");
    $num_concluido= 0;

    while ($concluido = mysql_fetch_array($executar5)) {
      $num_concluido = $num_concluido + 1;
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

  <center><div class="conteudo-perfil">

    <div class="tit-perfil">
    
      <span>Página do Administrador <a href="sair.php" class="sair">Sair</a> <a href="index.php" class="voltar">Voltar ao Site</a></span>
    </div>
    
    <div class="esquerda">

    <div class="nome-perfil">
      <span>

        <?php echo $nome; ?>

    </span>
    </div>

    <div class="imagem-perfil">
    </div>
  </div>

  <div class="direita">
      <div class="concluidos">
        <span class="tit-direita">Número de serviços concluídos:</span>  <span class="numero-direita"><?php 

          if($num_concluido == ""){
              echo "0";
          }elseif ($num_concluido > 0) {
              echo $num_concluido;
          }
         ?></span>
      </div>

      <div class="concluidos">
        <span class="tit-direita">Número de serviços em andamento:</span>  <span class="numero-direita"><?php 

          if($num_andamento == ""){
              echo "0";
          }elseif ($num_andamento > 0) {
              echo $num_andamento;
          }
         ?></span>
      </div>

  </div>
  </div>

  <div class="tudo-tabelinha">
      <div class="tit-tabelinha"><span>Tabela GERAL de serviços:</span></div>

      <div class="tabelinha">
        <table>
          <tr class="topo-tabela">
            <td>Serviço Prestado</td>
            <td>Data de início</td>
            <td>Cliente</td>
            <td>Previsão de entrega</td>
            <td>Valor orçamentado</td>
            <td>Estado</td>
            <td>Ações</td>
          </tr>

          <tr>
             
             <?php 

              while ($servs = mysql_fetch_array($executar3)) {
                ?>
                <tr>
                    <td><?php echo $servs['serv']?></td>
                    <td><?php echo $servs['dat_ini']?></td>
                    <td><?php echo $servs['cliente']?></td>
                    <td><?php echo $servs['dat_ent']?></td>
                    <td><?php echo "R$".$servs['valor']?></td>
                    <td><?php

                     if ($servs['estado'] == 0){
                        echo "Em andamento";
                     }else{

                        echo "Concluído ";
                     }
                     ?></td>
                     <td><?php
                        if ($servs['estado'] == 0){
                        echo "<a  href='conclui.php?id=".$servs['id']."' class='voltar1'>Concluir</a><a  href='deleta.php?id=".$servs['id']."' class='sair1'>Excluir</a>";
                     }else{

                        echo "<a  href='deleta.php?id=".$servs['id']."' class='sair1'>Excluir</a>";
                     }
                     ?></td>  
                </tr>

            <?php
              }
               ?>

          </tr>
        </table>

      </div>

  </div></center>

        <center><div class="tit-tabelinha"><span>Tabela GERAL de clientes:</span></div>

      <div class="tabelinha">
        <table>
          <tr class="topo-tabela">
                    <td>Nome</td>
                    <td>Email</td>
                    <td>CPF</td>
                    <td>Telefone</td>
                    <td>Endereço</td>
                    <td>Login</td>
                    <td>Senha</td>
          </tr>

          <tr>
             
             <?php 

              while ($servs = mysql_fetch_array($executar6)) {
                ?>
                <tr>
                    <td><?php echo $servs['nome']?></td>
                    <td><?php echo $servs['email']?></td>
                    <td><?php echo $servs['cpf']?></td>
                    <td><?php echo $servs['telefone']?></td>
                    <td><?php echo $servs['endereco']?></td>
                    <td><?php echo $servs['login']?></td>
                    <td><?php echo $servs['senha']?></td>
                </tr>

            <?php
              }
               ?>

          </tr>
        </table>

      </div>

  		</div></center>

</body>
</html>