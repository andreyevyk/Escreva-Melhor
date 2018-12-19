<?php

$pdo = new PDO("mysql:host=localhost;dbname=cadastro;charset=utf8","root","123");

#$result=$pdo->query("SELECT * FROM textos");
$result=$pdo->query("SELECT textos.texto, textos.titulo, textos.id_user, users.nome,users.ft_perfil, textos.id FROM textos INNER JOIN users ON textos.id_user=users.id");

#var_dump($result);
?>

<?php
if ($result) {
	while ($row = $result->fetch(PDO::FETCH_OBJ)) {
		#var_dump($row);
			
			#$res=$pdo->prepare("SELECT users.nome, users.id from users INNER JOIN textos ON users.id=texto.id_users")

#			SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
#FROM Orders
#INNER JOIN Customers
#ON Orders.CustomerID=Customers.CustomerID;
	 ?>
	<div id="laranja">
 		<div id="azul">
 			<img style="margin-top: 14px;" src="<?=$row->ft_perfil?>">
 			<h4><?=$row->nome?></h4>
 			<div id="texto">
				<h3 style="text-align:center;"><?=$row->titulo;?></h3><hr><br><p><?=$row->texto;?></p>
			</div>
		</div>
			<div id="panel" allign="left" >
				<div class="panel panel-default" style="background:transparent; border:none;">
  					<div style="background:transparent; background-color:#4682B4;width: 935px;margin-left: 8px;"" id="exib_coment<?=$row->id?>" class="panel-body" >
  					<input type="text" style="display:none;" name="asd" id="asd" value="<?=$row->id?>" >

			  		</div>
			  	<div class="panel-footer" style="background:transparent; background-color:#4682B4;width: 935px;margin-left: 8px;"">
			  		<ol class="breadcrumb">
			  		  <li><a href="#"><label  for="comentario<?=$row->id?>">Criar Comentário</label></a></li>
 					 <li><a href="#"><button onclick="controleComent(<?=$row->id?>)" type="submit" style="border:none;background:transparent;" id="exibindoComentarios" name="exibindoComentarios"><label>Mostar Comentários</label></button></a></li>
					</ol>
			  		<form action="" method="POST" id="formcoment">
						<label>Envie um comentário</label><textarea id="comentario<?=$row->id?>" name="comentario<?=$row->id?>" class="form form-control" placeholder="Digite seu comentario" ></textarea>
						<input type="submit" style="margin-top: 10px;" value="Enviar comentário" name="bt<?=$row->id?>"  class="btn btn-default">
					</form>			
				</div>
			</div>



			</div>

			<?php

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

			
			if (isset($_POST['bt'.$row->id])) {
				$coment = $_POST['comentario'.$row->id];
				$dono = $user->id;
				$txt = $row->id;
				$donon =$user->nome;



				$con = new PDO("mysql:host=localhost;dbname=cadastro;charset=utf8", "root", "123");
				$stmt = $con->prepare("INSERT INTO comentarios(comentario, dono, id_texto, nome_dono) VALUES (?, ?, ?, ?)");

				$stmt->bindParam(1, $coment);
				$stmt->bindParam(2, $dono);
				$stmt->bindParam(3, $txt);
				$stmt->bindParam(4, $donon);



				$stmt->execute();

				$stmt1 = $con->prepare("SELECT * FROM comentarios WHERE id_texto =  ? AND dono = ?");


				$stmt1->bindParam(1, $txt);
				$stmt1->bindParam(2, $dono);

				$stmt1->execute();

				$a = $stmt1->fetch(PDO::FETCH_OBJ);
				$stmt2 = $con->prepare("INSERT INTO controle_cmt(id_texto, id_coment) VALUES (?, ?)");
				$b = $a->id;

				$stmt2->bindParam(1, $txt);				
				$stmt2->bindParam(2, $b);

				$stmt2->execute();



			}


 			?>

	</div>
	</div>

	<?php
		}

	?>




<?php	
}	

?>
<script type="text/javascript" src="js/jquery.js"></script>
<script>

function controleComent(testeC){
  var ecoment = testeC;	
  $.ajax({
            type: "POST",
            url: "./system/carregacoment.php",
            data: {id:testeC},
            success: function (data, textStatus, jqXHR){
              var obj1 = $.parseJSON(data); 
              var htmlFinalCurt = "";
              $.each(obj1, function(index, valor){

                 htmlFinalCurt += '<div class="alert alert-info" role="alert" >';
				 htmlFinalCurt += '<b>'+valor.dono+': </b>'+valor.comentarios;
				 htmlFinalCurt += '</div>';
                 $("#exib_coment"+ecoment).html(htmlFinalCurt);
              });
            },
          });
}
	  
</script>
