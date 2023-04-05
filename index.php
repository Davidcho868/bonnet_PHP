<?php
if ((include'variables.php') == TRUE) {
    
}
if ((include'fonctions.php') == TRUE) {
    
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Bonnet</title>
</head>
<body>
    <h1>Vente de bonnet</h1>
    <table>
    <tr>
            <th>Article</th>
            <th>Prix TTC</th>
            <th>Prix HT</th>
            <th>Description</th>
        </tr>
    <?php 
    foreach ($tabBonnet as $k => $v) {
        displayBonnet($k, $v);
        }
    ?>
    </table>
</body>
</html>