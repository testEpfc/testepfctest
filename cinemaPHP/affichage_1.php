<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$DBName = "cinemaDB";
$tableName = "film";
$porteMysql = new PDO('mysql:host=localhost;dbname='.$DBName.';charset=utf8', 'root', '');	
$reponse = $porteMysql->query("SELECT * FROM `$tableName`");
$all = $reponse->fetchAll();

$titre = $_REQUEST['titre'];
$date = $_REQUEST['date'];
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>test</title>
    </head>
    <body>
        <?php
        // put your code here
        echo "dqfsdf";
        $porteMysql->query("INSERT INTO `cinemadb`.`film` (`id`, `titre`, `annee`) VALUES (NULL, $titre, $date)")
        ?>
    </body>
</html>
