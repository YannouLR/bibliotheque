<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une note</title>
</head>
<body>
    <form method="POST" action="/note">
        <input type="number" name="note" min="0" max="5" placeholder="note/5">
        <input type="text" name="comment" placeholder="commentaire">
        <input type="number" name="editeur_id" placeholder="editeur_id">
        <input type="number" name="livre_id" placeholder="livre_id">
        <input type="submit" value="Ajouter une note">
    </form>
</body>
</html>