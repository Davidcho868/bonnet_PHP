<?php


function displayBonnet($k, $v): void
{
$d = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis a leo diam. Quisque lorem orci, accumsan quis dolor sed, gravida.";?>
    <tr>
            <td><?php echo $k; ?></td>
            <td <?php
            if ($v <= 12){
                echo 'class="green"';
            } else {
                echo 'class="blue"';
            }
            ?>><?php echo $v. "€"; ?></td>
            <td><?php echo number_format($v/1.2, 2) ; ?></td>
            <td><?php echo $d; ?></td>
        </tr> <?php
}

?>