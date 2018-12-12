<?php
/*Conexão*/
require_once('_php/conect.php');
//Sessão
session_start();

	if (isset($_POST['entrar'])): /*Verificando se existe ação no botão*/
	{
		$erros = array();
		$matricula = mysqli_escape_string($conectando,$_POST['matricula']);
		$senha = mysqli_escape_string($conectando,$_POST['senha']);

//		$siape = mysqli_escape_string($conectando,$_POST['matricula']);
//		$senha1 = mysqli_escape_string($conectando,$_POST['senha']);
		if(empty($matricula) or empty($senha)):
			$erros[] = "<h4 class='text-center text-danger'> Os campos login e senha precisam ser preenchidos</h4>";
		else:
			//pegar os valores de aluno
			$sql = " SELECT * FROM aluno WHERE matricula = '$matricula'";
			$resultado = mysqli_query($conectando,$sql);
			$dados = mysqli_fetch_array($resultado);
	
			if ($dados['nivel'] == 1): //nivel aluno
					echo "O nivel é ".$dados['nivel'];
				if(mysqli_num_rows($resultado) > 0):
					/*Verificando se a senha existe*/
					//$senha = md5($senha);
					$sql = "SELECT * FROM aluno WHERE matricula = '$matricula' AND senha = '$senha'";
					$resultado = mysqli_query($conectando,$sql);
					
						if(mysqli_num_rows($resultado) == 1):
						/*AQUI ACONTECE A MÁGICA*/
							$dados = mysqli_fetch_array($resultado);
							mysqli_close($conectando);
							$_SESSION['logado'] = true;
							$_SESSION['id_usuario'] = $dados['matricula'];
							if($dados['registroAceito'] == 1):		header('Location: 						_php/usuario.php');
							else:
								echo "<script>
									alert('Usuario ainda não foi aceito pelo administrador');
									window.location.href ='index.php';
									</script>";
							endif;
							
						else:
							$erros[] = "<h4 class='text-center text-danger'>Usuário e Senha não conferem</h4>";
						endif;
					

				else:
					$erros[] = "<h4 class='text-center text-danger'>Usuário inexistente</h4>";
				endif;

			else:
				//Faz a leitura da tabela Administrador
				$sql = " SELECT * FROM administrador WHERE siape = '$matricula'";
				$resultado = mysqli_query($conectando,$sql);
				$dados = mysqli_fetch_array($resultado);
				if ($dados['nivel'] == 2):
					echo "O nivel é ".$dados['nivel'];
					if(mysqli_num_rows($resultado) > 0):
					/*Verificando se a senha existe*/
					//$senha = md5($senha);
					$sql = "SELECT * FROM administrador WHERE siape = '$matricula' AND senha = '$senha'";
					$resultado = mysqli_query($conectando,$sql);
		
					if(mysqli_num_rows($resultado) == 1):
						/*AQUI ACONTECE A MÁGICA*/
						$dados = mysqli_fetch_array($resultado);
						mysqli_close($conectando);
						$_SESSION['logado'] = true;
						$_SESSION['id_usuario'] = $dados['siape'];
						header('Location: _php/admin.php');
					else:
						$erros[] = "<h4 class='text-center text-danger'>Usuário e Senha não conferem</h4>";
					endif;
				else:
					$erros[] = "<h4 class='text-center text-danger'>Usuário inexistente</h4>";
				endif;	
				else:
					if ($dados['nivel'] == 3):
						echo "O nivel é ".$dados['nivel'];
					else:
						$erros[] = "<h4 class='text-center text-danger'>Usuário inexistente</h4>";
					endif;
				endif;
			endif;
		endif;
	}
	endif;

?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	
	<link href="_css/styleIndex.css" rel="stylesheet">
	<link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
	
	
	<!-- COLOCAR DEPOIS O MEU CSS -->
	<title>Banco de Horas</title>
</head>

<body>
	
	<div class="container">
		
		<img id="topo" src="_images/topo.jpg"
			 title="Ciência da Computação e Engenharia da Computação"
			 alt="Ciência da Computação e Engenharia da Computação"
			 class="img-responsive">

		<div class="row">
			<div class="col-sm-12"><h1></h1></div>
			<div class="col-sm-12"><h1></h1></div>
			<div class="col-sm-12"><h1></h1></div>
			<div class="col-sm-12"><h1></h1></div>
		</div>

		<?php //Verificando se existe erro no login
			if(!empty($erros)):
				foreach($erros as $erro):
					echo $erro;
				endforeach;
			endif;
		?>
		
		<form method="POST" action="" class="form-horizontal" name="form">	

			<div class="form-group">
				<label class="col-sm-4 control-label" for="matricula">Matricula / Siape</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="matricula" placeholder="Matricula / Siape">
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-4 control-label" for="inputPassword">Senha</label>
				<div class="col-sm-4">
					<input type="password" class="form-control" name="senha" placeholder="Senha">
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<button  type="submit" class="btn btn-primary btn-block" name="entrar">ENTRAR</button>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-5">
					<a id="esqueci" href="_links/recovery.php">Esqueci minha Senha?</a>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-4 col-sm-offset-4">
					<a id="cadastro" href="_links/register.php" >Cadastre-se
						<button type="button" class="btn btn-danger btn-block">Cadastre-se</button>
					</a>	
				</div>
			</div>

		</form>	

		<p class="text-center text-danger">
			<?php if(isset($_SESSION['loginERROR'])) {
				echo $_SESSION['loginERROR'];
				unset ($_SESSION['loginERROR']);
			}?>
		</p>
		
	</div>	
	
</body>
</html>
