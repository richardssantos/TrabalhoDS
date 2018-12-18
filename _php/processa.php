<?php 

session_start();

include_once("conect.php");
$matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_NUMBER_INT); 

    #Conecta banco de dados 
    $sql = mysqli_query($conectando, "SELECT * FROM aluno WHERE matricula = '{$matricula}'");

    #Se o numero de colunas com a matricula correspondente for maior que 0 então já existe uma matricula no banco
    if(mysqli_num_rows($sql)>0) {
        echo "<script>
			alert('Matricula já existe');
			window.location.href ='../index.php';
			</script>
			";
	}
	else{
       
		$nome = filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_STRING);

		$email = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_EMAIL);

		$telefone = filter_input(INPUT_POST, 'telefone',FILTER_SANITIZE_NUMBER_INT);

		$curso = filter_input(INPUT_POST, 'curso',FILTER_SANITIZE_NUMBER_INT);

		$curriculo = filter_input(INPUT_POST, 'curriculo',FILTER_SANITIZE_NUMBER_INT);

		$ano = filter_input(INPUT_POST, 'ano',FILTER_SANITIZE_STRING);

		$semestre = filter_input(INPUT_POST, 'semestre',FILTER_SANITIZE_STRING);

		$senha = filter_input(INPUT_POST, 'senha',FILTER_SANITIZE_STRING);
		
		$formatura = $ano."/".$semestre;
		
		$senharepete = filter_input(INPUT_POST, 'senharepete',FILTER_SANITIZE_STRING);
		if(strcmp($senha,$senharepete) > 0){
			echo "<script>
			alert('Senhas não coincidem!');
			window.location.href ='../_links/register.php';
			</script>
			";
		}
		else{
			$resultado_usuario = "INSERT INTO aluno(matricula,nome, email, tel, senha,idCurso,idCurriculo,provavelFormatura) VALUES ('$matricula', '$nome','$email','$telefone','$senha',$curso,$curriculo,'$formatura')";

			$resultado = mysqli_query($conectando,$resultado_usuario);
			mkdir("../alunos/".$matricula);
			if ($resultado){
			echo "<script>
			alert('Aluno cadastrado com sucesso!');
			window.location.href ='../index.php';
			</script>
			";
			}else{
				echo "<script>
				alert('Não foi possível cadastrar Usuario!');
				window.location.href ='../index.php';
				</script>
				";
			}
		
		}
	}
?>
