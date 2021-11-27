<?php
	include '../config/conexao.php';
	$op = $_GET['op'];
	$usucod = $_GET['usucod'];
	$usunom = $_GET['usunom'];
	$ususen = $_GET['ususen'];
	$usuemail = $_GET['usuemail'];
	$usucel = $_GET['usucel'];
	$query = "SELECT * FROM usuarios WHERE usucod = '$usucod'";
	$result = mysqli_query($connect,$query);
	$ln = mysqli_fetch_assoc($result);
	
	if(isset($ln['percod'])){
		$percod = $ln['percod'];
	}else{
		$percod='';
	}
	
	$queryi = "INSERT INTO usuarios(usunom,ususen,usuemail,usucel)VALUES('$usunom',md5('$ususen'),'$usuemail','$usucel');";
	$queryu = "UPDATE usuarios SET usunom='$usunom', ususen=md5('$ususen'), usuemail='$usuemail', usucel='$usucel' WHERE usucod = '$usucod';";
	$queryd = "DELETE FROM gengost WHERE codper='$percod'; DELETE FROM resenhas WHERE codper = '$percod';
	DELETE FROM perfil WHERE codusu='$usucod'; DELETE FROM usuarios WHERE usucod='$usucod';";
	$querys = "SELECT * FROM usuarios";
	$querysl = "SELECT * FROM usuarios WHERE usuemail='$usuemail' AND ususen=md5('$ususen');";
	$queryse = "SELECT * FROM usuarios WHERE usuemail = '$usuemail'";

	if (($op == 'i') || ($op == 'I')) {
		$result = mysqli_query($connect, $queryi);
		echo $result;
	} else if (($op == 'u') || ($op == 'U')) {
		$result = mysqli_query($connect, $queryu);
		echo $result;
	} else if (($op == 'd') || ($op == 'D')) {
		$result = mysqli_query(	$connect, $queryd);
		echo $result;
	} else if (($op == 's') || ($op == 'S')) {
		$result = mysqli_query($connect, $querys);
		$listas = mysqli_fetch_all($result, MYSQLI_ASSOC);
		echo json_encode($listas);
	} else if (($op == 'sl') || ($op == 'SL')) {
		$result = mysqli_query($connect, $querysl);
		$listas = mysqli_fetch_all($result, MYSQLI_ASSOC);
		echo json_encode($listas);
	} else if (($op == 'se')||($op == 'SE')) {
		$result = mysqli_query($connect, $queryse);
		$listas = mysqli_fetch_all($result, MYSQLI_ASSOC);
		echo json_encode($listas);
	}
?>