<?php
session_start();
include '../config/conexao.php';

$admemail = filter_input(INPUT_POST, 'admemail');
$admsen = filter_input(INPUT_POST, 'admsen');

$query = "select * from adm where admemail = '$admemail' and admsen = '$admsen'";
$result = mysqli_query($connect,$query);
$numrow = mysqli_num_rows($result);

if ($numrow == 1){
    $ln = mysqli_fetch_assoc($result);
    $_SESSION['admcod'] = $ln['admcod'];
    $_SESSION['admnom'] = $ln['admnom'];
    unset($_SESSION['naoautenticado']);
    header('Location: ../adm/admindex.php');
}else{
    $_SESSION['errou'] = 1;
    header('Location: ../adm/admindex.php');
}