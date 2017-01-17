<?php 
session_start();
//igual ao logout
unset($_SESSION['logadoMed']);


 header('Location: ../index.php');

?>