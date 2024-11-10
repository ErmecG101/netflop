<?php
include '../config/conexao.php';
session_start();
$tit = filter_input(INPUT_POST, 'contit');
$dur = filter_input(INPUT_POST, 'condur');
$eps = filter_input(INPUT_POST, 'coneps');
$sip = filter_input(INPUT_POST, 'consip');
$aut = filter_input(INPUT_POST, 'conaut');
$notimdb = filter_input(INPUT_POST, 'connotimdb');
$img = "dir/$tit/$tit.png";

if (!$tit || !$dur || !$eps || !$sip || !$aut || !$notimdb || !$img || !$_FILES['conimg']) {
    $_SESSION['status'] = 'camposvazios';
    header('Location: ../admcadcont.php');

} else {

    if(substr($tit, -1) == ' '){
        $tit = substr_replace($tit, ' ', -1);
    }

    if ((isset($_SESSION['acao'])) && ($_SESSION['acao'] == 'alt')) {
        if ($_FILES['conimg']['tmp_name']) {
            
            $uploaddir = '..\dir/' . $tit . '/';
            $_FILES['conimg']['name'] = $tit . '.png';
            $uploadfile = $uploaddir . basename($_FILES['conimg']['name']);
            if (!file_exists($uploaddir)) {
                mkdir($uploaddir, 0777, true);
            }
            if ((move_uploaded_file($_FILES['conimg']['tmp_name'], $uploadfile))) {
                $_SESSION['status'] = 'sucesso';
                $img = "dir/$tit/" . basename($_FILES['conimg']['name']);
                //header('Location: ../index.php');
            }
        }
        $concod = $_SESSION['concod'];
        $queryupdate = "update conteudos set contit = '$tit', conimg = '$img', condur = '$dur'
    , coneps = '$eps', consip = '$sip', conaut = '$aut'
    , connotimdb = $notimdb where concod ='$concod'";
        $result = mysqli_query($connect, $queryupdate);
        include "../processos/conttratcheck.php";
        header('Location: ../index.php');
    } else {

        $uploaddir = '..\dir/' . $tit . '/';
        $_FILES['conimg']['name'] = $tit . '.png';
        $uploadfile = $uploaddir . basename($_FILES['conimg']['name']);
        if (!file_exists($uploaddir)) {
            mkdir($uploaddir, 0777, true);
        }
        if ((move_uploaded_file($_FILES['conimg']['tmp_name'], $uploadfile))) {
            $_SESSION['status'] = 'sucesso';
            $img = "dir/$tit/" . basename($_FILES['conimg']['name']);
            $queryinsert = "insert into conteudos(contit,conimg,condur,coneps,consip,conaut,connotimdb)
                        values('$tit','$img','$dur','$eps','$sip','$aut','$notimdb')";
            $resultinsert = mysqli_query($connect, $queryinsert);
            include "../processos/conttratcheck.php";
            header('Location: ../index.php');
        } else {
            $_SESSION['status'] = 'falho';
            echo "falho";
            print_r($_FILES['conimg']);
            header("Location: ../admcadcont.php");
        }
    }
}
