<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Utilisateur</title>
</head>
<body>
    <form method="POST" action="/user">
        <input type="text" name="firstname" placeholder="prenom">
        <input type="text" name="mail" placeholder="email">
        <input type="submit" value="Ajouter un utilisateur">
    </form>
</body>
</html>