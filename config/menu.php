<?php
//include  "C:/xampp/htdocs/netflop/processos/logacc.php";
session_start();
if (isset($_SESSION['usunom'])) {
    $usunom = $_SESSION['usunom'];
}

if (isset($_GET['pescontit'])) {
    $pescontit = $_GET['pescontit'];
} else {
    $pescontit = '';
}
?>
<script type="text/javascript" src="./JS/generic.js"></script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="img/loginlogo.png" class="imgnavbarlogo img-fluid mx-auto d-block"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-1 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <?php if (isset($_SESSION['usunom'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="perfils.php">Perfils</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="configuracoes.php">Configurações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="processos/logout.php">Deslogar</a>
                    </li>
                <?php elseif (isset($_SESSION['admnom'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="admcadcont.php">Cadastrar Conteúdo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admcaddir.php">Cadastrar Diretório</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admcadgen.php">Gerenciar Gênero</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admrescons.php">Conferir Resenhas</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="loginform.php">Logar-se</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="accform.php">Cadastrar-se</a>
                    </li>
                <?php endif; ?>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item pr-4 pt-1">
                    <form>
                        <div class="input-group">
                            <input style="max-height: 30px;" value="<?php echo $pescontit; ?>" id="pesqTex" type="text" class="form-control">
                            <a style="max-height: 30px;" src='img/dir' href="javascript:pesqStart();"><img width="30px" height="30px" src="img/lupa.png"></a>
                        </div>
                    </form>
                </li>
                <li class="navbar-text">

                    <!--Referencia da imagem-->
                    <a href="<?php if (isset($usunom)) {
                                    echo "javascript:popupOpenPer();";
                                } else {
                                    echo "loginform.php";
                                } ?>"><img src="<?php if (isset($usunom)) {
                                                    echo $_SESSION['perpfp'];
                                                } else {
                                                    echo "img/defaulticon.png";
                                                } ?>" class="lpminiicon" /></a>

                    <!-- Referencia Nome Usuario -->

                    <?php

                    if (isset($_SESSION['usunom'])) { //USUARIO
                    ?>
                <li>
                    <div class="dropdown px-2 mr-5">
                        <button class="btn btn-link dropdown-toggle textstyle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['pernom']; ?>
                        </button>
                        <div class="dropdown-menu mainstyle" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item textstyle" href="index.php">Home</a>
                            <a class="dropdown-item textstyle" href="perfils.php">Perfil</a>
                            <a class="dropdown-item textstyle" href="configuracoes.php">Configurações</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item textstyle" href="processos/logout.php">Deslogar</a>
                        </div>
                    </div>
                </li>
            <?php
                    } else if (isset($_SESSION['admnom'])) { //ADM
            ?>
                <li>
                    <div class="dropdown px-2 mr-5">
                        <button class="btn btn-link dropdown-toggle textstyle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <?php echo $_SESSION['admnom']; ?>
                        </button>
                        <div class="dropdown-menu mainstyle" style="max-width: 75px" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item textstyle" href="admcadcont.php">Cadastro Conteúdo</a>
                            <a class="dropdown-item textstyle" href="admcaddir.php">Cadastro Diretório</a>
                            <a class="dropdown-item textstyle" href="admcadgen.php">Cadastro Gêneros</a>
                            <a class="dropdown-item textstyle" href="admrescons.php">Conferir Resenhas</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item textstyle" href="processos/logout.php">Deslogar</a>
                        </div>
                    </div>
                </li>
            <?php
                    } else { //DESLOGADO
            ?>
                <li>
                    <div class="dropdown px-2 mr-5">
                        <button class="btn btn-link dropdown-toggle textstyle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Usuario
                        </button>
                        <div class="dropdown-menu mainstyle" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item textstyle" href="loginform.php">Logar-se</a>
                            <a class="dropdown-item textstyle" href="accform.php">Cadastrar-se</a>
                            <a class="dropdown-item textstyle" href="#">Sobre</a>
                        </div>
                    </div>
                </li>
            <?php
                    }
            ?>
            </a>
            </li>
            </ul>
        </div>
    </div>
</nav>
<br><br><br><br>