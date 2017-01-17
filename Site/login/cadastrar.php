<?php

require '../lib/Connection.php';
//pega todos os campos digitados
$nome =filter_input(INPUT_POST, 'nome');
$endereco=filter_input(INPUT_POST, 'endereco');
$telefone=filter_input(INPUT_POST, 'telefone');
$cpf=filter_input(INPUT_POST, 'cpf');
$rg=filter_input(INPUT_POST, 'rg');
$sangue=filter_input(INPUT_POST, 'sangue');
$email=filter_input(INPUT_POST, 'email');
$sexo=filter_input(INPUT_POST, 'sexo');
$senha=filter_input(INPUT_POST, 'senha');
$sintomas=filter_input(INPUT_POST, 'sintomas');


$dbh = new Connection();
//insere os dados no banco 
$sql ='insert into paciente (nome,endereco,telefone,cpf,rg,sangue,email,sexo,senha,sintomas) value (:nome,:endereco,:telefone,:cpf,:rg,:sangue,:email,:sexo,:senha,:sintomas)';
$sth=$dbh->prepare($sql); 
$sth->bindParam(':nome',$nome);
$sth->bindParam(':endereco',$endereco);
$sth->bindParam(':telefone',$telefone);
$sth->bindParam(':cpf',$cpf);
$sth->bindParam(':rg',$rg);
$sth->bindParam(':sangue',$sangue);
$sth->bindParam(':email',$email);
$sth->bindParam(':sexo',$sexo);
//coloca sal na senha
$salt='GFE%$#¨Y(Juge56GUh7y7tg6f85ddeMINHA ROLA';
$senha = $salt.$senha.$salt;
$senha =md5($senha);
$sth ->bindParam(':senha',$senha);
$sth->bindParam(':sintomas',$sintomas);
//se funcionar ele vai index status 1 se n vai pra 2
if($sth->execute()){
	header ('Location:../index.php?status=1');
}else{

header ('Location:../index.php?status=2');
}





?>