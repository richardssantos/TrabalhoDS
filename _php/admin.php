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
					




<html>

	<head>

	
	
	
	
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE-edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	

		<link href="../_css/styleUsuario.css" rel="stylesheet">
		<link href="../_css/styleAdmin.css" rel="stylesheet">
		<link href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<title>Página Administrador</title>
	</head>

<body>
	<div class="container-fluid">
		
		
		<div class="row">
			<div class="cabecalho topo col-sm-4 col-md-4 col-lg-4"> 
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
		<!-- MENU FUNCIONANDO TEM QUE AJUSTAR OS LINKS-->
		
		<div id="menu" class="navbar" >
			<ul class="nav nav-pills nav-justified negrito">
				<li class="nav-item ">
					<a id="novos" class="nav-link active negrito" href="_linksAdmin/novos.php">Novos Cadastros</a>
				</li>
				<li class="nav-item">
					<a class="nav-link negrito" href="_linksAdmin/todosAlunos.php">Alunos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link negrito" href="_linksAdmin/novasAtividades.php">Novas Atividades</a>
				</li>
				<li class="nav-item">
					<a class="nav-link negrito" href="_linksAdmin/buscas.php">Buscar</a>
				</li>
			</ul>
		</div>	
		<!-- FIM MENU -->
		
	</div> <!-- FIM CONTAINER -->
	
</body>
</html>