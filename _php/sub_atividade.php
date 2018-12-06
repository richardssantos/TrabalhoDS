<?php include_once("conect.php");

	$classeDefault = $_REQUEST['classeDefault'];
	
	$result_sub_cat = "SELECT * FROM atividades WHERE idCategoria=$classeDefault ORDER BY atividade";
	$resultado_sub_cat = mysqli_query($conectando, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$sub_categorias_post[] = array(
			'id'	=> $row_sub_cat['id'],
			'atividade' => utf8_encode($row_sub_cat['atividade']),
			'unidade' => utf8_encode($row_sub_cat['unidade']),
		);
	}
	
	echo utf8_encode(json_encode($sub_categorias_post));


?>