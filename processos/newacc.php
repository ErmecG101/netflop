<?php
session_start();
include '../config/conexao.php';

$usunom = filter_input(INPUT_POST, 'usunom');
$ususen = filter_input(INPUT_POST, 'ususen');
$ususenconf = filter_input(INPUT_POST, 'ususenconf');
$usuemail = filter_input(INPUT_POST, 'usuemail');
$usucel = filter_input(INPUT_POST, 'usucel');

if ((($usunom == '') || ($ususen == '') || ($usuemail == '') || ($usucel == '')) || ($ususen != $ususenconf)) {
    $_SESSION['camposvazios'] = 1;
    header('Location: ../accform.php');
} else {
    $insert_usuario = "insert into usuarios(usunom,ususen,usuemail,usucel) values('$usunom',MD5('$ususen'),'$usuemail','$usucel');";
    $result_usuario = mysqli_query($connect, $insert_usuario);
    $busca_usuario = "select * from usuarios order by usucod desc";
    $result_busca_usuario = mysqli_query($connect, $busca_usuario);
    $ln = mysqli_fetch_assoc($result_busca_usuario);
    $usucod = $ln['usucod'];
    $insert_perfil = 'insert into perfil(pernom, perkid, perpfp, codusu)values("'.$usunom.'","0", "img/defaulticon.png", "'.$usucod.'")';
    $_SESSION['percheck'] = 'Perfil Inicial Criado.';
    sleep(1);
    if(!$result_usuario){
        $_SESSION['status']='erro';
        header('Location: ../accform.php');
    }else{
    $_SESSION['criado'] = '1';
    $result_perfil = mysqli_query($connect, $insert_perfil);
    header('Location: ../loginform.php');
    echo $usucod;
}
}
?>