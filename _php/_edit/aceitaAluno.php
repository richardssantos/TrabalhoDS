<?php
//session_start();
include_once("../conect.php");
include_once("../_linksAdmin/novos.php");

$result_usuario = "UPDATE aluno SET registroAceito=1 where matricula = $matricula";
$resultado_usuario = mysqli_query($conectando, $result_usuario);
echo "<script>
			alert('$matricula');
			 
			</script>
			";
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
