<!doctype html>
<html lang="en">

<?php

include 'config/header.php';
include 'config/menu.php';
?>
<script type="text/javascript" src="./JS/mask.js"></script>
<form class="mt-2" method="POST" action="processos/newacc.php">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <div class="mb-3"><img src="img/loginlogo.png" class="imglogin img-fluid mx-auto d-block" /></div>
                <?php
                if ((isset($_SESSION['camposvazios'])) && ($_SESSION['camposvazios'] == 1)) {
                    echo '<br> <div class="alert alert-danger" role="alert">Um ou mais campos vazios ou preenchidos de forma indevida</div>';
                    $_SESSION['camposvazios'] = 0;
                }
                if ((isset($_SESSION['status']))) {
                    if ($_SESSION['status'] == 'erro') {
                        echo '<div class="alert alert-warning" role="alert">Esse Email já existe ou ocorreu um erro na sua operação.</div>';
                    }
                    unset($_SESSION['status']);
                }
                ?>
                
                <div class="invisible" id="difpass" role="alert">As senhas estão diferentes.</div>
                <div class="input-group">
                    <span class="input-group-text" style="width: 70px;" id="basic-addon1">Nome</span>
                    <input type="text" class="form-control" name="usunom" id="usunom" placeholder="Nome de Usuário" aria-label="Username" aria-describedby="basic-addon1">
                </div><br>
                <div class="input-group mb-2">
                    <span class="input-group-text" style="width: 70px;" id="basic-addon1">Senha</span>
                    <input type="password" class="form-control" name="ususen" id="ususen" placeholder="********" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div>
                    <h6>Confirme a sua senha:</h6>
                </div>
                <div class="input-group">
                    <span class="input-group-text" style="width: 70px;" id="basic-addon1">Senha</span>
                    <input type="password" class="form-control" onkeyup="javascript:passVer()" name="ususenconf" id="ususenconf" placeholder="********" aria-label="Username" aria-describedby="basic-addon1">
                </div><br>
                <div class="input-group">
                    <span class="input-group-text" style="width: 70px;" id="basic-addon1">Email</span>
                    <input type="email" class="form-control" name="usuemail" id="usuemail" placeholder="exemplo@exemplo.com.br" aria-label="Username" aria-describedby="basic-addon1">
                </div><br>
                <div class="input-group">
                    <span class="input-group-text" style="width: 70px;" id="basic-addon1">Celular</span>
                    <input type="text" class="form-control" name="usucel" id="usucel" placeholder="(14) 99999-9999" maxlength="15" onkeypress="mascara(this, celular)" aria-label="Username" aria-describedby="basic-addon1">
                </div><br>
                <h5><input type="submit" class="btn btn-info" id="usubtn" name="usubtn" value="Cadastrar-se"></h5>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</form>
<script>

var aviso = document.getElementById('difpass');
var pass1 = document.getElementById('ususen');
var pass2 = document.getElementById('ususenconf');
var usubtn = document.getElementById('usubtn');
    function passVer(){
        if(!(pass1.value == pass2.value)){
            aviso.classList.remove("invisible");
            aviso.classList.add("alert","alert-warning");
        }else{
            aviso.classList.remove("alert","alert-warning");
            aviso.classList.add("invisible");
        }
    }

</script>
<?php include 'config/footer.php';
