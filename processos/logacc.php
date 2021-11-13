<?php
session_start();
include '../config/conexao.php';

$email = filter_input(INPUT_POST, 'usuemail');
$sen = filter_input(INPUT_POST, 'ususen');

$queryuser = "select * from usuarios where usuemail = '$email' and ususen = MD5('$sen')";
$resultuser = mysqli_query($connect, $queryuser);

$queryadm = "select * from adm where admemail = '$email' and admsen = MD5('$sen')";
$resultadm = mysqli_query($connect, $queryadm);

$numrowuser = mysqli_num_rows($resultuser);
$numrowadm = mysqli_num_rows($resultadm);

if (!$email || !$sen){
    $_SESSION['naoautenticado'] = 'camposvazios';
    header('Location: ../loginform.php');
}else{
if (($numrowuser == 1) || ($numrowadm == 1)) {
    include_once 'logout.php';
    if ($numrowadm == 1) {
        $ln = mysqli_fetch_assoc($resultadm);
        $_SESSION['admin'] = 1;
        $_SESSION['autenticado'] = $ln['admcod'];
        $_SESSION['admnom'] = $ln['admnom'];
        unset($_SESSION['naoautenticado']);
        header('Location: ../index.php');
    } else {
        $_SESSION['admin'] = 0;
        $ln = mysqli_fetch_assoc($resultuser);
        $queryperfil = "select * from perfils_usuario where usucod = '".$ln['usucod']."'";
        $resultperfil = mysqli_query($connect,$queryperfil);
        $ln_perf = mysqli_fetch_assoc($resultperfil);
        $_SESSION['percod'] = $ln_perf['percod'];
        $_SESSION['pernom'] = $ln_perf['pernom'];
        $_SESSION['perpfp'] = $ln_perf['perpfp'];
        $_SESSION['autenticado'] = $ln['usucod'];
        $_SESSION['usunom'] = $ln['usunom'];
        unset($_SESSION['naoautenticado']);
        header('Location: ../index.php');
    }
} else {
    $_SESSION['naoautenticado'] = 1;
    header('Location: ../loginform.php');
}
}