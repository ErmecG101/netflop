<?php
	include '../config/conexao.php';
	$op = $_GET['op'];
	$admnom = $_GET['admnom'];
	$admcod = $_GET['admcod'];
	$admsen = $_GET['admsen'];
	$admemail = $_GET['admemail'];
	$admfunc = $_GET['admfunc'];
	$admfunccel = $_GET['admfunccel'];

	$queryi = "INSERT INTO adm(admnom,admsen,admemail,admfunc,admfunccel)VALUES('$admnom',md5('$admsen'),'$admemail','$admfunc','$admfunccel');";
	$queryu = "UPDATE adm SET admnom='$admnom',admsen=md5('$admsen'),admemail='$admemail',admfunc='$admfunc',admfunccel='$admfunccel' WHERE admcod = '$admcod';";
	$queryd = "DELETE FROM adm WHERE admcod='$admcod';";
	$querys = "SELECT * FROM adm WHERE admnom like '%$admnom%';";
	$querysl = "SELECT * FROM adm WHERE admemail = '$admemail' AND admsen =md5('$admsen');";
	$queryse = "SELECT * FROM adm WHERE admemail = '$admemail';";
	$queryp = "SELECT * FROM adm WHERE admcod = '$admcod';";

	if (($op =='i') || ($op == 'I')) {
		$result = mysqli_query($connect, $queryi);
		echo $result;
	} else if (($op == 'u') || ($op =='U')) {
		$result = mysqli_query($connect, $queryu);
		echo $result;
	} else if (($op == 'd') || ($op =='D')) {
		$result = mysqli_query($connect, $queryd);
		echo $result;
	} else if (($op == 's') || ($op == 'S')){
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
	} else if (($op == 'p')||($op == 'P')) {
		$result = mysqli_query($connect, $queryp);
		$listas = mysqli_fetch_all($result, MYSQLI_ASSOC);
		echo json_encode($listas);
	}
	 
?>