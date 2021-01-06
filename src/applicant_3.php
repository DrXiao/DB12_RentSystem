<html>

<?php
require(dirname(__DIR__) . "/src/function/queryDB.php");
?>

<head>

    <meta charset="utf-8">
    <title>高大露營烤肉區租借系統</title>

</head>



<body>



    高大露營烤肉區租借系統<br>

<?php

    session_start();
    echo "User:";
    $Usr_Name1 = $_SESSION['Usr_Name'];
    echo $Usr_Name1.'<br>';

    $App_Year=$_POST[App_Year];
    $App_Month=$_POST[App_Month];
    $App_Day=$_POST[App_Day];
    
    
    $t=$App_Year.$App_Month.$App_Day;
    echo "租借時間:";
    echo date("Y-m-d H:i:s",strtotime($t)).'<br><br>';
    
    /*Place_Idle not finish*/
    $Place_Idle=  <<<EOF
    select * from(
        select RentPlace.No,StartTime,EndTime from RentPlace
        left join RentRecord
        on RentPlace.No=RentRecord.Place_Contain
        ) as result
    where StartTime is NULL;
    EOF;

$table = GetQueryTable($Place_Idle);
// 讀一列資料  (跟你們網頁 MySQL 教的一樣，只是改叫 pg_fetch_row)
while($row = pg_fetch_row($table)) {
    $fieldNumber = count($row);
    for($i = 0; $i < $fieldNumber ; $i += 1) {
        echo $row[$i];
    }
    echo "</br>";
}
echo "<hr>";
?>
<form method="post" action="applicant_4.php">
<?php
/*
$Place_table = GetQueryTable($Place_Idle);
while($row = pg_fetch_row($Place_table)) {
    $fieldNumber = count($row);
    if($row[0]<7){
        echo "BBQ:";
        echo $row[0];
        ?>
        <input type="checkbox" name="BBQ_Place[]" value=<?php $row[0]; ?>>
        <?php
        echo "|";
    }
    else{
        echo "Camp:";
        echo $row[0];
        ?>
        <input type="checkbox" name="Camp_Place[]" value=<?php $row[0]; ?>>
        <?php
        echo "|";
    }
}
*/
?>
<?php
/*version 2*/
$Place_Use[13]={0};
while($row = pg_fetch_row($Place_table)) {
    //$fieldNumber = count($row);
    $Place_Use[$row[0]]=1;
}
for($i=1;$i<=12;$i++){
    if(!$Place_Use[$i]){
        if($i<7){//i=1~6
            ?>
            <input type="checkbox" name="BBQ_Place[]" value=<?php $i; ?>>
            <?php
            echo $i."號烤爐";
        }
        else{//i=7~12
            ?>
            <input type="checkbox" name="Camp_Place[]" value=<?php $i; ?>>
            <?php
            echo $i,"號營位";
        }
    }
}
?>  
<br>
<input type="submit">下一步
<hr>

 

</body>

</html>