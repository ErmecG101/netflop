<?php
session_start();

include '../config/conexao.php';

$usuemail = $_POST['usuemail'];
$usucel = $_POST['usucel'];

print_r($_POST);

$queryupdate = "update usuarios set usuemail = '$usuemail', usucel = '$usucel' where usucod =". $_SESSION['autenticado'];
$resultupdate = mysqli_query($connect, $queryupdate) or die($_SESSION['status'] = 'erro');

$_SESSION['status'] = 'sucesso';
header("Location: ../configuracoes.php");

