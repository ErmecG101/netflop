<?php
include "./config/conexao.php";

$select = 'select * from consulta_resenhas';
$result = mysqli_query($connect, $select);
$x = 0;
$y = mysqli_num_rows($result);
?>
<br><br><br>
<div class="col-md-12" style="height: 300px;">
    <div class="table-responsive">
        <table class="table table-bordered table-dark">
            <thead>
                <tr>
                    <th scope="col" width='5px'>Código</th>
                    <th scope="col">Filme</th>
                    <th scope="col">Nota</th>
                    <th scope="col">Usuario/Perfil</th>
                    <th scope="col" width='20px'>Ação</th>
                </tr>
            </thead>
            <tbody>


                <?php
                while ($x < $y) {
                    $ln = mysqli_fetch_assoc($result);
                ?>
                    <tr>
                        <form method="POST" action="./procadm/resolvedorres.php">
                            <th scope="row"><?php echo $ln['concod']; ?></th>
                            <td><?php echo $ln['contit']?></td>
                            <td><?php echo $ln['rennota'].'/10'?></td>
                            <td><?php echo $ln['usunom'].'/'.$ln['pernom']?></td>
                            <td><button type="submit" value="<?php echo $ln['rencod'] ?>" class="btn btn-secondary" name="btnresvis">Visualizar</button>
                            </td>
                            <input type="hidden" name="concod" value=" <?php echo $ln['concod']; ?>">
                            <input type="hidden" name="percod" value=" <?php echo $ln['codper']; ?>">
                        </form>
                    </tr>
                <?php
                    $x++;
                    mysqli_next_result($connect);
                } ?>


            </tbody>
        </table>
        </table>
    </div>
</div>