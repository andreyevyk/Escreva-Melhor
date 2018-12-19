<?php 

	$con = new PDO("mysql:host=localhost;dbname=cadastro;charset=utf8", "root", "123");
	$stmt = $con->prepare("insert into textos(texto, titulo, id_user) values (?, ?, ?)");


	$a = strip_tags(trim($_POST["texto"]));
	$b = strip_tags(trim($_POST["titulo"]));
	$c = strip_tags(trim($_POST["id"]));


	$stmt->bindParam(1, $a);
	$stmt->bindParam(2, $b);
	$stmt->bindParam(3, $c);

	$stmt->execute();

	echo "<script>alert('Texto compartilhado!')</script>";
	echo "<meta http-equiv='refresh' content='0, url=/trabalho_final/'>";
	
 ?>