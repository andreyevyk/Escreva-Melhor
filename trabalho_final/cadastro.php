
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>TCC</title>
  <link href="./css/cadastro.css" rel="stylesheet" type="text/css" media="all">
  <link href="./css/bootstrap.css" rel="stylesheet" type="text/css" >
</head>
<body>
  <div id="tudocad">
    <div id="topocad" >
      <img id="logo" height="80" width="80" src="./imagens/lologo.png">
      <h2>Escreva Melhor*</h2>
      </div>
   <img id="imgcad" src="./imagens/escrita.jpg">
  <div id="fundo">
          <form action="./system/AddUser.php"  method="post" id="addUser">
           <fieldset>
            <center> <legend lang="pt-br">Identificação</legend></center>
            <div id="cadastro">
            <p><label for="nome">Nome Completo</label></p>
            <input required="true" size="49" maxlength="50" placeholder="Digite seu nome"
                    type="text" id="nome" name="nome">

            <p><label for="user">Usuário</label></p>
            <input required="true" size="49" maxlength="50" placeholder="Digite seu usuário"
                    type="text" id="user" name="user">
           
            <p><label for="senha">Senha</label></p>
            <input required="true" size="49" maxlength="50" type="password" id="senha" name="senha" placeholder="Senha" />

            <p><label for="csenha">Confirme sua senha</label></p>
            <input required="true" size="49" maxlength="50" type="password" name="csenha" placeholder="Senha" />

           <p><label for="email">E-mail</label></p>
            <input required="true" size="49" maxlength="50" placeholder="Digite seu e-mail"
                    type="email" id="email" name="email">
                            

            <div class="form-group">
               <label for="genero_txt">Gênero</label>
                <div class="radio">
                 <label class="radio-inline">
                   <input type="radio" name="sexo" checked id="GeneroM" value="M"> M
                 </label>
                 <label class="radio-inline">
                    <input type="radio" name="sexo" id="GeneroF" value="F"> F
                </label>
              </div>
             </div>

            <input type="submit" id="enviar" value="Enviar" style="border:none; border-radius: 4px; position: absolute;top: 400px;left: 331px; height: 27px;width: 57px;">
            </div>
            </fieldset>
          </form>

  </div>
 


    
<script language="JavaScript" src="./js/jquery.js"></script>
<script language="JavaScript" src="./js/bootstrap.js"></script>
<script language="JavaScript" src="./js/confign.js"></script>

</body>
 
</html>