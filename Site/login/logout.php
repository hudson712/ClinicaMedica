<?php 
session_start();
//apaga a sessão logado e me manda para pagina principal   |  index
unset($_SESSION['logado']);

 header('Location: ../index.php');
?>