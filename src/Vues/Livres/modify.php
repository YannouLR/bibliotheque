<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Livre</title>
</head>
<body>
    <form method="POST" action=<?= "/livre/$id"?>>
        <input type="text" name="title" value="<?= $livreId->getTitle()?>">
        <textarea name="resume" id="resume" cols="30" rows="10"><?= $livreId->getResume()?></textarea>
        <input type="text" name="num_ISBN" value="<?= $livreId->getNumISBN()?>">
        <input type="number" name="exemplaire_dispo" value="<?= $livreId->getExemplaireDispo()?>">
        <input type="number" name="exemplaire_emprunte" value="<?= $livreId->getExemplaireEmprunte()?>">
        <input type="text" name="editor" value="<?= $livreId->getEditor()?>">
        <input type="text" name="author" value="<?= $livreId->getAuthor()?>">
        <input type="submit" value="Modifier un Livre">
    </form>
</body>
</html>