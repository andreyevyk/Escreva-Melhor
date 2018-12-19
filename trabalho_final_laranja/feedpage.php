<?php 
 session_start();

if(isset($_SESSION["loginUser"]) and isset($_SESSION["loginSenha"])){
  $con = new PDO("mysql:host=localhost;dbname=cadastro;charset=utf8", "root", "123");
  $stmt = $con->prepare("select * from users where usuario = ? and senha = MD5(?)");

  $b = strip_tags(trim($_SESSION["loginUser"]));
  $c = strip_tags(trim($_SESSION["loginSenha"]));
  $stmt->bindParam(1, $b);
  $stmt->bindParam(2, $c);

  $stmt->execute();
  if($stmt->rowCount() !== 1){
    header("Location: ./");
  }

  $user = $stmt->fetch(PDO::FETCH_OBJ);
}else{
  header("Location: ./");
}


 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Feedpage</title>
	<meta charset="utf-8"/>
	<meta http-equiv="content-language" content="pt-br"/>
	<meta name="description" content="Site 'Escreva Melhor*'."/>
	<meta name="author" content="Carlos Souza"/>
	<link href="./css/feed.css" rel="stylesheet" type="text/css" media="all">
	<link href="./css/bootstrap.css" rel="stylesheet" type="text/css" >
</head>
<body>
<div id="tudofeed">
<div id="topofeed" style="z-index:9999">
  <a href="#"><img  id="logo" height="60" width="60" src="./imagens/lologo.png"></a>
  <span id="nomepessoa"><?=$user->nome?></span>
  <div id="Menu">
  <div id="MenuImg">
    <div id="MenuImg4">
      <a href="escreva.php">
      <img width="40" height="40"  src="./imagens/lapis.png"></a>
    </div>
    <div id="MenuImg5">
        <a href="bolhas.php">
      <img height="40" width="40" src="./imagens/bolhas.png"></a>
    </div>
    <div id="MenuImg6">
      <a href="perfil.php">
      <img height="40" width="40" src="./imagens/perfil.png"></a>
    </div>
   <div id="MenuImg7" >
      <a href="./system/loggout.php">
      <img height="40" width="40" src="./imagens/logout.fw.png"></a>
    </div>
  </div>
</div>
</div>

<div id="divBusca">
  <input type="text" id="txtBusca" style="color: #ADD8E6" placeholder="Buscar..."/>
  <img src="./imagens/search3.png" width="33" height="33" id="btnBusca" alt="Buscar"/>
</div>
        <?php
        include './system/carregatexto.php';
        ?>


</div>

<script type="text/javascript" src="js/jquery.js"></script>

</body>
</html>