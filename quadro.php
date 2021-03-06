<?php 
  if ( isset($_GET['qdr']) && $_GET['qdr'] != "") {

    include "includes/conexao.php"; 

    $qdr = $_GET['qdr'];  
    $sql = "SELECT * FROM produto WHERE id = $qdr";
    $resultado = mysqli_query($conexao, $sql);    
    $produto = mysqli_fetch_array($resultado);
    
    mysqli_close($conexao);
  } else {
    die('ERRO ID NÃO ENCONTRADO');
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Quadro </title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link rel="shortcut icon" type="image/x-icon" href="design/logo.png">
	<!-- Precisa fazer escala correta no mobile -->
	<meta name="viewport" content="widht=device-widht, initial-scale=1.0">
</head>

<body>
	<div class="container">
		<div class="cabecalho">
				<div class="cabecalhoL1">

					<div class="menu">
						<input type="checkbox" id="chkMenu">
						<label class="iconeMenu"for="chkMenu"><img src="design/menu.png"></label>
					
						<div class="barraMenu">
						<nav>
							<div class="menuCategorias">
							<input type="checkbox" id="chkMenuCategorias">
							<label class="iconeMenuCategorias"for="chkMenuCategorias"><p style="color: #eb008b">NOSSAS CATEGORIAS</p></label>
								<div class="barraMenuCategorias">
									<nav>
										<p><a href="produtos.php?cat=Abstrato">ABSTRATO</a></p>
										<p><a href="produtos.php?cat=Natureza">NATUREZA</a></p>
										<p><a href="produtos.php?cat=Urban"> URBAN</a></p>
										<p><a href="produtos.php?cat=Mundo"> MUNDO</a></p>
									</nav>
								</div>
							</div>
							<div class="menuColecoes">
							<input type="checkbox" id="chkMenuColecoes">
							<label class="iconeMenuColecoes"for="chkMenuColecoes"><p>COLEÇÕES</p></label>
								<div class="barraMenuColecoes">
									<nav>
										<p><a href="login.php">CIDADES</a></p>
										<p><a href="carrinho.php">DAY AND NIGHT</a></p>
										<p><a href="produtos.php">#GIRLPOWER</a></p>
										<p><a href="produtos.php"> LIFE A HOLIC</a></p>
										<p><a href="produtos.php"> URBANO</a></p>
									</nav>
								</div>
							</div>
							<div class="menuAcessorios">
							<input type="checkbox" id="chkMenuAcessorios">
							<label class="iconeMenuAcessorios"for="chkMenuAcessorios"><p>ACESSÓRIOS</p></label>
								<div class="barraMenuAcessorios">
									<nav>
										<p><a href="login.php">PULSEIRAS & COLARES</a></p>
										<p><a href="carrinho.php">ALMOFADAS</a></p>
										<p><a href="produtos.php">CAMISETAS</a></p>
									</nav>
								</div>
							</div>
							<p><a href="centraldeAtendimento.php">CONTATE-NOS</a></p>
							<p><a href="index.php"> PÁGINA INICIAL</a></p>
						</nav>
						</div>

					</div>
					<div class="logo"><a href="index.php"><img alt="logo escrito PICTURAE" src="design/logotipo.png"></a></div>
					<div class="favoritos">
					<a href="cadastro.php"><img alt="icone de um usuario" src="design/favoritos.png"></a></div>
					<div class="carrinho">
					<a href="carrinho.php"><img alt="icone de um carrinho"src="design/carrinho.png"></a></div>
				</div>

				<form action="produtos.php" method="GET">
				<div class="cabecalhoL2">
					<input type="text" name="busca" style="font-size: 96%; font-family: Roboto Light; color: black; margin-left: 12px;" placeholder="O que você procura?...">
					<input type="submit" id="btnBuscar">
					<label for="btnBuscar" class="lblBuscar"><img src="design/lupa.png"></label>
				</div>
				</form>
		</div>

		<div class="quadro">

			<div class="quadro-imagem">
				<img src='produtos/<?php echo $produto['id']; ?>.png'>
			</div>
			<div class="quadro-especificacoes">
			<div class="nome-quadro">
			<?php echo strtoupper($produto['descricao']); ?>
			</div>
			<div class="categoria-quadro">
			CATEGORIA: <?php echo strtoupper($produto['categoria']); ?>
			</div>
			<div class="artista-quadro">
			DE <?php echo strtoupper($produto['artista']); ?>
			</div>
			<div class="preço-quadro">
			R$ <?php echo number_format($produto['preco'], 2, ',','.'); ?>
			</div>
			<button type="submit" name="comprar"><a href="carrinho.php?idProduto=<?php echo $produto['id']; ?>">  COMPRAR </a></button>
			</div>

		</div>

		<div class="rodape">
			<div class="rodape-redes-sociais-titulo">
				Nos acompanhe nas Redes Sociais
			</div>
			<div class="rodape-redes-sociais-icones">
				<div class="redes-sociais-icone">
				<div>
					<img src="design/tt.png">
				</div>
				<div>
					<p> urban_arts </p>
				</div>
			</div>
			<div class="redes-sociais-icone">
				<div>
					<img src="design/face.png">
				</div>
				<div>
					<p> Urban Art's </p>
				</div>
			</div>
			<div class="redes-sociais-icone">
				<div>
					<img src="design/insta.png">
				</div>
				<div>
					<p> @urbanarts </p>
				</div>
			</div>
			</div>

			<div class="rodape-info-titulo">
			Minha Conta I Central de Atendimento I Home
			</div>

			<div class="rodape-atendimento">
				<div class="rodape-atendimento-esquerda">
					<p>Atendimento: <br>
					(51) 99999-9999</p>
				</div>
				<div class="rodape-atendimento-direita">
					<p>Horário de Atendimento: <br>
					Seg. a Sex. - 8:00hrs a 18:00hrs</p>
				</div>
			</div>

			<div class="rodape-mapa">
			<a href="index.php"><img alt="endereço loja" src="design/mapa.png"></a>
			</div>

			<div class="rodape-copyright">
				Copyright by Christopher
			</div>
			
		</div>
</div>
</body>
</html>