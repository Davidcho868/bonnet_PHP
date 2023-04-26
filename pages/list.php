<?php
$statement = $db->query('SELECT * FROM beanies ORDER BY price');
$beaniesData = $statement->fetchAll();

$beanieFactory = new BeanieFactory();
$beanies = [];
foreach ($beaniesData as $beanieData) {
    $beanies[] = $beanieFactory->create($beanieData);
}


$bonnetFilter = new Filtre($beanies, $_POST);

?>

<h1>Vente de bonnet</h1>

<form class="d-flex gap-3 align-item-center" action="" method="post">
    <div class="mb-3">
        <label for="minPrice" class="form-label">Prix minimum</label>
        <input type="number" class="form-control" id="minPrice" name="minPrice" value="<?= $bonnetFilter->getMinPrice(); ?>">
    </div>
    <div class="mb-3">
        <label for="maxPrice" class="form-label">Prix maximum</label>
        <input type="number" class="form-control" id="maxPrice" name="maxPrice" value="<?= $bonnetFilter->getMaxPrice(); ?>">
    </div>
    <div class="d-row mt-4">
        <label for="material" class="form-label">Matière</label>
        <select name="material" id="material">
            <option value="">Choisissez une matière</option>
            <?php
                foreach (Beanie::AVAILABLE_MATERIALS as $value => $name) {
                ?>
                <option value="<?= $value; ?>" <?php if ($value == $bonnetFilter->getMaterial()){
                    echo 'selected';
                } ?>><?= $name; ?></option>
                <?php
                }
            ?>
        </select>
    </div>
    <div class="d-row mt-4">
        <label for="size" class="form-label">Taille</label>
        <select name="size" id="size">
            <option value="">Choisissez une taille</option>
            <?php
                foreach (Beanie::AVAILABLE_SIZE as $name) {
                ?>
                <option value="<?= $name; ?>" <?php if ($name == $bonnetFilter->getSize()){
                    echo 'selected';
                } ?>><?= $name; ?></option>
                <?php
                }
            ?>
        </select>
    </div>
    
    <button class="btn-light mb-3 mt-4" type="submit">filtre</button>
    
</form>


<table class="table">
    <tr>
        <th>Article</th>
        <th>Prix TTC</th>
        <th>Prix HT</th>
        <th>Description</th>
        <th>Panier</th>
    </tr>
    <?php

    foreach ($bonnetFilter->getResult() as $beanie) {
        displayBonnet($beanie, $beanie->getId());
    }
    ?>
</table>