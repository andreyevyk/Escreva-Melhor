<?php
	$con = new PDO("mysql:host=localhost;dbname=cadastro;charset=utf8","root","123");
	$array = array();

	$tes = strip_tags(trim($_POST['id']));

	foreach ($con->query("SELECT * FROM comentarios WHERE id_texto = ".$tes)->fetchAll(PDO::FETCH_ASSOC) as $result) {
	
		array_push($array, array("dono"=>$result['nome_dono'],"comentarios"=>$result['comentario']));

	}

	$out = array_values($array);
	json_encode($out);
	echo json_encode($out);

?>

