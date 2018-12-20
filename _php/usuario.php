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



$sqltabela = "SELECT * FROM registro_atividade WHERE matricula = '$id' ";
$tabela = mysqli_query($conectando,$sqltabela);
$total = mysqli_num_rows($tabela);


mysqli_close($conectando);


?>


<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE-edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../_css/styleUsuario.css" rel="stylesheet">
		<link href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		
		<title>Usuário</title>
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
		
		<div class="row ">
			<div class="atividade col-sm-12 col-md-12 col-lg-12">
				<div class="">
					<a id="submete" href="atividade.php">
						<button type="button" class="botao btn btn-primary btn-lg col-sm-4 col-md-4 col-lg-4 col-sm-offset-4 font-weight-bold">SUBMETER NOVA ATIVIDADE</button>
					</a>
				</div>
			</div>
		</div>
		
		<div class="row">	
			<div class="meio col-sm-6 col-md-6 col-lg-6"> 
				
				<h1 id="horas" class="text-center "> Horas Complementares</h1><hr class="linha">
					<h3 class="text-center">Ensino</h3>
					<div class="progress progresso1 col-sm-offset-3" style="height: 20px;">
						<div class=" progress-bar bg-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">
						120 horas
						</div>
					</div>	
						
					
					<h3 class="text-center">Extensão</h3>
					<div class="progress progresso1 col-sm-offset-3" style="height: 20px;">
						<div class="progress-bar bg-success" role="progressbar"
						aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
						60 horas
						</div>
					</div>	
				
					<h3 class="text-center">Pesquisa</h3>
					<div class="progress progresso1 col-sm-offset-3" style="height: 20px;">
						<div class="progress-bar bg-success" role="progressbar"
						aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:5%">
						5 horas
						</div>
					</div>	

					
			</div>
			<div class="meio col-sm-6 col-md-6 col-lg-6"> 
				<h1 class="text-center" id="horas"> Horas Livres</h1><hr class="linha">
					<h3 class="text-center">Horas Livres Aprovadas</h3>
					<div class="progress progresso1 col-sm-offset-3" style="height: 20px;" >
						<div class="progress-bar bg-success"role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:10%">
						5 horas
						</div>
					</div>
				
					<h3 class="text-center">Total de Horas Aprovadas</h3>
					<div class="progress progresso1 col-sm-offset-3" style="height: 20px;">
						<div class="progress-bar bg-success" role="progressbar"
						aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">
						50 horas aprovadas
						</div>
					</div>
				
					<h3 class="text-center">Horas em Analise</h3>
					<div class="progress progresso1 col-sm-offset-3" style="height: 20px;">
						<div class="progress-bar bg-success" role="progressbar"
						aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:100%">
						Horas
						</div>
					</div>	
			</div>
			
		
		
	</div>	
	
	<div class="row">	
		<table class="table col-sm-10 col-sm-offset-1 table-bordered table-hover tabela" >
			<thead class=" thead-light ">
				<th>Documento</th>
				<th>Número de Horas</th>
				<th>Atividade</th>
				<th>Estado Atual</th>
				<th>Download</th>
			</thead>
			<tbody>

					<?php
					while($dadostabela = mysqli_fetch_assoc($tabela)){
						$mat = $dadostabela['matricula'];
						$ndoc = $dadostabela['nome_documento'];
						$caminho = "../alunos/".$mat."/".$ndoc."";
						?>
						<tr>
						<td><?php echo $dadostabela['nome_documento'];?></td>
						<td><?php echo $dadostabela['valorEmHoras'];?></td>
						<td>
						<?php
						if($dadostabela['idAtividade'] == '1'){
							echo "Ensino";

						}else
						if($dadostabela['idAtividade'] == '2'){
							echo "pesquisa";
						}
						else
						if($dadostabela['idAtividade'] == '3'){
							echo "Extensão";
						}
						?>
						</td>
						<td>
						<?php
						if($dadostabela['estadoAtual'] == '2'){
							echo "Aprovado";

						}else
						if($dadostabela['estadoAtual'] == '1'){
							echo "Em análise";
						}else
						if($dadostabela['estadoAtual'] == '0'){
							echo "Reprovado";
						}

						?>
							</td>
						<td class = "text-center"><a href= <?php echo $caminho ?>  class = "btn btn-primary" download>Download</a>
						</td>;
				<?php
					}
				?>

			</tbody>
		</table>
	</div>
			</div> <!-- FIM CONTAINER -->

</body>
</html>