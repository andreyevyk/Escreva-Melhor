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
	<link href="./css/bolhas.css" rel="stylesheet" type="text/css" media="all">
	<link href="./css/bootstrap.css" rel="stylesheet" type="text/css" >
</head>
<body>
<div id="tudobolhas">
<div id="topobolhas" style="z-index:30000" >
  <a href="feedpage.php"><img  id="logo" height="60" width="60" src="./imagens/lologo.png"></a>
  <span id="nomepessoa"><?=$user->nome?></span>
  <div id="Menu">
  <div id="MenuImg">
    <div id="MenuImg4">
      <a href="escreva.php">
      <img width="40" height="40"  src="./imagens/lapis.png"></a>
    </div>
    <div id="MenuImg5">
            <a href="#">
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
  <div id="bubles">
    <img width="350" id="bolhas" src="./imagens/mister_bubbles.gif">
    <img height="270" width="400" id="balao" src="./imagens/balao.png">
    <p>Mr. Bubbles sou eu, vim aqui para te ajudar!</p>
  </div>
<div id="caixapen1">
  <span id="pen" style=" border-radius:5px black" class="glyphicon glyphicon-pencil"/>
</div>  
<div id="caixapen2">
  <span id="pen" style=" border-radius:5px black" class="glyphicon glyphicon-pencil"/>
</div>  
<div id="caixapen3">
  <span id="pen" style=" border-radius:5px black" class="glyphicon glyphicon-pencil"/>
</div>  
<div id="dicas">
  <h2>Dicas de português</h2> 
  <hr style="height:2px; border:none; color:#000; background-color:#000; width:375px"> 
  <div id="dica1" style=" margin-top: 25px;margin-left: 14px; text-align:justify;">
    <h3>Mas ou Mais?</h3>
    <p>o Mas é usado principalmente como conjunção que introduz uma contrariedade, uma adversidade. Já o Mais, na maioria das vezes, um advérbio de intensidade e corresponde ao contrário de “menos”.</p>
  </div>

  <div id="dica2" style="margin-top: 55px;left: 10px;text-align:justify;margin-left: 12px;">
    <h3>Mal ou Mau?</h3>
    <p>O adjetivo mau é o contrário de bom e o advérbio mal é o contrário de bem.</p>
  </div>
  <div id="dica3" style="margin-top: 55px;left: 10px;text-align:justify;margin-left: 12px;">
    <h3>A gente ou Agente?</h3>
    <p>A palavra agente é um substantivo comum e se refere à pessoa que faz algo. A gente é uma locução pronominal equivalente ao pronome pessoal reto nós.</p>
  </div>
</div>

</div>
</div>
</body>
</html>