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

?>


<!doctype html>
<html>
<head>
	<meta charset="utf8">
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
		
	<form method="post" action="processaUpload.php" class="form-horizontal" enctype="multipart/form-data">

		<div class="form-group">
			<label class="col-sm-3 control-label" for="curso">Tipo de Atividade</label>
				<div class="col-sm-7">	
				<select name="classeDefault" id="classeDefault" class="form-control" required/>
					<option value="">Escolha uma opção</option>
					<?php 
						$categoria_post = "SELECT * FROM categoriaatividade ORDER BY classe";
						$categoria_post = mysqli_query($conectando,$categoria_post);
						while($row_cat_post = mysqli_fetch_assoc($categoria_post) ) 
						{
							echo utf8_encode('<option value="'.$row_cat_post['idCategoria'].'">'.$row_cat_post['classe'].'</option>');
							//$idAtividade = 
						}
					?>
				</select>
				</div>
		</div>


		<div class="form-group">
			<label class="col-sm-3 control-label" for="curso">Atividade</label>
			<div class="col-sm-3">
				<span class="carregando">Aguarde, carregando...</span>
				<select name="atividad" id="atividad" class="form-control" required/>
					<option value="">Escolha o tipo de atividade</option>
				</select>
			</div>

			<label class="col-sm-1 control-label" for="curso">Unidade</label>
				<div class="col-sm-3">
					<span class="carregando">Aguarde, carregando...</span>
					<input class="form-control " type="text" name="unidade" placeholder="Unidade" required/>
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
					<input class="form-control " type="text" name="horasAtividade" placeholder="Quantidade de horas" required/>
				</div>
		</div>

			<p> </p>

		<div class="form-group">
			<label class="col-sm-3 control-label" for="curso">Selecione seu arquivo</label>
			<div class="col-sm-2 col-sm-offset-0">
				<input name="arquivo" type="file">
			</div>	
		</div>
		<div class="form-group">
			<div class="col-sm-7 col-sm-offset-3">
				<button type="submit" value="enviar" class="btn btn-primary btn-block">SUBMETER ATIVIDADE</button>
			</div>	
		</div>

		</div> <!-- FIM FORM GROUP SELECT 2 -->



	</form> <!-- FIM DO FORM-->
		
	<script type="text/javascript" src="http://www.google.com/jsapi"></script>	
	<script type="text/javascript">
		google.load("jquery","1.4.2");
	</script>
		
	<script type="text/javascript">
		$(function(){
			$('#classeDefault').change(function(){
				if( $(this).val() ) {
					$('#atividad').hide();
					$('.carregando').show();
					$.getJSON('sub_atividade.php?search=',{classeDefault: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="">Escolha o tipo de atividade</option>';
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].id + '">' + j[i].atividade + '</option>';
						}
						
						$('#atividad').html(options).show();
						$('.carregando').hide();
					});
				} else {
					$('#atividad').html('<option value="">Escolha o tipo de atividade</option>');
				}
			});
		});

	</script>	
		
	</div> <!-- DIV DO CONTAINER-->
			
		
</html>

