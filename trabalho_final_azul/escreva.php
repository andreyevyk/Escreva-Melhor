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
  <link href="./css/escreva.css" rel="stylesheet" type="text/css" media="all">
  <link href="./css/bootstrap.css" rel="stylesheet" type="text/css" >
</head>
<body>
<div id="tudoes">
<div id="topoes" style="z-index: 9999">
  <a href="feedpage.php"><img  id="logo" height="60" width="60" src="./imagens/lologo.png"></a>
  <span id="nomepessoa"><?=$user->nome?></span>
  <div id="Menu">
  <div id="MenuImg">
    <div id="MenuImg4">
      <a href="#">
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
    <div id="MenuImg7">
      <a href="./system/loggout.php">
      <img height="40" width="40" src="./imagens/logout.fw.png"></a>
    </div>
  </div>
</div>
</div>
<div id="escreva">
      <h3>Sinta-se a vontade para escrever seu texto aqui!</h3>
      <div id="texto">
        <form action="./system/AddTexto.php" method="post">
          <input id="titulo" type="text" style="text-align: center" name="titulo" placeholder="Digite aqui seu título">
            <textarea name="texto" id="textarea"></textarea>
          </div>      
            <input type="hidden" value="<?=$user->id?>" name="id">
            <input id="button" type="submit" name="button" value="Compartilhar">
        </form>
</div>

<div id="imgfundo">
  <img id="lapis" height="198" src="./imagens/lapis-de-cor.png">
  <img id="livro" height="175" src="./imagens/livro-cor.png">
</div>
</div>

</body>

</html>

