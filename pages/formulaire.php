<?php


$formulaire = new Formulaire($_POST);


if ($formulaire->isSubmitted() && $formulaire->isValid()) {
    $statement = $db->prepare('INSERT INTO contact (subject, email, content) VALUES (:subject, :email, :content)');
    $statement->execute([
        ':subject' => $formulaire->getSubject(),
        ':email'   => $formulaire->getEmail(),
        ':content' => $formulaire->getContent(),
    ]);
?>
    <div class="alert alert-success" role="alert">
        Message envoyé
    </div>
<?php
}

foreach ($formulaire->getErrors() as $error) {
?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error; ?>
    </div>
<?php
}
?>


<form action="" method="post">
<div class="mb-3">
<label for="subject" class="form-label">Sujet</label>
<input type="text" class="form-control" id="subject" name="subject" value="<?= $formulaire->getSubject(); ?>">
</div>
<div class="mb-3">
<label for="email" class="form-label">Adresse E-mail</label>
<input type="email" class="form-control" id="email" name="email" value="<?= $formulaire->getEmail(); ?>">
</div>
<div class="mb-3">
<label for="content" class="form-label">Votre Message</label>
<textarea class="form-control" id="content" name="content"><?= $formulaire->getContent(); ?></textarea>
</div>
<button type="submit" class="btn btn-primary">Envoyer</button>
</form>