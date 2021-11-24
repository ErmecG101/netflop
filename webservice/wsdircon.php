<?php
	include '../config/conexao.php';

	$op = $_GET['op'];
    $concod = $_GET['concod'];
    $contit = $_GET['contit'];

	$querysa = "SELECT * FROM diretorios_de_conteudo";
    $querysl = "SELECT * FROM diretorios_de_conteudo WHERE concod = '$concod'";
	
	if ($op == 'sl') {
		$result = mysqli_query($connect, $querysl);
		$listas = mysqli_fetch_all($result, MYSQLI_ASSOC);
		echo json_encode($listas);
	} else if ($op == 'sa') {
		$result = mysqli_query($connect, $querysa);
		$listas = mysqli_fetch_all($result, MYSQLI_ASSOC);
		echo json_encode($listas);

	}
?>