 <?php
//capturo os campos enviados via post da propria pag e salvo em variáveis
$nome = filter_input(INPUT_POST,"nome");
$senha = filter_input(INPUT_POST,"senha");
$med="";
$msg="";
//quando existir algo em $nome
if($nome){
  require '../lib/Connection.php';
  $conexao = new Connection();
  //pego tudo de paciente que tiver o nome e senha com o que foi solicitado
  $sql ='select * from paciente where nome=:nome and senha =:senha';
  $salt='GFE%$#¨Y(Juge56GUh7y7tg6f85ddeMINHA ROLA';
      $senha = $salt.$senha.$salt;
      $senha =md5($senha);
      $rs =$conexao->prepare($sql);
  $rs->bindParam(':nome',$nome);
  $rs->bindParam(':senha',$senha);
  $rs->execute();
  $row = $rs->fetch(PDO::FETCH_OBJ);
//se sair algo eu crio a sessão logado com o id do mesmo se não mando uma msg de erro
 if($row){
    session_start();
    $_SESSION['logado'] =$row->id;
    header('Location:../indexLogado.php');
  }else{
    $msg ='<div class="alert alert-danger">Dados não conferem!</div>';
  }
}


?>


<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    
    
    <!--chamo arquivos de bootstrap-->
    <link rel='stylesheet prefetch' href='http://daneden.github.io/animate.css/animate.min.css'>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,400italic,700italic,700'>

        <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>

  <body>

    <div class='form animated flipInX'>
  <h2>Entre Agora!</h2>
  <?php echo $msg ?>
  <form method="post">
  <!--passo os dados pelo input-->
    <input name="nome" placeholder='Nome...' type='text' required autocomplete='off'>
    <input name="senha" placeholder='Senha...' type='password' required autocomplete='off'>
    <button class='animated infinite pulse'>Login</button>
    <!--me manda para indexLogado-->
  </form>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
    
    
  </body>
</html>
