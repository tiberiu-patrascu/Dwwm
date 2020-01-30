<?php

$dbCon = new PDO('mysql:host=localhost;dbname=crud','root','');

$pdoStmt = $dbCon->prepare('SELECT * FROM fp_quizzes ORDER BY quiz_id ASC;');

$execute = $pdoStmt->execute();

$contacts = $pdoStmt->fetchAll();


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>lister les quizzes</h1>
    <ul>
        <?php foreach($contacts as $contact):?>
            <li>
                <?=$contact['quiz_theme']?>
                -
                <?=$contact['quiz_textcolor']?>
                -
                <?=$contact['quiz_backcolor']?>
            
            </li>
        <?php endforeach;?>
    </ul>
</body>

</html>