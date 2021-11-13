<script type="text/javascript" src="../../JS/buttonclick.js"></script>
<?php


$select_generico = 'select * from conteudos order by RAND()';
$result_generico = mysqli_query($connect, $select_generico);

$x = mysqli_num_rows($result_generico);
$y = 0;

while (($result_generico) && ($y < $x)) {
    

?>
<script type="text/javascript" src="./JS/generic.js"></script>
        <div class="carousel-item <?php if($y == 0) {echo 'active'; } ?>">
            <div class="container">
                <div class="row">
                    <?php 
                    if($_GET){
                        if($_GET['maxnum']<=5){
                            $maxnum = $_GET['maxnum'];
                        }else{
                            $maxnum = 3;
                        }
                    }else{
                        $maxnum = 3;
                    }
                    for ($i = 1; $i <= $maxnum; $i++) : ?>

                        <?php $ln = mysqli_fetch_assoc($result_generico); $y++; 
                            if($ln):
                        ?>
                        <div class="card-dark" style="width: 20rem;">
                            <form method="POST" action="./processos/resolvedorcon.php">
                                <img style="height: 150px;" href="#" src="<?php echo $ln['conimg'] ?>" class="card-img-top" alt="...">
                                <div class="card-body" href="#"  id="card-body-<?php echo $ln['concod']; ?>">
                                    <h5 class="card-title" href="#" ><?php echo $ln['contit']; ?></h5>
                                    <p class="card-text" href="#" ><?php echo $ln['consip']; ?> Nota IMDB: <?php echo $ln['connotimdb']; ?></p>
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
                        <?php mysqli_next_result($connect); ?>
                    <?php endif;
                    endfor ?>
                </div>
            </div>
        </div>

<?php
    }

?>