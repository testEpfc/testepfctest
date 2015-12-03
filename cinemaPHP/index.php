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
$reponseTitre = $porteMysql->query("SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='cinemadb' AND `TABLE_NAME`='$tableName' ");

$all = $reponse->fetchAll();
$allTitre = $reponseTitre->fetchAll();

?>
<html>
    <head>
        <meta http-equiv="refresh" content="2">
        <meta charset="UTF-8">
        <title>cinemaPHP</title>
        <style>
            .responsiveTable * {
                padding : 5px;
            }
            .responsiveTable th, .responsiveTable td {
                border: 0px solid black;
            }
            .responsiveTable td {
                display:block;
            }
            .responsiveTable td::before {
                content : attr(data-tab) " : ";
            }
            .responsiveTable th {
                display:none;
            }
            .responsiveTable {
                border-collapse: collapse;
                width: 95%;
                margin: auto;
                text-align: center;
                color: #ddeedd;
                background-color: #225522;
            }
            .responsiveTable tr {
                border: 1px solid black;
            }
            .responsiveTable td:first-child {
                color:yellow;
            } 
            @media screen and (min-width: 480px) {
                .responsiveTable th, .responsiveTable td {
                    border: 1px solid black;
                }
                .responsiveTable td {
                    display:table-cell;
                }
                .responsiveTable td::before {
                    content : none;
                }
                .responsiveTable th {
                    display: table-cell;
                    color:yellow;
                }
                .responsiveTable tr {
                    border: solid black 1px;
                } 
                .responsiveTable td:first-child {
                    color:yellow;
                } 
                .responsiveTable {
                    width: 80%;
                    margin: auto;
                    text-align: center;
                }
            }
        </style>
    </head>
    <body>
        
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
