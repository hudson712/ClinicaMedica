<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Registre-se</title>
    
    
    
<!--chama arquivos do bootstrap-->    
        <link rel="stylesheet" href="css/style.css">
<!--editos estilos-->
<!--comento o comentario a cima ;) -->
    <style>
      #centro{
        text-align: center;
      }

  #centro input{
    text-align: center;
  }

  #espacamento{

text-align: center;


  margin-left: 300px;
margin-right: 300px;

margin-top: 50px;
margin-bottom: 50px;

  }
    </style>
    
    
  </head>

  <body>

    <!DOCTYPE html>
<head>
<!--chamo arquivos bootstrap-->
  <link href='css/bootstrap.min.css' rel='stylesheet' type='text/css'>
  <link href='css/datepicker.min.css' rel='stylesheet' type='text/css'>
  <link href='css/bootstrap-switch.css' rel='stylesheet' type='text/css'>
  <script src='js/jquery.min.js' type='text/javascript'></script>
  <script src='js/bootstrap.min.js' type='text/javascript'></script>
  <script src='js/bootstrap-datepicker.min.js' type='text/javascript'></script>
  <script src='js/bootstrap-switch.min.js' type='text/javascript'></script>
  
</head>
<body>
       

  <div class='container'>
  <?php
// pego o status sla da onde e retorno se cadastro ou n mas não lembro bem pois foi no inicio do projeto e acho que ele nem diz que cadastro pois ele redireciona direto pra outra página.
    $status=filter_input(INPUT_GET,'status');
    if($status){
      if($status==1){
        echo '<div class="alert alert-success">';
        echo 'Cadastro Realizado com Sucessso';
        echo '</div>';
      }
    }elseif($status==2) {
        echo '<div class="alert alert-danger">';
        echo 'Erro ao Cadastrar';
        echo '</div>';
    }


    ?>
    <!--corpo da pagina bootstrap-->
        <br>
    <div class='panel panel-primary dialog-panel'>
      <div class='panel-heading'>
      </div>
      <div class='panel-body'>
        


        <form class='form-horizontal' role='form' method="post" action="cadastrar.php">
          <div class='form-group'>
            <div id="centro">
            <div id="espacamento">
   <!--capturo os campos abaixo para fazer o cadastro-->
        <label>Nome:</label>
           <input type="text" name="nome" class="form-control"  maxlength="80" required placeholder="Digite Aqui Seu Nome:" autocomplete='off'>
          <br>
          <br>
          <label>Endereço:</label>
          <input type="text" name="endereco" class="form-control"  maxlength="180" required placeholder="Digite Aqui Seu Endereço:" autocomplete='off'>
          <br>
          <br>
          <label>Contato:</label>
          <input type="text" name="telefone" class="form-control"  maxlength="15" required placeholder="Phone:" autocomplete='off'>
          <br>
          <br>
          <label>CPF:</label>
          <input type="int" name="cpf" class="form-control"  maxlength="11" required placeholder="CPF:  xxxxxxxxxxx" autocomplete='off'>
          <br>
          <br>
          <label>RG:</label>
          <input type="int" name="rg" class="form-control"  maxlength="10" required placeholder="RG:  xxxxxxxxxx" autocomplete='off'>
          <br>
          <br>
          <label>Tipo Sanguíneo:</label>
          <input type="text" name="sangue" class="form-control"  maxlength="2" required placeholder="B+" autocomplete='off'>
          <br>
          <br>
          <label>Email:</label>
          <input type="email" name="email" class="form-control"  maxlength="80" required placeholder="xxxxx@xxxxx.com" autocomplete='off'>
          <br>
          <br>
          <label>Sexo:</label>
          <input type="text" name="sexo" class="form-control"  maxlength="20" required placeholder="feminino" autocomplete='off'>
          <br>
          <br>
          <label>Senha:</label>
          <input type="password" name="senha" class="form-control"  maxlength="32" required placeholder="Ahb226fsdsd" autocomplete='off'>
          <br>
          <br>
          <label>Sintomas:</label>
          <textarea type="text" name="sintomas" class="form-control"  maxlength="300" required placeholder="Dor xxxxx" rows='4' autocomplete='off'></textarea> 
          <br>
          <br>
          <!--ao submeter ele me manda para cadastrar-->
           <input type="submit" class="btn btn-primary" value="Registar">
          </div>
          </div>
 </div>
         
               
           
        </form>
      </div>
    </div>
  </div>
</body>
    
      
    
    
  </body>
</html>
