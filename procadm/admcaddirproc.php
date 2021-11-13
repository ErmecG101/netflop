<?php
session_start();
include '../config/conexao.php';


if (isset($_POST['codcon'])) {
    $direp = filter_input(INPUT_POST, 'direp');
    $dirtemp = filter_input(INPUT_POST, 'dirtemp');
    $codcon = $_POST['codcon'];
}

$contit = $_POST['codconview'];
$uploaddir = 'C:\xampp\htdocs\netflop\dir/' . $contit . '/';
$direp = filter_input(INPUT_POST, 'direp');
$_FILES['dirdir']['name'] = $direp . '.mp4';
$uploadfile = $uploaddir . $dirtemp . '/' . basename($_FILES['dirdir']['name']);

if (!$contit || !$_FILES['dirdir']['tmp_name'] || !$direp || !$dirtemp) {
    $_SESSION['status'] = 'camposvazios';
    header('Location: ../admcaddir.php');
} else {

    if (!file_exists($uploaddir)) {
        mkdir($uploaddir, 0777, true);
    }
    if (!file_exists($uploaddir . $dirtemp)) {
        mkdir($uploaddir . $dirtemp, 0777, true);
    }
    if (file_exists('C:\xampp\htdocs\netflop\dir/' . $contit . '/' . $dirtemp . '/' . $direp . '.mp4')) {
        $_SESSION['diretorio'] = 'existe';
        header("Location: admcaddir.php");
    }

    echo '<pre>';
    if ((move_uploaded_file($_FILES['dirdir']['tmp_name'], $uploadfile)) && ($_SESSION['diretorio'] != 'existe')) {
        $_SESSION['diretorio'] = 'sucesso';
        $dirdir = 'dir/' . $contit . '/' . $dirtemp . '/' . basename($_FILES['dirdir']['name']);
        $insert_diretorio = "insert into diretorios(dirdir, direp, dirtemp, codcon)values('$dirdir', '$direp', '$dirtemp', '$codcon')";
        $result_diretorio = mysqli_query($connect, $insert_diretorio);
        header("Location: ../admcaddir.php");
    } else if ($_SESSION['diretorio'] == 'existe') {
        header("Location: ../admcaddir.php");
    } else {
        $_SESSION['diretorio'] = 'falho';
        header("Location: ../admcaddir.php");
    }

    echo 'Aqui está mais informações de debug:';
    print_r($_FILES);

    print "</pre>";
}
