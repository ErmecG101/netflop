<!doctype html>
<html lang="en">

<?php
session_start();

include 'config/header.php';
include 'config/menu.php';
?>
<script type="text/javascript" src="./JS/mask.js"></script>
    <form class="mt-3 pt-3" method="POST" action="processos/newacc.php">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <?php
                        if((isset($_SESSION['camposvazios']))&&($_SESSION['camposvazios'] == 1)){
                            echo '<br> <div class="alert alert-danger" role="alert">Um ou mais campos vazios ou preenchidos de forma indevida</div>';
                            $_SESSION['camposvazios'] = 0;
                        }
                        if((isset($_SESSION['status']))){
                            if($_SESSION['status'] == 'erro'){
                            echo '<div class="alert alert-warning" role="alert">Esse Email já existe ou ocorreu um erro na sua operação.</div>';
                            }
                            unset($_SESSION['status']);
                        }
                    ?>
                    <img src="img/loginlogo.png" class="imglogin img-fluid mx-auto d-block"/>
                    <br><br><br>
                    <div class="input-group">
                        <span class="input-group-text" style="width: 70px;" id="basic-addon1">Nome</span>
                        <input type="text" class="form-control" name="usunom" id="usunom" placeholder="Nome de Usuário" aria-label="Username" aria-describedby="basic-addon1">
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-text" style="width: 70px;" id="basic-addon1">Senha</span>
                        <input type="password" class="form-control" name="ususen" id="ususen" placeholder="********" aria-label="Username" aria-describedby="basic-addon1">
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-text" style="width: 70px;" id="basic-addon1">Email</span>
                        <input type="email" class="form-control" name="usuemail" id="usuemail" placeholder="exemplo@exemplo.com.br" aria-label="Username" aria-describedby="basic-addon1">
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-text" style="width: 70px;" id="basic-addon1">Celular</span>
                        <input type="text" class="form-control" name="usucel" id="usucel" placeholder="(14) 99999-9999" maxlength="15" onkeypress="mascara(this, celular)" aria-label="Username" aria-describedby="basic-addon1">
                    </div><br>
                    <h5><input type="submit" class="btn btn-info" name="usubtn" value="Cadastrar-se"></h5>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </form>
<?php include 'config/footer.php';