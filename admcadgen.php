<?php
include './config/header.php';
include './config/menu.php';
include_once './procadm/admcheck.php';
?>

<div class="container-fluid">
        <div class="row mt-3 pt-3">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Lista de Gêneros no sistema:</h2><br>
                <?php include './processos/consultagenero.php'; ?>
                <?php
                if(isset($_SESSION['genero'])){
                    if($_SESSION['genero'] == 'já-existe'){
                        $gencod = $_SESSION['gencod'];
                        echo "<div class='alert alert-danger' role='alert'>Genero já existente, se encontra com o código: $gencod </div>";
                        unset($_SESSION['genero']);
                    }else if ($_SESSION['genero'] == 'sucesso'){
                        echo ' <div class="alert alert-success" role="alert">Genero cadastrado com sucesso!</div>';
                        unset($_SESSION['genero']);
                    }else if ($_SESSION['genero'] == 'editado'){
                        echo ' <div class="alert alert-warning" role="alert">Genero Atualizado com sucesso!</div>';
                        unset($_SESSION['genero']);;
                    }else if ($_SESSION['genero'] == 'campo-vazio'){
                        echo ' <div class="alert alert-danger" role="alert">Por favor, digite um nome para o campo!</div>';
                        unset($_SESSION['genero']);;
                    }
                }
                ?>
                <h4>Cadastrar Gênero</h4><br>
                <form method="POST" action="../netflop/procadm/admcadgenproc.php">
                <input type="text" class="form-control" name="gennom" placeholder="Nome do Gênero" aria-label="Recipient's username" aria-describedby="button-addon2" 
                <?php if((isset($_SESSION['gennom']))){
                echo "value=";echo $_SESSION['gennom']; unset($_SESSION['gennom']);} ?>>
                <br>
                <input type="submit" class="btn btn-primary" name="btncadgen">
                </form>
            </div>
        </div>
    
</div>

<?php
include './config/footer.php';
?>