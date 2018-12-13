<?php
session_start();
include_once("../conect.php");

$matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_NUMBER_INT);
$registro = filter_input(INPUT_POST, 'registroAceito', FILTER_SANITIZE_STRING);

$result_usuario = "UPDATE aluno SET registroAceito=1";
$resultado_usuario = mysqli_query($conectando, $result_usuario);

if ($resultado_usuario){
	echo "<script> 
	alert('Aluno cadastrado com sucesso!'); 
	window.location.href ='../_linksAdmin/novos.php';
	</script>";
} else {
	echo "<script>
	alert('Não foi possível cadastrar Usuario!');
	window.location.href ='../_linksAdmin/novos.php';
	</script>";
}

