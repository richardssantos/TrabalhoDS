
<?php

include_once('conect.php');
include('atividade.php');
//Sessão


//inserindo pdf
	$id = intval($id);
	$horas = intval($_POST['horasAtividade']);
	$idAtividade = intval($_POST['classeDefault']);
	echo "<script>
			alert('$id');
			</script>";
	$pasta = "../alunos/".$dados['matricula']."/";
	$allow = array('pdf');
	
	$temp_name = explode(".",$_FILES['arquivo']['name']);
	$extension_name=end($temp_name);
	$upload_file_name = $_FILES['arquivo']['name'];
	
	
	
	if (empty($_FILES['arquivo']['name'])) {
    	echo "<script>
			alert('Problema ao enviar PDF');
			window.location.href ='usuario.php';
			</script>";
	}
	else{
	if(move_uploaded_file($_FILES['arquivo']['tmp_name'],"$pasta".$_FILES['arquivo']['name'])){
	$query = mysqli_query($conectando,"insert into registro_atividade(nome_documento,valorEmHoras,matricula,idAtividade) values('".$upload_file_name."','".$horas."','".$id."'
	,'".$idAtividade."')");
		echo "<script>
			alert('PDF enviado com sucesso');
			window.location.href ='usuario.php'; 
			</script>
			";
	}else{
		"<script>
			alert('Erro ao enviar');
			window.location.href ='usuario.php';
			</script>
			";
	}
	}
?>
