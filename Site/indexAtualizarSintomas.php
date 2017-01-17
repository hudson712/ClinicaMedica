<?php

        session_start();
    if( !isset ($_SESSION ['logado']) ){
        header('Location: login/login.php');
    }
   
  require 'lib/Connection.php';
//pega o nome do paciente assim como ja foi mostrado
    $conexao = new Connection();
    $sql ='select * from paciente where id=:id;';
    $rs = $conexao->prepare ($sql);
    $id = $_SESSION ['logado'];
    $rs->bindParam(':id',$id);
    $rs->execute();
    $row = $rs->fetch(PDO::FETCH_OBJ);
     

?>

<!DOCTYPE html>
<html lang="pt">

<head>

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

    <!-- Ala principal -->
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
                <a href="indexLogado.php"  onclick = $("#menu-close").click(); >Bem-Vindo <?php echo $row->nome ?></a>
            </li>
            <li>
                <a href="login/logout.php" onclick = $("#menu-close").click(); >Logout</a>
            </li>
           
        </ul>
    </nav>

    <!-- Header -->
    <header id="top" class="header">
        <div class="text-vertical-center">
            <h1>Clínica X</h1>
            <h3>Vida &amp; Saúde</h3>
            <br>
            <form class='form-horizontal' role='form' method="post" action="atualizar.php">
             <div id="centro">
            <div id="espacamento">
             <label>Novos Sintomas:</label>
            <textarea type="text" name="sintomas" class="form-control"  maxlength="300" required placeholder="Dor xxxxx" rows='4' autocomplete='off'></textarea> 
            <input type="submit" class="btn btn-primary" value="Atualizar!">
            </div>
            </div>
            </form>
        </div>
    </header>

   

    
    <!-- Rota pé -->
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
