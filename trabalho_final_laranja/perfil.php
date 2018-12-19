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
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<meta http-equiv="content-language" content="pt-br"/>
	<meta name="description" content="Site 'Escreva Melhor*'."/>
	<meta name="author" content="Carlos Souza"/>
	<link href="./css/perfil.css" rel="stylesheet" type="text/css" media="all">
	<link href="./css/bootstrap.css" rel="stylesheet" type="text/css" >
</head>
<body>
<div id="tudoperfil">
<div id="topoperfil" style="z-index:99999">
  <a href="feedpage.php"><img  id="logo" height="60" width="60" src="./imagens/lologo.png"></a>
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
      <a href="#">
      <img height="40" width="40" src="./imagens/perfil.png"></a>
    </div>
    <div id="MenuImg7" >
      <a href="./system/loggout.php">
      <img height="40" width="40" src="./imagens/logout.fw.png"></a>
    </div>
  </div>
</div>
</div>
</div>
<div id="caixaa">
  <div id="caixai">
    <img src="<?=$user->ft_perfil?>">
    <div id="caixab">
      <h3><b>Nome:</b><?=$user->nome?></h3>
      <h3><b>Usuário:</b><?=$user->usuario?></h3>
      <h3><b>Email:</b><?=$user->email?></h3>
      <h3><b>Sexo:</b><?=$user->sexo?></h3>
    </div>
  </div>
</div>
  


</body>
</html>

