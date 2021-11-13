<?php

session_start();
include '../config/conexao.php';

$rentit = filter_input(INPUT_POST, 'rentit');
$rentex = filter_input(INPUT_POST, 'rentex');
$rennot = filter_input(INPUT_POST, 'rennot');
$codper = $_SESSION['percod'];
$codcon = $_SESSION['concod'];

if (!$rentit || !$rentex || !$rennot || !$codper || !$codcon) {
    $_SESSION['status'] = 'erro_campos_vazios';
    header("Location: ../assistir.php?dircod=" . $_SESSION['dircod'] . "&&direp=" . $_SESSION['direp'] . "&&dirtemp=" . $_SESSION['dirtemp'] . "&&contit=" . $_SESSION['contit']);
} else {
    if (isset($_SESSION['status'])) {
        if (isset($_POST['btnsendres'])) {
            $update = "update resenhas set rentit = '$rentit', rentex ='$rentex'  where rencod = '" . $_SESSION['rencod'] . "'";
            $result = mysqli_query($connect, $update);
            $_SESSION['status'] = 'conferido';
            header("Location: ../admrescons.php");
        } else if (isset($_POST['btndelres'])) {
            $delete = "delete from resenhas where rencod = '" . $_SESSION['rencod'] . "'";
            $result = mysqli_query($connect, $delete);
            header("Location: ../admrescons.php");
        }
        unset($_SESSION['rentit']);
        unset($_SESSION['rentex']);
        unset($_SESSION['rennot']);
        unset($_SESSION['status']);
    } else {
        if ($_SESSION['percod']) {
            if ($_SESSION['rentit']) {
                $update = "update resenhas set rentit = '$rentit', rennota = '$rennot' ,rentex ='$rentex'  where codper = '" . $_SESSION['percod'] . "'";
                $result = mysqli_query($connect, $update);
                $_SESSION['status'] = 'atualizado';
                header("Location: ../assistir.php?dircod=" . $_SESSION['dircod'] . "&&direp=" . $_SESSION['direp'] . "&&dirtemp=" . $_SESSION['dirtemp'] . "&&contit=" . $_SESSION['contit']);
            } else {
                $insert = "insert into resenhas(rentit, rentex, rennota, codper, codcon)values('$rentit','$rentex','$rennot','$codper','$codcon')";
                $result = mysqli_query($connect, $insert);
                $_SESSION['status'] = 'Perfil';
                header("Location: ../assistir.php?dircod=" . $_SESSION['dircod'] . "&&direp=" . $_SESSION['direp'] . "&&dirtemp=" . $_SESSION['dirtemp'] . "&&contit=" . $_SESSION['contit']);
            }
        } else {
            $_SESSION['status'] = 'NA_Perfil';
            header("Location: ../assistir.php?dircod=" . $_SESSION['dircod'] . "&&direp=" . $_SESSION['direp'] . "&&dirtemp=" . $_SESSION['dirtemp'] . "&&contit=" . $_SESSION['contit']);
        }
    }
}
