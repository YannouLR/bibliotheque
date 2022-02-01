<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Livre</title>
</head>
<body>
    <form method="POST" action="/livre">
        <input type="text" name="title" placeholder="Titre">
        <textarea name="resume" id="resume" placeholder="Resume" cols="30" rows="10"></textarea>
        <input type="text" name="num_ISBN" placeholder="numero_ISBN">
        <input type="number" name="exemplaire_dispo" placeholder="exemplaire disponible">
        <input type="number" name="exemplaire_emprunte" placeholder="exemplaire emprunter">
        <input type="text" name="editor" placeholder="editeur">
        <input type="text" name="author" placeholder="auteur">
        <input type="submit" value="Ajouter un Livre">
    </form>
</body>
</html>