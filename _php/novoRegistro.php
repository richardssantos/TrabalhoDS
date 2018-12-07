<?php
include_once "conect.php";

//Consulta ao banco dados na tabela aluno

$busca_aluno = "SELECT * FROM aluno ORDER BY matricula";
$resultado_busca = mysqli_query($conectando, $busca_aluno);

if ( ($resultado_busca) AND ($resultado_busca->num_rows != 0) ) {
	//lendo o array de resultados
	while ($linha_aluno = mysqli_fetch_assoc($resultado_busca) )
	{
		echo $linha_aluno['nome'] . "<br>";
	}
		
} else {
	echo "Nenhum usuário encontrado";
}
