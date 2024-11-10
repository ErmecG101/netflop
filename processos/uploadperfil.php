<?php

$uploaddir = '../dir/perfil/' . $_SESSION['usunom'] . '/';

    $uploadfile = $uploaddir . basename($_FILES['perpfp']['name']);
    if (!file_exists($uploaddir)) {
        mkdir($uploaddir, 0777, true);
    }
    if ((move_uploaded_file($_FILES['perpfp']['tmp_name'], $uploadfile))) {
        $_SESSION['diretorio'] = 'sucesso';
        $perpfp = "dir/perfil/".$_SESSION['usunom']."/".basename($_FILES['perpfp']['name']);
    }else{
        $_SESSION['diretorio'] = 'falho';
        $perpfp = "img/defaulticon.png";
        echo "falho";
        print_r($_FILES['perpfp']);
    }
