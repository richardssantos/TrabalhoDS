<?php
/*Conexão*/
require_once('conect.php');
//Sessão
session_start();

//Verificando conexão 
if(!isset($_SESSION['logado'])):
	header('Location: ../index.php');
endif;


//Dados
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM administrador WHERE siape = '$id' ";
$resultado = mysqli_query($conectando,$sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($conectando);

?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Administrador</title>
	
	<link href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="../_css/styleUsuario.css" rel="stylesheet">
	<link href="../_css/styleAdmin.css" rel="stylesheet">
</head>

<body>
	 <div class="container-fluid">
		<div class="row">
			<div class="cabecalho topo col-sm-3 col-md-4 col-lg-4"> 
				<h4 class="nome"> Olá <?php echo $dados['nome']; ?> </h4>
			</div>
			
			<div class="cabecalho topo col-sm-4 col-md-4 col-lg-4"> 
					<img  id="imagem" src="../_images/juntos.png"
						title="Ciência da Computação e Engenharia da Computação"
						alt="Ciência da Computação e Engenharia da Computação"
						class="img-responsive">
			</div>

			<div class="cabecalho topo col-sm-4 col-md-4 col-lg-4"> 
				<h4 class="text-center sair"><a class="sair1" href="logout.php">Sair</a></h4>
			</div>
		</div>
		<hr>
		
		<!-- MENU -->
		<nav id="menu" class="navbar">
			<div class="container-fluid col-sm-offset-4">
				<ul class="nav navbar-nav negrito">
					<li>
						<a href="_admin/novos.php">Novos Registros</a>
					</li>
					<li class="active"><a href="#">Alunos</a></li>
					<li class="active"><a href="#">Atividades</a></li>
				</ul>
			</div>
		</nav>
		<!-- FIM MENU -->
</body>
</html>