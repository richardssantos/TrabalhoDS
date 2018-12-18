
<?php
include_once "conect.php";

$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM aluno WHERE matricula = '$id' ";
$resultado = mysqli_query($conectando,$sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($conectando);

//Consulta ao banco dados na tabela aluno
$busca_aluno = "SELECT * FROM arquivo where ";
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
						<th >Curso</th>
					</tr>
				</thead>
			<tbody>
		<?php
		//lendo o array de resultados
		while ($linha_aluno = mysqli_fetch_assoc($resultado_busca) ) {
			if ( $linha_aluno['registroAceito'] == '1' ) {
			
			?>

			<tr>
			  <th><?php echo $linha_aluno['matricula'];?> </th>
			  <th><?php echo $linha_aluno['nome'];?> </th>
			  <th><?php echo $linha_aluno['email'];?> </th>
			  <th><?php echo $linha_aluno['idCurso'];?> </th>
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