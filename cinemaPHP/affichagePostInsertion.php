<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 

include "DBInfo.php";
//$DBName = "cinema";
//$tableName = "film";
try{
$porteMysql = new PDO('mysql:host=localhost;dbname='.$DBName.';charset=utf8', 'root', '');

$titre = $_REQUEST['titre'];
$date = $_REQUEST['date'];
//$titre = filter_var($titre, FILTER_SANITIZE_STRING);
//$date = filter_var($date, FILTER_SANITIZE_STRING);

//$titre = 'titre1';
//$date = 'date1';
$errLOG = " ";
//try{
    //$porteMysql->query("INSERT INTO `cinemadb`.`film` (`id`, `titre`, `annee`) VALUES (NULL, ".$titre.", ".$date.")");
    $porteMysql->query("INSERT INTO `$DBName`.`film` (`id`, `titre`, `annee`) VALUES (NULL, \"$titre\", \"$date\")");
    //$porteMysql->query("INSERT INTO `cinemadb`.`film` (`id`, `titre`, `annee`) VALUES (NULL, \"titre23\", \"23\")");
 
    $errLOG =  "Connection successful ! ";
}
catch(PDOException $e)
{
    $errLOG =  "Connection failed: " . $e->getMessage();
}
catch(Exception $e)
{
    $errLOG =  "Connection failed(2) : " . $e->getMessage();
}
	
$reponse = $porteMysql->query("SELECT * FROM `$tableName`");
$reponseTitre = $porteMysql->query("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='$DBName' AND `TABLE_NAME`='$tableName' ");

$all = $reponse->fetchAll();
$allTitre = $reponseTitre->fetchAll();

?>
<html>
    <head>
        <!--<meta http-equiv="refresh" content="2">-->
        <meta charset="UTF-8">
        <title>cinemaPHP</title>
        <style>
        </style>
        <link href="responsiverTable.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        
        <?php echo $errLOG ?>
    
        
    <li> <?php echo "row = ".$row = sizeof($all,0) ?> </li>
    <li> <?php echo "column = ".$column = sizeof($allTitre,0) ?> </li>
            
    <br>
    <br>
    <br>
    <br>
            
        <table class="responsiveTable">
            <tr>
                <?php for($j=0; $j<$column;++$j){ ?>
                    <th> <?php echo $allTitre[$j][0] ?> </th>
                <?php } ?>
            </tr>
            <?php for($i=0; $i<$row;++$i){ ?>
            <tr>
                <?php for($j=0; $j<$column;++$j){ ?>
                    <td> <?php echo $all[$i][$j] ?> </th>
                <?php } ?>
            </tr>
            <?php } ?>
        </table>
    <br>
    <br>
    <br>
    <a href="form.php">add another title</a>
            
        <script>
            var thList = document.querySelectorAll(".responsiveTable th");
            var tdList = document.querySelectorAll(".responsiveTable td");
            for(var j =0;j<tdList.length;j++)
            {
                for(var k =0;k<thList.length;k++)
                {
                    tdList[(thList.length*j)+k].setAttribute("data-tab",thList[k].innerHTML);
                }
            }
        </script>   
        
    </body>
</html>
