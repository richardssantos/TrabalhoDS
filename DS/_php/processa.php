<?php 

session_start();

include_once("conect.php");
$matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_NUMBER_INT); 

    #Conecta banco de dados 
    $sql = mysqli_query($conectando, "SELECT * FROM aluno WHERE matricula = '{$matricula}'");

    #Se o numero de colunas com a matricula correspondente for maior que 0 então já existe uma matricula no banco
    if(mysqli_num_rows($sql)>0) {
        echo "Matricula já existe";
	}
	else{
       
		$nome = filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_STRING);

		$email = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_EMAIL);

		$telefone = filter_input(INPUT_POST, 'telefone',FILTER_SANITIZE_NUMBER_INT);

		$curso = filter_input(INPUT_POST, 'curso',FILTER_SANITIZE_STRING);

		$curriculo = filter_input(INPUT_POST, 'curriculo',FILTER_SANITIZE_NUMBER_INT);

//$ano = filter_input(INPUT_POST, 'ano',FILTER_SANITIZE_STRING);

//$semestre = filter_input(INPUT_POST, 'semestre',FILTER_SANITIZE_STRING);

		$senha = filter_input(INPUT_POST, 'senha',FILTER_SANITIZE_STRING);
	
//$senharepete = filter_input(INPUT_POST, 'senharepete',FILTER_SANITIZE_STRING);

		$resultado_usuario = "INSERT INTO aluno (matricula,nome, email, tel, senha) VALUES ('$matricula', '$nome','$email','$telefone','$senha')";

		$resultado = mysqli_query($conectando,$resultado_usuario);
		if (mysqli_insert_id($conectando)){
			header("Location: ../index.php");
			$_SESSION['msg'] = "Usuário Cadastrado com sucesso";
		}else{
			header("Location: ../index.php");
			$_SESSION['msg'] = "Olá mundo maldito da programação";
		}
	}	
?>