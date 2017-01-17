<?php
//checa se estou logado
session_start();
 if( !isset ($_SESSION ['logado']) ){
        header('Location: login/login.php');
    }

    require 'lib/Connection.php';
//passa o id para dentro da var id e pega os sintomas passados 
    $id = $_SESSION ['logado'];
    $sintomas=filter_input(INPUT_POST, 'sintomas');

    $dbh = new Connection();
    //da um update nos sintomas do paciente e da consulta
	$sql ='update paciente set sintomas=:sintomas where id=:id;update consulta set doenca=:sintomas where idPaciente=:id;';
	$sth=$dbh->prepare($sql); 
	$sth->bindParam(':id',$id);
	$sth->bindParam(':sintomas',$sintomas);
//se funcionar me manda para indexLogado stus  1 se n, vai 2
if($sth->execute()){
	header ('Location:indexLogado.php?status=1');
}else{

header ('Location:indexLogado.php?status=2');
}

?>