<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Utilisateur</title>
</head>
<body>
    <form method="POST" action=<?= "/user/$id"?>>
        <input type="text" name="firstname" value="<?= $userId->getFirstname()?>" >
        <input type="text" name="mail" value="<?= $userId->getMail()?>">
        <input type="submit" value="Modifier un utilisateur">
    </form>
</body>
</html>