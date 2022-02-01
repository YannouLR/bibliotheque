<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une note</title>
</head>
<body>
    <form method="POST" action=<?= "/note/$id"?>>
        <input type="number" name="note" min="0" max="5" value="<?= $noteId->getNote() ?>">
        <textarea name="comment"  cols="30" rows="10"><?= $noteId->getComment() ?></textarea>
        <input type="number" name="editeur_id" value="<?= $noteId->getEditeur()->getId() ?>">
        <input type="number" name="livre_id" value="<?= $noteId->getLivre()->getId() ?>">
        <input type="submit" value="Modifier une note">
    </form>
</body>
</html>