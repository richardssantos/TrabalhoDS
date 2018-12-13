
<?php
include_once "../conect.php";

//Consulta ao banco dados na tabela aluno
$busca_aluno = "SELECT * FROM aluno";
$resultado_busca = mysqli_query($conectando, $busca_aluno);




?>

<?php
	
	//Verifica se encontrou alguuma coisa na tabela aluno
	if ( ($resultado_busca) AND ($resultado_busca->num_rows != 0) ) {
		?>
			<table class="table col-sm-10 col-sm-offset-1">
				<thead class=" thead-dark ">
					<tr>
						<th >Matricula</th>
						<th >Nome</th>
						<th >E-mail</th>
						<th >Registro Não Aceito</th>
						<th> Editar </th>
					</tr>
				</thead>
			<tbody>
		<?php
		//lendo o array de resultados
		while ($linha_aluno = mysqli_fetch_assoc($resultado_busca) ) {
			if ( $linha_aluno['registroAceito'] == '0' ) {
			
			?>
			<tr>
				<form method="POST" action="../_edit/aceitaAluno.php">
					<input type="hidden" name="matricula" value="<?php $linha_aluno['matricula']; ?>">
					<th><?php echo $linha_aluno['matricula'];?> </th>
					<th><?php echo $linha_aluno['nome'];?> </th>
					<th><?php echo $linha_aluno['email'];?> </th>
					<th><?php echo $linha_aluno['registroAceito'];?> </th>
					<th><input type="submit" value="Aceitar"></th>
				</form>
			</tr>
			<?php
				
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
			}
		}
	} else {
		echo "<div class='alert alert-danger' role='alert'>Nenhum usuário encontrado!</div>";
	}
?>
	</tbody>
</table>