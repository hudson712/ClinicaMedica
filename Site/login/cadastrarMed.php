<?php

require '../lib/Connection.php';
//pega todos os campos antes digitado
$nome =filter_input(INPUT_POST, 'nome');
$endereco=filter_input(INPUT_POST, 'endereco');
$telefone=filter_input(INPUT_POST, 'telefone');
$cpf=filter_input(INPUT_POST, 'cpf');
$rg=filter_input(INPUT_POST, 'rg');
$especialidade=filter_input(INPUT_POST, 'especialidade');
$email=filter_input(INPUT_POST, 'email');
$sexo=filter_input(INPUT_POST, 'sexo');
$senha=filter_input(INPUT_POST, 'senha');

$dbh = new Connection();
//insere em medico
$sql ='insert into medico (nome,endereco,telefone,cpf,rg,especialidade,email,sexo,senha) value (:nome,:endereco,:telefone,:cpf,:rg,:especialidade,:email,:sexo,:senha)';
$sth=$dbh->prepare($sql); 
$sth->bindParam(':nome',$nome);
$sth->bindParam(':endereco',$endereco);
$sth->bindParam(':telefone',$telefone);
$sth->bindParam(':cpf',$cpf);
$sth->bindParam(':rg',$rg);
$sth->bindParam(':especialidade',$especialidade);
$sth->bindParam(':email',$email);
$sth->bindParam(':sexo',$sexo);
$salt='GFE%$#¨Y(Juge56GUh7y7tg6f85ddeMINHA ROLA';
$senha = $salt.$senha.$salt;
$senha =md5($senha);
$sth ->bindParam(':senha',$senha);

//redireciona dependendo do resultado
if($sth->execute()){
	header ('Location:../index.php?status=1');
}else{

header ('Location:../index.php?status=2');
}





?>