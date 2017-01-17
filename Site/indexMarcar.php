  <?php
  session_start();
    if( !isset ($_SESSION ['logadoMed']) ){
        header('Location: login/loginMed.php');
    }
   
  require 'lib/Connection.php';

$sala =filter_input(INPUT_POST, 'sala');
$data=filter_input(INPUT_POST, 'data');
$time=filter_input(INPUT_POST, 'time');
$id = $_SESSION ['idAtender'];
//acrescenta o 00 no horario para o formato hh:mm:ss
$time = $time.':00';
$idMed=$_SESSION ['logadoMed'];
//gambi que eu fiz mas não tirei com medo de dar ruim mesmo sendo inutilizavel!
$dataP = explode('/', $date);
$dataNoFormatoParaOBranco = $dataP[2].'-'.$dataP[1].'-'.$dataP[0];

	$conexao = new Connection();
	$sql ='update consulta set sala=:sala,data=:data,status=2 where idPaciente=:id;';
	$sth=$conexao->prepare($sql); 
	$sth->bindParam(':id',$id);
	$sth->bindParam(':sala',$sala);
	$sth->bindParam(':data',$data);
	
	

	if($sth->execute()){
	
	$conexao = new Connection();
	$sql2 ='update consulta set hora=:time,idMedico=:medico where id=:id;';
	$sth2=$conexao->prepare($sql2); 
	$sth2->bindParam(':id',$id);
	$sth2->bindParam(':time',$time);
	$sth2->bindParam(':medico',$idMed);
	$sth2->execute();
header ('Location:indexLogadoMed.php?status=1');

}else{

header ('Location:indexLogadoMed.php?status=2');
}




  ?>
    