<?php
	//PASSO 1 - ABRIR CONEXÃO
	//$conecta = mysqli_connect("localhost","root","","nome do banco");
	$servidor		= "localhost";
	$usuario		= "root";
	$senha			= "";
	$NomeDoBanco	= "trabalhods";	
		
	$conectando = mysqli_connect($servidor, $usuario, $senha, $NomeDoBanco);

	if(mysqli_connect_error()):
		echo "Falha na conexão: ".mysqli_connect_error();
	endif;
?>