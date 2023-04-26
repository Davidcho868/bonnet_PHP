<?php
$statement = $db->query('SELECT * FROM beanies');

$tabBonnet = $statement->fetchAll();
// exit(var_dump($tabBonnet));
$beanieFactory = new BeanieFactory();

?>


<section class='d-flex gap-5 align-items-center justify-content-center m-5'>
<?php 
    foreach ($tabBonnet as $k => $v) {
        $beanie = $beanieFactory->create($v);
        if ($k<=2){
            displayCardsBonnet($beanie, $beanie->getId());
        }

        }
    ?>
    </section>
    <a href="?page=list" class="btn btn-warning">Liste Complete</a>

