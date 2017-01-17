<?php
session_start();
 if( !isset ($_SESSION ['logado']) ){
        header('Location: login/login.php');
    }

require 'lib/Connection.php';

    $conexao = new Connection();
    $sql ='select * from paciente where id=:id;';
    $rs = $conexao->prepare ($sql);
    $id = $_SESSION ['logado'];
    $rs->bindParam(':id',$id);
    $rs->execute();
    $row = $rs->fetch(PDO::FETCH_OBJ);

$nome =$row->id;
$doenca=$row->sintomas;

$conexao = new Connection();
  $sql ='select * from consulta where idPaciente=:nome and status =1';
      $rs =$conexao->prepare($sql);
  $rs->bindParam(':nome',$nome);
  $rs->execute();
  $row2 = $rs->fetch(PDO::FETCH_OBJ);

 if(!$row2){


$dbh = new Connection();
$sql ='insert into consulta (idPaciente,doenca,status)  value (:nome,:doenca,1)';
$sth=$dbh->prepare($sql); 
$sth->bindParam(':nome',$nome);
$sth->bindParam(':doenca',$doenca);

if($sth->execute()){
    header ('Location:indexLogado.php?status=1');
}else{

header ('Location:indexLogado.php?status=2');
}

}else{
   header ('Location:indexLogado.php?status=3'); 
}


?>