<?php

$panier = new Panier();

$isPanierModified = $panier->handle($_GET);
if ($isPanierModified){
    header('Location: ?page=panier');
}

?>
<table class='table'>
    <tr>
            <th>Id</th>
            <th>Article</th>
            <th>Prix TTC</th>
            <th>Quantité</th>
            <th>Total</th>

    </tr>



<?php
$total = 0.0;
$beanieFactory = new BeanieFactory();
$statement = $db->prepare('SELECT * FROM beanies WHERE id_beanie = :id_beanie');
foreach ($panier->getContent() as $id => $quantite) {
    $statement->bindValue(':id_beanie', $id);
    $statement->execute();
    $beanieData = $statement->fetch();
    if (empty($beanieData)) {
        continue;
    }
    $tabBonnets = $beanieFactory->create($beanieData);
    $price = $tabBonnets->getPrice() * $quantite;
    $total += $price;
    ?>
        <tr>
            <td><?= $id; ?></td>
            <td><?= $tabBonnets->getName(); ?></td>
            <td><?= number_format($tabBonnets->getPrice(), 2, ',', ' '); ?>€</td>
            <td>
            <a href="?page=panier&id=<?= $id; ?>">+</a>
            <?= $quantite; ?>
            <a href="?page=panier&id=<?= $id; ?>&mode=min">-</a>
            </td>
            <td><?= number_format($price, 2, ',', ' '); ?>€
            <a href="?page=panier&id=<?= $id; ?>&mode=delete">Supprimer</a>
        </td>
        </tr>

    <?php
}
?>
<tr>
    <td colspan="5" align="right" >Montant total : <?= number_format($total, 2, ',', ' '); ?>€</td>
</tr>
</table>

<a class="btn btn-danger" href="?page=panier&mode=empty">Vider le panier</a>


