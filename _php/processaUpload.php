<?php

include_once('conect.php');
//Sessão
session_start();


//inserindo pdf
$pasta = "../alunos/";
$pasta ="{$pasta}{$dados['matricula']}";
$allow = array('pdf');
$temp = explode(".",$_FILES['arquivo']['name']);
$extension=end($temp);
$upload_file = $_FILES['arquivo']['name'];
if(move_uploaded_file($_FILES['arquivo']['tmp_name'],"$pasta".$_FILES['arquivo']['name'])){
	$query = mysqli_query($conectando,"insert into arquivo(nome_documento) values('".$upload_file."')");
	echo "<script>
		alert('PDF enviado com sucesso');
		window.location.href ='usuario.php';
		</script>
		";
}else{
	"<script>
		alert('Erro ao enviar');
		window.location.href ='usuario.php';
		</script>";
}
?>
