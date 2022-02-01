
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        foreach ($aLivre as $value) {
    ?>
         <table border="3">
             <tr>
                 <th><?= $value->getTitle()?></th>
            </tr>
            <tr>
                <td><?= $value->getResume()?></td>
            </tr>
            <tr>
                <td><?= $value->getAuthor()->getFirstname()?></td>
            </tr>
            <tr>
                <td><?= $value->getStock()?></td>
            </tr>
         </table>
    <?php
        }
    ?>
</body>
</html>