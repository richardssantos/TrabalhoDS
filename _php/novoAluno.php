
<?php
include_once "conect.php";

//Consulta ao banco dados na tabela aluno
$busca_aluno = "SELECT * FROM aluno";
$resultado_busca = mysqli_query($conectando, $busca_aluno);

?>

<?php
	
	//Verifica se encontrou alguuma coisa na tabela aluno
	if ( ($resultado_busca) AND ($resultado_busca->num_rows != 0) ) {
		?>
			<table class="table col-sm-10 col-sm-offset-1 table-hover">
				<thead class=" thead-dark ">
					<tr>
						<th >Matricula</th>
						<th >Nome</th>
						<th >E-mail</th>
						<th >Registro Não Aceito</th>
						<th >Aceitar</th>
						<th >Recusar</th>
					</tr>
				</thead>
			<tbody>
		<?php
		//lendo o array de resultados
		while ($linha_aluno = mysqli_fetch_assoc($resultado_busca) ) {
			if ( $linha_aluno['registroAceito'] == '0' ) {
			?>

			<tr>
				<th><?php echo $linha_aluno['matricula'];?> </th>
				<th><?php echo $linha_aluno['nome'];?> </th>
				<th><?php echo $linha_aluno['email'];?> </th>
				<th><?php echo $linha_aluno['registroAceito'];?> </th>
				<th><input class="btn-success" type="submit" value="Editar"></th>					
			</tr>
			<?php
			}
		}
	} else {
		echo "<div class='alert alert-danger' role='alert'>Nenhum usuário encontrado!</div>";
	}
?>
	</tbody>
</table>