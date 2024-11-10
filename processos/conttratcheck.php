<?php

$a = count($_POST);
$b = array_values($_POST);

// print_r($_POST);
echo $a;

echo "<br><br>";

echo $a-6 .' ';



echo "<br><br>";
    $query_conteudo = "select * from conteudos where contit = '$tit'";
    $result_conteudo = mysqli_query($connect,$query_conteudo);
    $ln_cont = mysqli_fetch_assoc($result_conteudo);
    echo '<br> ln_cont[concod]: '.$ln_cont['concod'];
    if ((isset($_SESSION['acao'])) && ($_SESSION['acao'] == 'alt')) {
        $delete = "delete from gencon where codcon ='".$ln_cont['concod']."'";
        $result_delete = mysqli_query($connect, $delete);
        echo "editar";
    }

for ($i = 6;$i<$a; $i++){
    print_r("<br> b[i]: ".$b[$i].' ');
    $insert_gencon = "insert into gencon(codgen, codcon) values (".$b[$i].",".$ln_cont['concod'].");";
    $result_gencon = mysqli_query($connect,$insert_gencon);
}


echo $result;