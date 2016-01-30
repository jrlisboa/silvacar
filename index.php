<!DOCTYPE html>
<html>
<head>
	<title>Silvacar | Centro Automotivo</title>
  <meta charset="UTF-8"></meta>
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
  <script src="js/menu.js"></script>
  <script>
  
  	function janela(){
	
		document.getElementById("show").showModal();	
	}

      function janela1(){
  
    document.getElementById("show2").showModal();  
  }
	
	function fechar()
	{
		location.reload();
	}
  </script>

  <script type="text/javascript" src="js/jquery-1.11.3.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
    function filterPath(string) {
    return string
    .replace(/^\//,'')
    .replace(/(index|default).[a-zA-Z]{3,4}$/,'')
    .replace(/\/$/,'');
    }
    $('a[href*=#]').each(function() {
    if ( filterPath(location.pathname) == filterPath(this.pathname)
    && location.hostname == this.hostname
    && this.hash.replace(/#/,'') ) {
    var $targetId = $(this.hash), $targetAnchor = $('[name=' + this.hash.slice(1) +']');
    var $target = $targetId.length ? $targetId : $targetAnchor.length ? $targetAnchor : false;
    if ($target) {
    var targetOffset = $target.offset().top;
    $(this).click(function() {
    $('html, body').animate({scrollTop: targetOffset}, 300);
    return false;
    });
    }
    }
    });
    });
    // ]]>
  </script>

  <?php

    include 'scripts/conecta.php';

    session_start();

    if((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true)){

      unset($_SESSION['login']);
      unset($_SESSION['senha']);
      header("location:index.html");
    }

    $login = $_SESSION['login'];
    $senha= $_SESSION['senha'];
    $executar = mysql_query("SELECT nivel FROM user WHERE login='$login' and senha='$senha'");
    $nivel = mysql_fetch_array($executar) or die(mysql_error());
    $niv = $nivel['nivel'];
    
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

  <center><div class="banner">

    <div class="textos">
      <h1 align="right">Procurando um centro Automotivo?</h1>
      <h2 align="right">O melhor atendimento e custo benefício é aqui,<br> pois você merece o <strong>melhor!</strong></h2>
    </div>

      
        <dialog id="show2" class="caixa">

              <div class="nome-modal">Novo serviço:</div></br><br/>
              <div class="lista-modal" align="left"><br/>
                  <form align="center" action="cadastroserv.php" method="post">
                <span class="l-contato-cadastro">Nome do cliente:</span></br>
                <input type="text" name="nome" class="caixa1"></input></br></br>

                <span class="l-contato-cadastro">Serviço:</span></br>
                <input type="text" name="servico" class="caixa1"></input></br></br>

                <span class="l-contato-cadastro">Modelo de carro:</span></br>
                <input type="text" name="modelo" class="caixa1"></input></br></br>

                <span class="l-contato-cadastro">estimativa de entrega:</span></br>
                <input type="date" name="entrega" class="caixa1"></input></br></br>

                <span class="l-contato-cadastro">preço:</span></br>
                <input type="text" name="preco" class="caixa1"></input></br></br>

                <input type="submit" name="cadastrar-servico" class="btn-cadastrar" value="Cadastrar"></input>
              </form></div>
                  
                  <input class="fechar" name="voltar" type="button" onclick="fechar()" value="Voltar" />
            </dialog>
      <div class="botoes" align="center">

        <?php

            if ($niv == 0) {
               
                echo '<div class="botao botao2">Olá, '.$login.'</div>';
                echo '<a href="sair.php" ><div class="botao botao3">Sair</div></a>';

            }
            else{
                echo '<a href="sair.php" ><div class="botao botao2">Olá '.$login.', Sair</div></a>';
                echo '<a href="cadastro.php" ><div class="botao botao3">Cadastrar Cliente</div></a>';
                echo '<a onclick="janela1()"class="bot4"><div class="botao botao4">Novo serviço</div></a>';
            }
        ?>
          
      </div>
  </div></center>




  <div id="sse3">
    <div id="sses3">
      <ul>
        <li><a href="#home" ></i>Home</a></li>
        <li><a href="#servicos" >Serviços</a></li>
        <li><a href="#sobre" >Sobre</a></li>
        <li><a href="#contato" >Contato</a></li>
        <?php if($niv == 0){ ?>
        <li><a href="perfil.php" >Perfil do Cliente</a></li>
      <?php } ?>
      </ul>
    </div>
  </div>

  <div class="container">
        <a name="servicos"></a>
        <center><a href="#servicos"><div class="seta"></div></a></center>

        <div class="tit-pagina" align="center">
          <span><strong>Conheça os nossos serviços</strong></span>
        </div>

        <div class="servicos">

          <center><div class="servico eletrica">

            <span class="nome-servico">Elétrica</span>
            <span class="desc-servico" align="center">Troca de bateria, injeção<br/>eletrônica entre outros.</span>
          </div></center>

          <center><div class="servico mecanica">
            <span class="nome-servico2">Mecânica</span>
            <span class="desc-servico" align="center">Correias do motor,</br>direção e freios.</span>
          </div></center>

          <center><div class="servico oleo">    
          <span class="nome-servico3">Troca de Óleo</span>
          <span class="desc-servico" align="center">Análise e troca do óleo<br/>do motor e filtros</span>    
          </div></center>

          <center><div class="servico pneus"> 
          <span class="nome-servico4">Pneus</span>
          <span class="desc-servico" align="center">Alinhamento, cambagem</br>e balanceamento.</span>       
          </div></center>



          
          
          
          
          
          

          <center><div class="botaosin">         
          
            <dialog id="show" class="caixa">

              <div class="nome-modal">Todos os Serviços:</div></br><br/>
              <div class="lista-modal" align="left">Alinhamento de direção<br/>
                  Amortecedor e mola<br/>
                  Ar-condicionado (limpeza e assepsia)<br/>
                  Arrefecimento<br/>
                  Baterias<br/>
                  Balanceamento de rodas<br/>
                  Cabos<br/>
                  Cambagem / Cáster<br/>
                  Correias do motor<br/>
                  Direção Extintor de incêndio<br/>
                  Filtros<br/>
                  Freios<br/>
                  Ignição<br/>
                  Injeção eletrônica<br/>
                  Óleo do motor<br/>
                  Palhetas do limpador<br/>
                  Pneus<br/>
                  Suspensão<br/><br/></div>
                  
                  <input class="fechar" name="voltar" type="button" onclick="fechar()" value="Voltar" />
            </dialog>
            <button onclick="janela()" class="ver">Ver todos</button>
          </div></center>
    </div>
  </div>

  <center><div class="secundario">

    <div class="textos textos2">
      <h1 align="right">Efetue sempre uma revisão!</h1>
      <h2 align="center">É importante cuidar do seu carro para melhor desempenho e <strong>segurança!</strong></h2>
    </div>

  </div></center>


  <div class=" container terceiro">

    <a name="sobre"></a>
    <div class="tit-pagina" align="center">
          <span><strong>Sobre o estabelecimento</strong></span>
        </div>

        <div class="foto-sobre">

        </div>

        <div class="tit-sobre">
            <span>O centro automotivo Silva Car tem uma bela História!</span>
        </div>

        <div class="texto-sobre">
            <span>A serviço da popuação de Campo Limpo Paulista e Região a mais de 6 anos, o Centro Automotivo Silva Car está localizado na Rua Marcelo Bizzetto  número 219. Aqui você encontra os melhores preços, e a melhor prestação de serviço da região, não é pra menos que nossa empresa também possui o melhor site :)! Venha você também, e faça um orçamento sem compromisso, aui nós temos o melhor pra você!</span>
        </div>

        <div class="foto-sobre2">

        </div>

        <div class="tit-sobre2">
            <span>Muitos clientes satisfeitos!</span>
        </div>

        <div class="texto-sobre2" align="right">
            <span>A serviço da popuação de Campo Limpo Paulista e Região a mais de 6 anos, o Centro Automotivo Silva Car está localizado na Rua Marcelo Bizzetto  número 219. Aqui você encontra os melhores preços, e a melhor prestação de serviço da região, não é pra menos que nossa empresa também possui o melhor site :)! Venha você também, e faça um orçamento sem compromisso, aui nós temos o melhor pra você!</span>
        </div>
  </div>

  <center><div class="quarto">

        <a name="contato"></a>
        <div class="tit-sobre3">
            <span>Entre em contato para tirar dúvudas!</span>
        </div>

        <div class="conteudo-contato">
          <div class="form-contato">


              <form align="right">
                <span class="l-contato">Nome:</span>
                <input type="text" name="nome" class="caixa1"></input></br></br>

                <span class="l-contato">Email:</span>
                <input type="text" name="email" class="caixa1"></input></br></br>

                <span class="l-contato">Mensagem:</span>
                <textarea class="caixa"></textarea></br></br>

                <input type="submit" name="enviar-contato" class="btn-enviar"></input>
              </form>

          </div> 

          <div class="mapa">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d916.5364104366656!2d-46.766585770836635!3d-23.237786666744476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cede1635e124df%3A0x287a10a225e60569!2sR.+Faustino+Bizeto%2C+17+-+Botujuru%2C+Campo+Limpo+Paulista+-+SP!5e0!3m2!1spt-BR!2sbr!4v1449087849711" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div> 

          <div class="textinho-top textinho2">
            <span><strong>Contato: </strong>(11) 93241-0887 | (11) 99811-2234</span>
          </div>


        </div>

  </div></center>

  <center><div class="copyright">
            <span>Copyright | Silvacar 2015 - Todos os direitos reservados</span>
        </div></center>
</body>
</html>