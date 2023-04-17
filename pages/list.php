

<h1>Vente de bonnet</h1>
    <table class="table">
    <tr>
            <th>Article</th>
            <th>Prix TTC</th>
            <th>Prix HT</th>
            <th>Description</th>
            <th>Panier</th>
        </tr>
    <?php 

    foreach ($tabBonnet as $id => $v) {
        displayBonnet($v, $id);
        }
    ?>
    </table>






