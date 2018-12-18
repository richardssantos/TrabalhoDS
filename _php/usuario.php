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
		
		<div class="row">
			<div class="atividade ">
				<div class="col-sm-4 col-md-4 col-lg-4 col-sm-offset-4">
					<a id="submete" href="atividade.php">
						<button class="botao btn btn-primary btn-block sub ">SUBMETER NOVA ATIVIDADE</button>
					</a>
				</div>
			</div>
		</div>
		
		<div class="row">	
			<div class="meio col-sm-6 col-md-6 col-lg-6"> 
				
				<h2 class="text-center "> Horas Complementares</h2><hr class="linha">
					<h4 class="text-center">Ensino</h4>
					<div class="progress progresso1 col-sm-offset-3 ">
						<div class=" progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">
						100% Completo
						</div>
					</div>	
						
					
					<h4 class="text-center">Extensão</h4>
					<div class="progress progresso1 col-sm-offset-3 ">
						<div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar"
						aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
						60% Completo
						</div>
					</div>	
				
					<h4 class="text-center">Pesquisa</h4>
					<div class="progress progresso1 col-sm-offset-3 ">
						<div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar"
						aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:5%">
						5% Completo
						</div>
					</div>	

					
			</div>
			<div class="meio col-sm-6 col-md-6 col-lg-6"> 
				<h2 class="text-center"> Horas Livres</h2><hr class="linha">
					<h4 class="text-center">Horas Livres Aprovadas</h4>
					<div class="progress progresso1 col-sm-offset-3 ">
						<div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:10%">
						10% Completo
						</div>
					</div>
				
					<h4 class="text-center">Total de Horas Aprovadas</h4>
					<div class="progress progresso1 col-sm-offset-3 ">
						<div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar"
						aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">
						50 horas aprovadas
						</div>
					</div>
				
					<h4 class="text-center">Horas em Analise</h4>
					<div class="progress progresso1 col-sm-offset-3 ">
						<div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar"
						aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:100%">
						36 horas para analisar
						</div>
					</div>	
			</div>
			
		
		
	</div>	
		
	<table class="col-sm-10 col-sm-offset-1 table-responsive" >
		<thead class=" thead-dark ">
			<th>Documento</th>
			<th>Número de Horas</th>
			<th>Estado Atual</th>
		</thead>
		<tbody>

				<?php
				while($dadostabela = mysqli_fetch_assoc($tabela)){
					echo "<tr>";
					echo "<td>".$dadostabela['nome_documento']."</td>";
					echo "<td>".$dadostabela['valorEmHoras']."</td>";
					if($dadostabela['estadoAtual'] == '1'){
					echo "<td>Aprovado</td>";
					
					}else{
						echo "<td>Em análise</td>";
					}
					echo "<tr>";
				}
			?>
		</tbody>
	</table>
			</div> <!-- FIM CONTAINER -->

</body>
</html>