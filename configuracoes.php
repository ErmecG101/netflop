<?php

include 'config/header.php';
include 'config/menu.php';
include 'config/footer.php';
include 'config/conexao.php';

?>
<link rel="stylesheet" href="./css/style.css">
<script type="text/javascript" src="./JS/generic.js"></script>
<script type="text/javascript" src="./JS/mask.js"></script>
<form method="POST" action="./processos/updateusu.php">
    <div class="container-fluid">
    <?php
        if(isset($_SESSION['status'])){
            if($_SESSION['status'] == 'sucesso'){
                echo '<div class="alert alert-warning" role="alert">Dados alterados com sucesso!</div>';
            }else{
                echo '<div class="alert alert-danger" role="alert">Ocorreu uma falha</div>';
            }
            unset($_SESSION['status']);
        }
    ?>
    </div>
<div class=" mt-3 pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <h4>Ola <?php echo $_SESSION['pernom'] ?></h4>
                <h5>Configurações de Usuário:</h5>
                <?php

                if (((isset($_SESSION['admin']))) && ($_SESSION['admin'] == 1)) {
                    include './procadm/admperfil.php';
                ?>
            </div>
            <div class="col-md-8">
                <label>Nome de Usuário: </label>
                <input type="text" class="form-control" name="admnom" value="<?php echo $lna['admfunc'] ?>">

                <label>Email: </label>
                <input type="email" class="form-control" name="admemail" value="<?php echo $lna['admemail'] ?>">

                <label>Celular: </label>
                <input type="text"  class="form-control" name="admfunccel" value="<?php echo $lna['admfunccel'] ?>">
            </div>
        <?php
                } else {
                    include './processos/consultausuario.php';
                    include './processos/consultaperfil.php';
        ?>
            <label>Nome de Usuário: </label>
            <input type="text" readonly class="form-control" style="background-color: rgb(39, 45, 59);" name="usunom" value="<?php echo $ln['usunom'] ?>">

            <label>Email: </label>
            <input type="email" class="form-control" name="usuemail" value="<?php echo $ln['usuemail'] ?>">

            <label>Celular: </label>
            <input type="text" onkeyup="mascara(this, celular)" maxlength="15" class="form-control" name="usucel" value="<?php echo $ln['usucel'] ?>">
                <div class="container-fluid" >
                    <br>
                    <button type="submit" class="btn btn-warning">Atualizar Dados</button>
                </div>
        </div>
        </form>
        <div class="col-md-6">
        <?php include 'processos/consultaperfil.php';?>
        <center><h4>Perfil:</h4>
        <div class="card-dark" style="background-color: rgb(45, 51, 70); width: 15rem;">
            <center><img src="<?php echo $lnpc['perpfp'] ?>" class="perfbigicon card-img-top" alt="..."></center>
            <div class="card-body">
                <center>
                    <h5 class="card-title"><?php echo $lnpc['pernom'] ?></h5>
                </center>
            </div>
            
            <form action="./processos/resolvedorperfil.php" method="POST" enctype="multipart/form-data">
                    <ul style="background-color: rgb(45, 51, 70);" class="list-group list-group-flush">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input disabled type="checkbox" name="perkid" value="" class="teste" aria-label="Chebox para permitir input text" <?php if($lnpc['perkid'] == 1){echo 'checked'; }  ?>>
                                </div>
                            </div>
                            <input readonly type="text" value="Criança" style="background-color: rgb(39, 45, 59); color: white;" class="form-control" aria-label="Input text com checkbox">
                        </div>
                        <br>
                        <a href="javascript:popupOpenPer()" value="" class="btn btn-secondary">Conferir Perfils</a>
                    </ul>       
            </form>
        </div></center>
        </div>
    <?php
                }

    ?>

    </div>
</div>
</div>