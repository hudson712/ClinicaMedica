 <?php
// igual a login só que me manda para indexLogadoMed
$nome = filter_input(INPUT_POST,"nome");
$senha = filter_input(INPUT_POST,"senha");
$med="";
$msg="";
if($nome){
  require '../lib/Connection.php';
  $conexao = new Connection();
  $sql ='select * from medico where nome=:nome and senha =:senha';
  $salt='GFE%$#¨Y(Juge56GUh7y7tg6f85ddeMINHA ROLA';
      $senha = $salt.$senha.$salt;
      $senha =md5($senha);
      $rs =$conexao->prepare($sql);
  $rs->bindParam(':nome',$nome);
  $rs->bindParam(':senha',$senha);
  $rs->execute();
  $row = $rs->fetch(PDO::FETCH_OBJ);

 if($row){
    session_start();
    $_SESSION['logadoMed'] =$row->id;
    header('Location:../indexLogadoMed.php');
  }else{
    $msg ='<div class="alert alert-danger">Dados não conferem!</div>';
  }
}


?>


<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Médico</title>
    
    
    
    <link rel='stylesheet prefetch' href='http://daneden.github.io/animate.css/animate.min.css'>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,400italic,700italic,700'>

        <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>

  <body>

    <div class='form animated flipInX'>
  <h2>Entre Agora!</h2>
  <?php echo $msg ?>
  <form method="post">
    <input name="nome" placeholder='Nome...' type='text' required autocomplete='off'>
    <input name="senha" placeholder='Senha...' type='password' required autocomplete='off'>
    <button class='animated infinite pulse'>Login</button>
  </form>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
    
    
  </body>
</html>
