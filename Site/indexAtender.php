<?php
//checo se existe a sessão
        session_start();
    if( !isset ($_SESSION ['logadoMed']) ){
        header('Location: login/loginMed.php');
    }//crio uma sessão com o id do cara que eu vou atender para ter um melhor controle da informação
   $id = filter_input(INPUT_GET,'id');
   session_start();
   $_SESSION['idAtender'] =$id;
  require 'lib/Connection.php';
    
    $conexao = new Connection();
    //faço um select de tudo que o medico tiver para pegar o nome dele apartir de id que eu uso a da sessão
    $sql ='select * from medico where id=:id;';
    $rs = $conexao->prepare ($sql);
    $id = $_SESSION ['logadoMed'];
    $rs->bindParam(':id',$id);
    $rs->execute();
    $row = $rs->fetch(PDO::FETCH_OBJ);
    $consultas =0;
    $stmt = $conexao->query("select count(*) as q from consulta where status=1");
    $rs = $stmt->fetch(PDO::FETCH_OBJ);
    if($rs){
        $consultas = $rs->q;
    }
?>
<!DOCTYPE html>
<html lang="pt">

<head>
<!--bootstrap-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clinica X</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

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

    <!-- menu lateral  -->
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
            <!--insiro via php o nome do individuo pelo select que fiz lá a cima-->
                <a href="indexLogadoMed.php"  onclick = $("#menu-close").click(); >Bem-Vindo <?php echo $row->nome ?></a>
            </li>
            <li>
                <a href="login/logoutMed.php" onclick = $("#menu-close").click(); >Logout</a>
            </li>
            <li>
                <a href="indexPacientes.php" onclick = $("#menu-close").click(); >Pacientes de Hoje!</a>
            </li>
            <li>
                <a href="indexConsultasRequisitadas.php" onclick = $("#menu-close").click(); >Consultas Requisitadas: <?php echo $consultas ?> </a>
            </li>
         
        </ul>
    </nav>

    <!-- corpo da pag  -->
    <header id="top" class="header">
        <div class="text-vertical-center">
            <h1>Clínica X</h1>
            <h3>Vida &amp; Saúde</h3>
            <br>

<!--capturo data sala e hora -->
            <form class='form-horizontal' role='form' method="post" action="indexMarcar.php">
             <div id="centro">
            <div id="espacamento">
            <label>Sala:</label>
           <input type="text" name="sala" class="form-control"  maxlength="10" required placeholder="Digite Aqui A Sala:" autocomplete='off'>
             <label>Data da consulta:</label>
            <input type="date" name="data" class="form-control" required autocomplete='off'></input> 
              <label>Hora da consulta:</label>
            <input type="time" name="time" class="form-control" required autocomplete='off'></input>
            <br> 
            <input type="submit" class="btn btn-primary" value="Marcar!">
            

            </div>
            </div>
            </form>












        </div>
    </header>

   

    
    <!-- Rodapé -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>Trabalho de Programação Web-2</strong>
                    </h4>
                    <p>XXXX Xxxxxxx<br>XXXXX,xxx</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i> (XX) XXXX-XXXX</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:name@example.com">XXXXXX@example.com</a>
                        </li>
                    </ul>
                    <br>
                    <hr class="small">
                    <p class="text-muted">-Start Bootstrap-</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>

</body>

</html>
