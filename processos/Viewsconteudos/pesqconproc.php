<script type="text/javascript" src="../../JS/buttonclick.js"></script>
<?php

include '../netflop/config/conexao.php';

$select_pesquisa = "select * from conteudos where contit like '%" . $pescontit . "%'";
$result_pesquisa = mysqli_query($connect, $select_pesquisa);

while ($ln = mysqli_fetch_assoc($result_pesquisa)) : ?>
    <div class="card-dark" style="width: 20rem;">
        <form method="POST" action="./processos/resolvedorcon.php">
            <img style="height: 150px;" href="#" src="<?php echo $ln['conimg'] ?>" class="card-img-top" alt="...">
            <div class="card-body" href="#" id="card-body-<?php echo $ln['concod']; ?>">
                <h5 class="card-title" href="#"><?php echo $ln['contit']; ?></h5>
                <p class="card-text" href="#"><?php echo $ln['consip']; ?> Nota IMDB: <?php echo $ln['connotimdb']; ?></p>
                <a src='img/dir' class="" type="button" href="javascript:popupDire(<?php echo $ln['concod']; ?>);"><img class="cardbuttons" src="./img/buttons/assistir.png"></a>
                                    <?php //include './processos/viewsconteudos/asscon.php'; ?>
                                    <?php
                                    if ((isset($_SESSION['admin']) && ($_SESSION['admin'] == true))) { ?>
                                        <a style="background: transparent no-repeat;" name="editar" href="javascript:editarStart(<?php echo $ln['concod']; ?>)" ><img class="cardbuttons" src="./img/buttons/editar.png" ></a>
                                        <a style="background: transparent no-repeat;" name="editar" href="javascript:deletarStart(<?php echo $ln['concod']; ?>)" ><img class="cardbuttons" src="./img/buttons/excluir.png" ></a>
                <?php }
                ?>
            </div>
        </form>
    </div>
<?php mysqli_next_result($connect);
endwhile; ?>
