<?php


function displayBonnet(Beanie $v, int $id): void
{
?>

    <tr>

            <td><?php echo $v->getName(); ?></td>
            <td <?php
            if ($v->getPrice() <= 12){
                echo 'class="green"';
            } else {
                echo 'class="blue"';
            }
            ?>><?php echo $v->getPrice(). "€ TTC"; ?></td>
            <td><?php echo number_format($v->getPrice()/1.2, 2). "€ HT" ; ?></td>
            <td><?php echo $v->getDescription(); ?></td>
            <td><a href="?page=panier&id=<?php echo $id; ?>" class="btn btn-primary">ajouter au panier</a></td>
        </tr> <?php
}

function displayCardsBonnet(Beanie $v, int $id): void
{
?>
<div class="card" style="width: 18rem;">
  <img src="<?php echo $v->getImage(); ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $v->getName(); ?></h5>
    <p class="card-text"><?php echo $v->getPrice(). "€ TTC"; ?></p>
    <p class="card-text"><?php echo number_format($v->getPrice()/1.2, 2). "€ HT" ; ?></p>
    <p class="card-text"><?php echo $v->getDescription(); ?></p>
    <a href="?page=panier&id=<?php echo $id; ?>" class="btn btn-primary">Ajouter au panier</a>
  </div>
</div>
<?php
}

?>