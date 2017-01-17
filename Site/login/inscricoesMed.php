<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Registre-se</title>
    
    
    <!--Pagina exatamente igual a do paciente só que essa me manda para cadastrarMed-->
    
        <link rel="stylesheet" href="css/style.css">

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
margin-bottom: 50x;

  }
    </style>
    
    
  </head>

  <body>

    <!DOCTYPE html>
<head>
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
        <br>
    <div class='panel panel-primary dialog-panel'>
      <div class='panel-heading'>
      </div>
      <div class='panel-body'>
        


        <form class='form-horizontal' role='form' method="post" action="cadastrarMed.php">
          <div class='form-group'>
            <div id="centro">
            <div id="espacamento">
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
          <label>Especialidade:</label>
          <input type="text" name="especialidade" class="form-control"  maxlength="60" required placeholder="Pediatra" autocomplete='off'>
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
