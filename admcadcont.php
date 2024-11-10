<?php
session_start();
include_once './procadm/admcheck.php';
include './config/header.php';
include 'config/menu.php';
include './config/conexao.php';

$op = 0;
if ((isset($_SESSION['acao'])) && ($_SESSION['acao'] == 'editar')) {
    $op = 1;
    $concod = $_SESSION['concod'];
    $queryselect = "select * from conteudos where concod = '$concod'";
    $resultselect = mysqli_query($connect, $queryselect);
    $numrow = mysqli_num_rows($resultselect);
    $ln = mysqli_fetch_assoc($resultselect);
    $_SESSION['acao'] = 'alt';
}
if(isset($_SESSION['status'])){
    if($_SESSION['status'] == 'camposvazios'){
        echo '<br> <div class="container-fluid"><div class="alert alert-warning" role="alert">Campo vazio detectado na sua operação.</div></div>';
    }else if($_SESSION['status'] == 'falho'){
        echo '<br> <div class="container-fluid"><div class="alert alert-danger" role="alert">Ocorreu um erro na sua operação, por favor tente novamente.</div></div>';
    }
    unset($_SESSION['status']);
}

?>
<!-- ./procadm/admcadcontproc.php -->
<form class="mt-3 pt-3" method="POST" action="./procadm/admcadcontproc.php" enctype="multipart/form-data">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <img class="imglogin img-fluid mx-auto d-block" src="./img/loginlogoadm2.png">
                <label class="center">
                    <br>
                    <h2>Cadastrar Conteúdo</h2>
                </label>
                <div class="row">
                    <label>Titulo: </label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Titulo do Filme escrito por extenso" name="contit" value="<?php if (isset($ln)) {
                                                                                                                                            echo $ln['contit'];
                                                                                                                                        } ?>">
                    </div>
                </div>
                <div class="row">
                    <label>Banner do Filme</label>
                    <div class="input-group mb-3">
                        <input type="file" accept=".png,.jpg,.jpeg" name="conimg" class="form-control fileinput">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Duração:</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="'1:25:30' ou 'seriado'" name="condur" value="<?php if (isset($ln)) {
                                                                                                                                    echo $ln['condur'];
                                                                                                                                } ?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <label>N Eps:</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" onkeyup="formatarNum(this)" maxlength="3" placeholder="27" name="coneps" value="<?php if (isset($ln)) {
                                                                                                                    echo $ln['coneps'];
                                                                                                                } ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="row">
                            <label>Nota IMDB</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" onkeyup="notaIMDB(this)" maxlength="3" placeholder="IMDB" name="connotimdb" value="<?php if (isset($ln)) {
                                                                                                                        echo $ln['connotimdb'];
                                                                                                                    } ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <label>Autor:</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Autor" name="conaut" value="<?php if (isset($ln)) {
                                                                                                                        echo $ln['conaut'];
                                                                                                                    } ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label>Sinópse</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Sinópse" name="consip" value="<?php if (isset($ln)) {
                                                                                                                echo $ln['consip'];
                                                                                                            } ?>">
                    </div>
                </div>


                <div class="row">
                    <label>Gêneros:</label>
                    <div class="container">
                        <?php include 'processos/generolist.php';
                             ?>
                    </div>
                </div>
                <div class="row">
                    <div class="input-group mb-4 center">
                        <button type="submit" class="btn btn-danger">Cadastrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
include './config/footer.php';
$ln = 0;
$op = 0;
?>

<script>

function formatarNum(obj){
    if (obj.value.toLowerCase() != obj.value.toUpperCase()){
        obj.value='';
    }  
};

function notaIMDB(obj){
    formatarNum(obj);

    if(obj.value > 10){
        obj.value = '';
    }else if(obj.value == 1){

    }else if(obj.value < 10){
        if(obj.value.length == 1){
            if(event.keyCode !=8){
                obj.value = obj.value+'.';
            }
        }
    }
}

</script>