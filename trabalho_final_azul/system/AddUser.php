<?php 

	$con = new PDO("mysql:host=localhost;dbname=cadastro;charset=utf8", "root", "123");
	$stmt = $con->prepare("insert into users(nome, usuario, senha, email, sexo) values (?, ?, MD5(?), ?, ?)");


	$a = strip_tags(trim($_POST["nome"]));
	$b = strip_tags(trim($_POST["user"]));
	$c = strip_tags(trim($_POST["senha"]));
	$d = strip_tags(trim($_POST["email"]));
	$e = strip_tags(trim($_POST["sexo"]));


	$stmt->bindParam(1, $a);
	$stmt->bindParam(2, $b);
	$stmt->bindParam(3, $c);
	$stmt->bindParam(4, $d);
	$stmt->bindParam(5, $e);


	$stmt->execute();

	echo "<script>alert('Cadastrado com sucesso')</script>";
	echo "<meta http-equiv='refresh' content='0, url=/trabalho_final/'>";

 ?>