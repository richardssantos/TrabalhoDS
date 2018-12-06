<?php
/*Conexão*/
session_start();
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE-edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">

		<link href="../_css/styleRegister.css" rel="stylesheet">
		
		<title>Cadastro</title>
	</head>

<body>
	
	<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
	?>
	
	<div class="container">
		
		<img id="topo" src="../_images/topo.jpg" title="Ciência da Computação e Engenharia da Computação"
			 alt="Ciência da Computação e Engenharia da Computação" class="img-responsive">
		
		<div id="cadastro">
			<form method="post" action="../_php/processa.php" class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-3 control-label" for="matricula">Matricula</label>
					<div class="col-sm-7">
						<input class="form-control " type="text" name="matricula" placeholder="Matricula">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label text-left" for="nome">Nome</label>
					<div class="col-sm-7">
						<input class="form-control" type="text" name="nome" placeholder="Nome Completo"/>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label" for="email">E-mail</label>
					<div class="col-sm-7">
						<input class="form-control" type="email" name="email" placeholder="e-mail@inf.ufpel.edu.br"/>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label" for="telefone">Telefone</label>
					<div class="col-sm-7">
						<input class="form-control" type="tel" name="telefone" placeholder="Telefone"/>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label" for="curso">Curso</label>
					<div class="col-sm-3">	
						<select class="form-control" name="curso">
							<option>Escolha uma opção</option>
							<option value="C">Ciência da Computação</option>
							<option value="E">Engenharia da Computação</option>
						</select>
					</div>
					
					<label class="col-sm-1 control-label" for="curriculo">Currículo</label>
					<div class="col-sm-3">
						<select class="form-control" name="curriculo">
							<option>Escolha uma opção</option>
							<option value="2013">2013</option>
							<option value="2015">2015</option>
						</select>
					</div>
				</div>


				<div class="form-group ">
					<label class="col-sm-3 control-label " for="ano">Ano de Formatura</label>
					<div class="col-sm-3">
						<input class="form-control" type="text" name="ano" placeholder="Ano/Semestre"/>
					</div>
					
					<label class="col-sm-1 control-label" for="semestre">Semestre</label>
					<div class="col-sm-3">
						<select class="form-control" name="semestre">
							<option>Escolha uma opção</option>
							<option value="1">1</option>
							<option value="2">2</option>
						</select>
					</div>
				</div>


				
				<div class="form-group">
					<label class="col-sm-3 control-label" for="senha">Senha</label>
					<div class="col-sm-7">
						<input class="form-control" type="password" name="senha" placeholder="Senha"/>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label" for="senharepete">Repetir Senha</label>
					<div class="col-sm-7">
						<input class="form-control" type="password" name="senharepete" placeholder="Repita sua Senha"/>
					</div>
				</div>

				<p> </p>
				<div class="form-group">
					<div class="col-sm-7 col-sm-offset-3">
						<button type="submit" value="enviar" class="btn btn-primary btn-block">ENVIAR</button>
					</div>	
				</div>
			</form>
		</div>
	</div>
	
</body>
</html>
