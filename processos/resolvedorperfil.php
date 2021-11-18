
<?php

session_start();
include '../config/conexao.php';

$pernom = $_POST['pernom'];

if (isset($_POST['btnselper'])) { //SELEÇÃO
    $_SESSION['percod'] = $_POST['btnselper'];
    $query = "select * from perfil where percod = '" . $_SESSION['percod'] . "'";
    $result = mysqli_query($connect, $query);
    $ln = mysqli_fetch_assoc($result);
    $_SESSION['pernom'] = $ln['pernom'];
    $_SESSION['perpfp'] = $ln['perpfp'];
    $_SESSION['popup'] = 'yes';
    header('Location: ../index.php');
} else if (isset($_POST['btneditper'])) { //START EDIT
    $_SESSION['peredit'] = $_POST['btneditper'];
    $_SESSION['perfil'] = 'editar';
    header('Location: ../perfils.php');
} else if (isset($_POST['btnfinedit'])) { //FIN EDIT
    if (!$pernom) {
        $_SESSION['status'] = 'camposvazioz';
        unset($_SESSION['perfil']);
        unset($_SESSION['peredit']);
        header('Location: ../perfils.php');
    } else {
        $_FILES['perpfp']['name'] = $_POST['btnfinedit'] . '.png';
        unset($_SESSION['perfil']);
        unset($_SESSION['peredit']);
        $pernom = filter_input(INPUT_POST, 'pernom');
        if($_FILES['perpfp']['tmp_name']){
            include_once "uploadperfil.php";
        }else{
            $selectdir = 'select * from perfil where percod = '.$_POST['btnfinedit'];
            $resultdir = mysqli_query($connect, $selectdir);
            $ln_perdir = mysqli_fetch_assoc($resultdir);
            if($ln_perdir['perpfp'] == 'img/defaulticon.png'){
                $perpfp = 'img/defaulticon.png';
            }else{
                $perpfp = "dir/perfil/".$_SESSION['usunom']."/".$_POST['btnfinedit'].".png";
            }
        }
        if (isset($_POST['perkid'])) {
            $perkid = 1;
        } else {
            $perkid = 0;
        }
        if($_SESSION['percod'] == $_POST['btnfinedit']){
            $_SESSION['pernom'] = $pernom;
            $_SESSION['perpfp'] = $perpfp; 
        }
        $insertper = "update perfil set pernom = '$pernom', perkid = '$perkid', perpfp = '$perpfp', codusu='" . $_SESSION['autenticado'] . "' where percod ='" . $_POST['btnfinedit'] . "'";
        $resultper = mysqli_query($connect, $insertper);
        header('Location: ../perfils.php');
        print_r($_FILES['perpfp']);
    }
} else if (isset($_POST['btndelper'])) { //DEL

    if (!($_POST['btndelper'] == $_SESSION['percod'])) {
        $percod = $_POST['btndelper'];
        $querydelgost = "delete from gengost where codper = '$percod'";
        $resultdelgost = mysqli_query($connect, $querydelgost);
        $querydelres = "delete from resenhas where codper = '$percod'";
        $resultdelres = mysqli_query($connect,$querydelres);
        $query = "delete from perfil where percod = '$percod'";
        $result = mysqli_query($connect, $query);
        header('Location: ../perfils.php');
    } else {
        $_SESSION['status'] = 'Erro';
        header('Location: ../perfils.php');
    }
} else if (isset($_POST['btninsper'])) { //INSERT

    if (!$pernom) {
        $_SESSION['status'] = 'camposvazioz';
        header('Location: ../perfils.php');
    } else {
        $pernom = filter_input(INPUT_POST, 'pernom');
        if (isset($_POST['perkid'])) {
            $perkid = 1;
        } else {
            $perkid = 0;
        }
        $perpfp = 'img/defaulticon.png';
        $insertper = "insert into perfil(pernom, perkid, perpfp, codusu) values('$pernom','$perkid','$perpfp'," . $_SESSION['autenticado'] . ")";
        $resultper = mysqli_query($connect, $insertper);
        header('Location: ../perfils.php');
    }
} else if (isset($_POST['btngosper'])) {
    $_SESSION['status'] = 'Gostos';
    $_SESSION['pergost'] = $_POST['btngosper'];
    header("Location: ../perfils.php");
} else {
    header("Location: ../index.php");
}

?>


