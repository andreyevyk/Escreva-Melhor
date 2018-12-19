<?php 

session_start();

if(isset($_SESSION["loginUser"]) and isset($_SESSION["loginSenha"])){
  $con = new PDO("mysql:host=localhost;dbname=cadastro", "root", "123");
  $stmt = $con->prepare("select * from users where usuario = ? and senha = MD5(?)");

  $b = strip_tags(trim($_SESSION["loginUser"]));
  $c = strip_tags(trim($_SESSION["loginSenha"]));

  $stmt->bindParam(1, $b);
  $stmt->bindParam(2, $c);

  $stmt->execute();
  if($stmt->rowCount() == 1){
    header("Location: ./feedpage.php");
  }
  if($stmt->rowCount() == 0){
    echo "<script>alert('Infelizmente é coisa de maluco')</script>";
  }

  $stmt->fetch(PDO::FETCH_OBJ);


}

 ?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>TCC</title>
	<link href="./css/estilo.css" rel="stylesheet" type="text/css" media="all">
	<link href="./css/bootstrap.css" rel="stylesheet" type="text/css" >
</head>
<body>
  <div id="tudoh">
    <div id="topohome">
      <img id="logo" height="80" width="80" src="./imagens/lologo.png">
      <h2>Escreva Melhor*</h2>
      <form id="loginForm" method="post" action="#">
        <div id="login">
          <label for="login">Login: </label>
          <input type="text" id="user" name="user" required  placeholder=" Digite seu usuário" style="border:none; border-radius: 4px;"">
          <label for="senha">Senha: </label>
          <input type="password" id="senha" required name="senha" placeholder=" Digite sua senha" style="border:none; border-radius: 4px;">
          <input type="submit" name="OK" id="submit" value="Entrar" style="border:none; border-radius: 4px">
        </div>
        </form>
      </div>

    <div id="principal">
      <div id="slide">
       <img id="img" src="./imagens/slide2.jpg">
        <a href="cadastro.php"  type="button"  style="position: absolute;top: 479px;right: 1174px;" class="btn btn-default btn-lg"> Cadastre-se</a>
       <p style="position: absolute; left: 27px; width: 700px; top: 195px;" id="p1">Possui dificuldade ao escrever?</p> 
       <p style="position: absolute; left: 27px;top: 254px; width: 600px;font-size:30px; " id="p2">Escreva Melhor te ajuda!</p>
       <p style="position: absolute; left: 27px;top: 340px; width: 550px;font-size:14px; " id="p2">Escreva, poste e edite. Tudo isso de forma conjunta com outras pessoas, que podem lhe oferecer mais conhecimento. Ajuda mútua é a base do nosso trabalho. Aqui você pode escrever da sua maneira, mas lembre-se, todos estarão apreciando a sua obra.</p>
      </div>

  <div id="caixa">
    <div class="caixa-escreva">
     <h3>Escreva</h3>
     <span id="pen" class="glyphicon glyphicon-pencil">
     <h4>Sinta-se a vontade para escrever qualquer gênero linguístico.</h4>
   </div>

  <div class="caixa-compartilhe">
    <h3>Compartilhe</h3>
    <span id="share" class="glyphicon glyphicon-share-alt">
    <h4>Fique livre para mostrar ao público tudo que queres escrever e deixe-os ajudar.</h4>
  </div>

  <div class="caixa-edite">
    <h3>Comente</h3>
    <span id="edit" class="glyphicon glyphicon-edit">
    <h4>Ajude o próxima a escrever melhor o seu conteúdo. De forma simples comentando alguma melhoria. Será de grande importância para todos.</h4>
  </div>

  <div class="caixa-inove">
   <h3>Inove</h3>
    <span id="inove" class="glyphicon glyphicon-refresh"/>
    <h4>Escreva Melhor, atualiza sua forma de escrever contando com a sua ajuda!</h4>
  </div>
 </div>

</div>

</div>
<!-- JAVA SCRIPT ARQUIVOS -->
<script language="JavaScript" src="./js/jquery.js"></script>
<script language="JavaScript" src="./js/bootstrap.js"></script>
<script language="JavaScript" src="./js/script.js"></script>
</body>
</html>








