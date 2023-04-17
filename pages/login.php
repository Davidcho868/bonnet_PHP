<?php
$pageTitle = "connexion";

require_once "includes/header.php";


?>

<?php
foreach ($errors as $error) {
?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
    </div>
<?php
}
?>

<form action="" method="post">
    <div class="mb-3">
    <label for="username" class="form-label">Identifiant</label>
    <input type="text" class="form-control" id="username" name="username">
    </div>
    <div class="mb-3">
    <label for="password" class="form-label">Mot De Passe</label>
    <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

    
<?php

?>



<?php
require_once "includes/footer.php";
?>
