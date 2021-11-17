<?php
	include '../config/conexao.php';


    $concod = $_GET['concod'];

    $querys = "SELECT * FROM diretorios_de_conteudo WHERE concod = '$concod'";

    $result = mysqli_query($connect, $querys);
    $listas = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($listas);
?>