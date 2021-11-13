<!doctype html>
<html lang="ptbr">

<?php
session_start();

include 'config/header.php';
include 'config/menu.php';
?>
    <form class="mt-3 pt-3" method="POST" action="processos/logacc.php">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">

                    <?php
                    if ((isset($_SESSION['criado'])) && ($_SESSION['criado'] == '1')) {
                    ?>
                        <br>
                        <div class="alert alert-success" role="alert">Cadastrado com sucesso!</div>
                    <?php
                        $_SESSION['criado'] = '0';
                    }
                    ?>
                    <?php
                    if (
                        isset($_SESSION['naoautenticado']) and
                        $_SESSION['naoautenticado'] == '1'
                    ) {
                    ?>
                        <br>
                        <div class="alert alert-danger" role="alert">Email ou senhas invalidas</div>
                    <?php
                        $_SESSION['naoautenticado'] = '0';
                    }
                    ?>
                    <?php
                    if (
                        isset($_SESSION['naoautenticado']) and
                        $_SESSION['naoautenticado'] == 'camposvazios'
                    ) {
                    ?>
                        <br>
                        <div class="alert alert-warning" role="alert">Um ou mais campos vazios</div>
                    <?php
                        $_SESSION['naoautenticado'] = '0';
                    }
                    ?>

                    <img src="img/loginlogo.png" class="imglogin img-fluid mx-auto d-block" />
                    <br><br><br>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><img src="img/usernameicon.png" width="24" height="24"></span>
                        <input type="text" class="form-control" name="usuemail" id="usuemail" placeholder="Email Cadastrado" aria-label="Username" aria-describedby="basic-addon1">
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><img src="img/passwordicon2.png" width="24" height="24"></span>
                        <input type="password" class="form-control" name="ususen" id="ususen" placeholder="********" aria-label="Username" aria-describedby="basic-addon1">
                    </div><br>
                    <h5><input type="submit" class="btn btn-info" name="usubtn" value="Logar"></h5>
                    Não tem uma conta? <a href="accform.php">clique aqui!</a>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </form>
<?php
include './config/footer.php';
?>