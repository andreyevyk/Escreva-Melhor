<?php

	session_start();

	$con = new PDO("mysql:host=localhost;dbname=cadastro;charset=utf8", "root", "123");
	$stmt = $con->prepare("select * from users where usuario = ? and senha = MD5(?)");

	$b = strip_tags(trim($_POST["userp"]));
	$c =  strip_tags(trim($_POST["senhap"]));

	$stmt->bindParam(1, $b);
	$stmt->bindParam(2, $c);

	$stmt->execute();

	$user = $stmt->fetch(PDO::FETCH_OBJ);

	if ($stmt->rowCount() == 1){
		$_SESSION["loginUser"] = strip_tags(trim($_POST["userp"])); 
		$_SESSION["loginSenha"] = strip_tags(trim($_POST["senhap"]));
		die("1");
	}else{
	}

?>