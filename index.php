<?php
include_once "includes/header.php";?>


<section class='d-flex gap-5 align-items-center justify-content-center m-5'>
<?php 
    foreach ($tabBonnet as $k => $v) {
        
        if ($k<=2){
            displayCardsBonnet($v);
        }

        }
    ?>
    </section>
    <a href="list.php" class="btn btn-warning">Liste Complete</a>
<?php

include_once "includes/footer.php";
?>
