<script type="text/javascript" src="../../JS/generic.js"></script>
<link rel="stylesheet" href="../../css/style.css">
<?php
include '../../config/conexao.php';
include '../../config/header.php';

$concod = $_GET['concod'];
$query = "select * from conteudos where concod = $concod";
$result = mysqli_query($connect, $query);
$ln = mysqli_fetch_assoc($result);

?>
<div class="container-fluid" style="background-color: rgb(44, 50, 64);">
    <div class="row">
<img src="../../<?php echo $ln['conimg'] ?>">
    </div>
</div>
<?php

echo "<div class='divtable' style='background-color: rgb(34, 40, 54);'>";
echo "<div class='container-fluid'>";
echo '<div class="row">';
echo '<center>';
include 'asscon.php';
echo '</center>';
echo '</div>';
echo '</div>';
echo '</div>';

$queryres = "select * from resenhas where codcon = '$concod'";
$resultres = mysqli_query($connect, $queryres);
$x = mysqli_num_rows($resultres);
$y = 0;

?>

<div class='restable' style='background-color: rgb(24, 30, 44);'>
<div class='container-fluid'>
<div class="row">
    <?php include 'resshow.php'; ?>
</div>
</div>
</div>

<?php

include '../../config/footer.php';
