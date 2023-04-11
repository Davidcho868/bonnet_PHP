<?php
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $panier = $_SESSION['panier'];

    $mode = 'plus';
    if (isset($_GET['mode'])) {
        $mode = $_GET['mode'];
    }

    if (!isset($panier[$id])) {
        $panier[$id] = 0;
    }
    switch ($mode){
        case 'plus':
            $panier[$id]++;
            break;
        case 'min':
            $panier[$id]--;
            break;
        case 'delete':
            $panier[$id] = 0;
            break;
    }

    if (($panier[$id]) <= 0) {
        unset($panier[$id]);
    }
    

    $_SESSION['panier'] = $panier;
    header('Location: ?page=panier');
} elseif (isset($_GET['mode']) && $_GET['mode'] == 'empty') {
    $_SESSION['panier'] = [];
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
foreach ($_SESSION['panier'] as $id => $quantite) {
    $tabBonnets = $tabBonnet[$id];
    $price = $tabBonnets[1] * $quantite;
    $total += $price;
    ?>
        <tr>
            <td><?= $id; ?></td>
            <td><?= $tabBonnets[0]; ?></td>
            <td><?= number_format($tabBonnets[1], 2, ',', ' '); ?>€</td>
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


