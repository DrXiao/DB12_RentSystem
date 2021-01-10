<html>

<?php
require(dirname(__DIR__) . "/function/queryDB.php");// 登入檢查

?>

<head>
<title>承辦人詳細資料</title>
</head>

<body>

<?php
    $details=$_POST['ID'];
    $sql_query = "SELECT *from SystemUser WHERE No = $details";
    $result = GetQueryTable($sql_query);
    $row= pg_fetch_array($result);
    echo '<p align = "center"><font size="6" face="標楷體" color=blue>承辦人詳細資料</font></p>';
    echo '<hr>';
      
    echo '<TT>';
    echo '<center>';
    
    echo '<table border = "1" width = "25%" style="table-layout:fixed">';
    
    echo '<tr>';
    echo '<th>繳費狀態</th>';
    echo '<th>核准狀態</th>';
    echo '</tr>';