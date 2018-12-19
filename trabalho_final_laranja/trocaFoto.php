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


$_UP['pasta'] = 'imagens/uploads/';

 $_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb

 $_UP['extensoes'] = array('jpg', 'png', 'gif','jpeg');

 $_UP['renomeia'] = true;

 $_UP['erros'][0] = 'Não houve erro';
 $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
 $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
 $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
 $_UP['erros'][4] = 'Não foi feito o upload do arquivo';

 if ($_FILES['foto']['error'] == 4) {
   die("Não foi possível fazer o upload, erro:" . $_UP['erros'][$_FILES['foto']['error']]);
   exit; // Para a execução do script
 }


 // Faz a verificação da extensão do arquivo
 $extensao = strtolower(end(explode('.', $_FILES['foto']['name'])));
 if (array_search($extensao, $_UP['extensoes']) === false) {
   echo "Por favor, envie arquivos com as seguintes extensões: jpg, jpeg, png ou gif";
   // header('Location: ./');
   exit;
 }
 // Faz a verificação do tamanho do arquivo
 if ($_UP['tamanho'] < $_FILES['foto']['size']) {
   echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
   // header('Location: ./');
   exit;
 }

 // Primeiro verifica se deve trocar o nome do arquivo
 if ($_UP['renomeia'] == true) {
   // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
   $nome_final = md5(time()).'.jpg';
 } else {
   // Mantém o nome original do arquivo
   $nome_final = $_FILES['foto']['name'];
 }

 if (move_uploaded_file($_FILES['foto']['tmp_name'], $_UP['pasta'] . $nome_final)) {
   // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
  $guardarVar = $_UP['pasta'] . $nome_final;
   // echo "Upload efetuado com sucesso!";
   // echo '<a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
   
  $h = $guardarVar;
  $y = $user->id;

  # COLOQUE O PDO AQUI
  $stmt = $con->prepare("UPDATE `users` SET `ft_perfil` = ? WHERE `users`.`id` = ?");

  $stmt->bindParam(1, $h);
  $stmt->bindParam(2, $y);


  $stmt->execute();
 }else {
   // Não foi possível fazer o upload, provavelmente a pasta está incorreta
   echo "Não foi possível enviar o arquivo, tente novamente";
 }
 



?>