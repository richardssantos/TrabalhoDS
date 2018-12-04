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
$sql = "SELECT * FROM aluno WHERE matricula = '$id' ";
$resultado = mysqli_query($conectando,$sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($conectando);

?>


<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<link href="../_css/styleAtividades.css" rel="stylesheet">
	<link href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
	<title>Registro de Atividades</title>
</head>
	
<body>
	<div class="container-fluid">
		<div class="row">
		
			<div class="cabecalho topo col-sm-6 col-md-6 col-lg-6"> 
				<h4 class="nome"> Olá <?php echo $dados['nome']; ?> </h4>
			</div>
			
			<div class="cabecalho topo col-sm-6 col-md-6 col-lg-6"> 
				<img  id="imagem" src="../_images/juntos.png"
			 		title="Ciência da Computação e Engenharia da Computação"
			 		alt="Ciência da Computação e Engenharia da Computação"
					class="img-responsive">
			</div>
		</div><hr class="linha">
			<form method="post" action="../_php/usuario.php" class="form-horizontal">
				
				<div class="form-group">
					<label class="col-sm-3 control-label" for="curso">Escolha uma atividade</label>
					<div class="col-sm-7">	
						<select class="form-control" name="curso">
							<option>Escolha uma opção</option>
							<option value="C">1</option>
							<option value="E">2</option>
							<option value="E">2</option>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label" for="curso"></label>
						<div class="col-sm-3">
							<input class="form-control " type="text" name="default" placeholder="Default">
						</div>
					
					<label class="col-sm-1 control-label" for="curso"></label>
						<div class="col-sm-3">
							<input class="form-control " type="text" name="unidade" placeholder="Unidade">
						</div>
				</div>
				
				
				<div class="form-group">
					<label class="col-sm-3 control-label" for="curso">Data de Inicio</label>
						<div class="col-sm-3">
							<input class="form-control " type="date" name="dataFinal">
						</div>
					
					<label class="col-sm-1 control-label" for="curso">Data de Fim</label>
						<div class="col-sm-3">
							<input class="form-control " type="date" name="dataFinal">
						</div>
				</div>
				
				<div class="form-group">
						<label class="col-sm-3 control-label" for="curso">Quantidade de Horas</label>
						<div class="col-sm-7">
							<input class="form-control " type="text" name="default" placeholder="Quantidade de horas">
						</div>
				</div>
				<p> </p>
				<div class="form-group">
					<div class="col-sm-7 col-sm-offset-3">
						<button type="submit" value="enviar" class="btn btn-primary btn-block">SUBMETER ATIVIDADE</button>
					</div>	
				</div>
			</form>

		</div>
			
				
	</div>
		
			
			
	
		
		
</body>
</html>