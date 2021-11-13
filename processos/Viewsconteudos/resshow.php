<div class="table-responsive">
    <table class="table table-bordered table-dark">
        <thead>
            <tr>
                <th scope="col">Opinião</th>
                <th scope="col">Nota</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while (($resultres) && ($y < $x)) {
                $ln_res = mysqli_fetch_assoc($resultres);
            ?>
                <tr>
                    <form method="POST" action="./processos/resolvedorgen.php">
                        <td><?php echo $ln_res['rentit'] ?></th>
                        <td><?php echo $ln_res['rennota'] ?></td>
                    </form>
                </tr>
            <?php
                mysqli_next_result($connect);
                $y++;
            }
            ?>
        </tbody>
    </table>
    </table>
</div>