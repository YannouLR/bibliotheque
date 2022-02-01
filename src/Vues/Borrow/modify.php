<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un emprunt</title>
</head>
<body>
    <form method="POST" action=<?="/borrow/$id"?>>
        <input type="number" name="livre" value="<?= $borrowId->getLivre()->getId()?>" />
        <input type="number" name="user" value="<?= $borrowId->getVisitor()->getId() ?>" />
        <input type="submit" value="Modifier un emprunt">
    </form>
</body>
</html>