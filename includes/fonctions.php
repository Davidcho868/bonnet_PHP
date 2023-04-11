<?php


function displayBonnet(array $v, int $id): void
{
?>

    <tr>

            <td><?php echo $v[0]; ?></td>
            <td <?php
            if ($v[1] <= 12){
                echo 'class="green"';
            } else {
                echo 'class="blue"';
            }
            ?>><?php echo $v[1]. "€ TTC"; ?></td>
            <td><?php echo number_format($v[1]/1.2, 2). "€ HT" ; ?></td>
            <td><?php echo $v[2]; ?></td>
            <td><a href="?page=panier&id=<?php echo $id; ?>" class="btn btn-primary">ajouter au panier</a></td>
        </tr> <?php
}

function displayCardsBonnet(array $v): void
{
?>
<div class="card" style="width: 18rem;">
  <img src="<?php echo $v[3]; ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $v[0]; ?></h5>
    <p class="card-text"><?php echo $v[1]. "€ TTC"; ?></p>
    <p class="card-text"><?php echo number_format($v[1]/1.2, 2). "€ HT" ; ?></p>
    <p class="card-text"><?php echo $v[2]; ?></p>
    <a href="" class="btn btn-primary">Ajouter au panier</a>
  </div>
</div>
<?php
}

?>