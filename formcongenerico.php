<?php
session_start();
include 'config/header.php';
include 'config/conexao.php';

$select_conteudo = 'select * from conteudos';
$select_conteudo = mysqli_query($connect, $select_conteudo);
$x = mysqli_num_rows($select_conteudo);
$y = 0;

?>
<br><br><br><br>
<script type="text/javascript" src="./JS/generic.js"></script>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <h2><label>Selecionar Conteúdo</label></h2>
        <div class="divtable">
            <div class="table-responsive">
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col" width="50px">Código</th>
                            <th scope="col">Nome Gênero</th>
                            <th scope="col" width='130px'>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while (($select_conteudo) && ($y < $x)) {
                            $ln = mysqli_fetch_assoc($select_conteudo);
                            $contit = str_replace(' ', '_', $ln['contit']); ?>
                            <tr>
                                <form method="POST" action="admcaddir.php">
                                    <th scope="row"><?php echo $ln['concod'] ?></th>
                                    <td><?php echo $ln['contit'] ?></td>
                                    <input type="hidden" value="<?php echo $ln['contit'] ?>" name="contit">
                                    <td><a href="javascript:popupCloseConCons(<?php echo $ln['concod'].",'".$contit."'" ?>)" class="btn btn-success">Selecionar</a></td>
                                </form>
                            </tr>
                        <?php
                            $y++;
                        } ?>
                    </tbody>
                </table>
                </table>
            </div>
        </div>
    </div>
</div>
</form>
<?php
