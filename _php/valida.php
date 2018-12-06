<?php

	session_start();
	include_once("conect.php");

	if ((isset($_POST['matricula'])) && (isset($_POST['senha'])))
	{
		$usuario = mysqli_real_escape_string($conecta, $_POST['matricula']);
		
		$senha = mysqli_real_escape_string($conecta, $_POST['senha']);
		//$senha = md5($senha);
		
		if( ($senha == "1234") && ($usuario == "154")){
			header ("Location: usuario.php");
		}
		else {
			header ("Location: ../index.php");
		}
	}
	else
	{
		$_SESSION['loginERROR'] = "Usuário ou senha inválido";
		header("Location index.php");
	}

?>