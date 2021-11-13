<?php
include './config/conexao.php';
include './config/header.php';

$select_genero = 'select * from generos';
$result_genero = mysqli_query($connect, $select_genero);
$x = mysqli_num_rows($result_genero);
$y = 0;

if (empty($result_genero) == false) {
?>
    <div class="divtable">
        <div class="table-responsive">
            <table class="table table-bordered table-dark">
                <thead>
                        <tr>
                            <th scope="col" width = "50px">Código</th>
                            <th scope="col">Nome Gênero</th>
                            <th scope="col" width = '165px'>Ação</th>
                        </tr>
                </thead>
                <tbody>
                <?php while (($result_genero) && ($y < $x)) {
                    $ln = mysqli_fetch_assoc($result_genero);?>
                    <tr>
                        <form method="POST" action="./processos/resolvedorgen.php">
                        <th scope="row"><?php echo $ln['gencod'] ?></th>
                        <td><?php echo $ln['gennom'] ?></td>
                        <td><button type="submit" class="btn btn-warning" name="btngenalt">Editar</button>
                        <button type="submit" class="btn btn-danger" name="btngendel">Deletar</button></td>
                        <input type="hidden" name="gencod" value="<?php echo $ln['gencod'] ?>">
                        <input type="hidden" name="gennom" value="<?php echo $ln['gennom'] ?>">
                        </form>
                    </tr>
                    <?php mysqli_next_result($connect);
                        $y++;
                            }?>
                </tbody>
            </table>
            </table>
        </div>
    </div>
    <br>

<?php
                        
                    }
                
