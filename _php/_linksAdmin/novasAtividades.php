<?php
/*Conexão*/
require_once('../conect.php');
//Sessão
session_start();

//Verificando conexão 
if(!isset($_SESSION['logado'])):
	header('Location: ../../../index.php');
endif;

//Dados
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM administrador WHERE siape = '$id' ";
$resultado = mysqli_query($conectando,$sql);
$dados = mysqli_fetch_array($resultado);

$sqltabela = "SELECT * FROM registro_atividade WHERE estadoAtual = '1' ";
$tabela = mysqli_query($conectando,$sqltabela);
$total = mysqli_num_rows($tabela);


mysqli_close($conectando);

?>


<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE-edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		
		
		
		<link href="../../_css/styleIndex.css" rel="stylesheet">
		<link href="../../_css/styleUsuario.css" rel="stylesheet">
		<link href="../../_css/styleAdmin.css" rel="stylesheet">
		<link href="../../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
		
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<title>Atividades</title>
	</head>

<body>
	<div class="container-fluid">
		
		
		<div class="row">
			<div class="cabecalho topo col-sm-4 col-md-4 col-lg-4"> 
				<h4 class="nome"> Olá <?php echo $dados['nome']; ?> </h4>
			</div>
			
			<div class="cabecalho topo col-sm-4 col-md-4 col-lg-4"> 
					<img  id="imagem" src="../../_images/juntos.png"
						title="Ciência da Computação e Engenharia da Computação"
						alt="Ciência da Computação e Engenharia da Computação"
						class="img-responsive">
			</div>

			<div class="cabecalho topo col-sm-4 col-md-4 col-lg-4"> 
				<h4 class="text-center sair"><a class="sair1" href="../../index.php">Sair</a></h4>
			</div>
		</div>
		<hr>
		
		<!-- MENU -->
		<!-- MENU FUNCIONANDO TEM QUE AJUSTAR OS LINKS-->
		
		<div id="menu" class="navbar negrito" >
			<ul class="nav nav-pills nav-justified negrito">
				<li class="nav-item ">
					<a id="novos" class=" nav-link active negrito" href="novos.php">Novos Cadastros</a>
				</li>
				<li class="nav-item">
					<a class="nav-link negrito" href="todosAlunos.php">Alunos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link negrito" href="novasAtividades.php">Novas Atividades</a>
				</li>
				<li class="nav-item">
					<a class="nav-link negrito" href="buscas.php">Buscar</a>
				</li>

			</ul>		
			<div class="row">
				<div class="col-sm-12"><h1></h1></div>
			</div>
			<h1></h1>
		</div>	 <!-- FIM MENU -->
		<table class="table col-sm-10 col-sm-offset-1 table-hover table-bordered">
			<thead class="thead-light">
				<th>Matricula</th>
				<th>Documento</th>
				<th>Categoria</th>
				<th>Horas</th>
				<th>Aceitar</th>
				<th>Recusar</th>
				<th>Editar</th>
				<th>Download</th>
			</thead>
			<tbody>

			<?php
				while($dadostabela = mysqli_fetch_assoc($tabela)){
					$mat = $dadostabela['matricula'];
					$ndoc = $dadostabela['nome_documento'];
					$caminho = "../../alunos/".$mat."/".$ndoc."";
			?>
				
				<tr>
				<td><?php echo $dadostabela['matricula']?></td>
 				<td><?php echo  $dadostabela['nome_documento'] ?></td>
				<td><?php
					if($dadostabela['idAtividade'] == '1'){
							echo "Ensino";

						}else
						if($dadostabela['idAtividade'] == '2'){
							echo "pesquisa";
						}
						else
						if($dadostabela['idAtividade'] == '3'){
							echo "Extensão";
						}?></td>
				<td><?php echo $dadostabela['valorEmHoras']?></td>	
				<td><input class="btn btn-success" type="submit" value="Aceitar"></td>
				<td><input class="btn btn-danger" type="submit" value="Recusar"></td>
				<td><input class="btn btn-secondary" type="submit" value="Editar"></td>
				<td class = "text-center"><a href= <?php echo $caminho ?>  class = "btn btn-primary" download>Download</a>
					</td>;
		<?php												 
				}
		?>
		</tbody>
		</table>
	</div> <!-- FIM CONTAINER -->
	
</body>
</html>