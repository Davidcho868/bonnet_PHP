<?php
require_once "includes/header.php";?>

<h1>Vente de bonnet</h1>
    <table class="table">
    <tr>
            <th>Article</th>
            <th>Prix TTC</th>
            <th>Prix HT</th>
            <th>Description</th>
        </tr>
    <?php 
    foreach ($tabBonnet as $v) {
        displayBonnet($v);
        }
    ?>
    </table>
    <?php
require_once "includes/footer.php";


?>





