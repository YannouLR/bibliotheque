<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un emprunt</title>
</head>
<body>
    <form method="POST" action="/borrow">
        <input type="text" name="user" placeholder="Utilisateur_id">
        <input type="text" name="livre" placeholder="livre_id">
        <input type="submit" value="Ajouter un emprunt">
    </form>
</body>
</html>