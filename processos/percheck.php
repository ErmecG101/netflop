<?php

$select_procura = `select * from perfil as p inner join usuarios as u where p.codusu = u.usucod and u.usucod =`. $_SESSION['autenticado'];
$result = mysqli_query($connect, $select_procura) or die ("Erro na query: $select_procura");
$numrow = mysqli_num_rows($result);

if($numrow == 1){
    $ln = mysqli_fetch_assoc($result);
    $_SESSION['pernom'] = $ln['pernom'];
    $_SESSION['percod'] = $ln['percod'];
    $_SESSION['percheck'] = 'Perfil Inicial já existente';
}else{
    //abrir janela de seleção de perfil.
    $_SESSION['percheck'] = 'Multiplos perfis existentes';
}




?>