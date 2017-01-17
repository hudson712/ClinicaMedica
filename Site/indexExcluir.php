<?php
require 'lib/Connection.php';
$dbh = new Connection();
$sql = 'delete from consulta where id = :id';
$id = filter_input(INPUT_GET,'id');
$sth=$dbh->prepare ($sql);
$sth->bindParam(':id',$id);
$sth->execute();
header ('Location:indexLogadoMed.php');
?>