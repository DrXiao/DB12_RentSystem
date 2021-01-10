<html>

<?php
require(dirname(__DIR__) . "/function/queryDB.php");
?>

<head>

    <meta charset="utf-8">
    <title>高大露營烤肉區租借系統</title>

</head>



<body>

    高大露營烤肉區租借系統<br>
<?php

//InsertFlag=0
$InsertFlag=true;

session_start();
echo "User:";
$Usr_Name = $_SESSION['Usr_Name'];
echo $Usr_Name.'<br>';

$Usr_find = <<<EOF
        Select * From SystemUser;
EOF;
$Usr_query = GetQueryTable($Usr_find);


while($row = pg_fetch_row($Usr_query)) {
    $fieldNumber = count($row);
    if($row[3]==$Usr_Name){
        $Usr_Ac=$row[0];
        $Usr_ident=$row[2];
    }
}

if($Usr_ident=='00')
    $Pay=600;
else
    $Pay=300;


if($_POST['BBQ_Place']){
    $Place_ver=1;
    $tag = $_POST['BBQ_Place'];
    echo "烤爐 :".count($tag)." 個<br>";
}
else{
    $Place_ver=2;
    $tag = $_POST['Camp_Place'];
    echo "營位 :".count($tag)." 個<br>";
}


    $price=count($tag)*$Pay;

    echo "共 ".$price." 元<br>";

    $today = date('Y/m/d H:i:s',mktime(date('H')+8,date('i'),date('s'),date('m'),date('d'),date('Y')));
    echo "申請時間：".$today.'<hr>';

    $New_StartTime = $_SESSION['New_StartTime'];
    echo '開始時間 : '.$New_StartTime.'<hr>';
    $New_EndTime = $_SESSION['New_EndTime'];
    echo '結束時間 : '.$New_EndTime.'<hr>';
    $PNum = $_SESSION['PNum'];
    //echo $PNum.'<hr>';

    
    
    //find RentRecord No.-----------
    $Num=0;
    $NoSearch=  <<<EOF
        select RentRecord.No from RentRecord;
    EOF;
    $table = GetQueryTable($NoSearch);
    while($row = pg_fetch_row($table)) {
        if($Num<$row[0]){
            $Num=$row[0];
        }
    }
    $Num+=1;
    //echo $Num;
    //------------------------------
    
    if($InsertFlag==true){
        $db = pg_connect(getenv("DATABASE_URL"));

        foreach($tag as $value){
            
            $New_Record=  <<<EOF
                insert into RentRecord(No,User_Has,ApplyTime,StartTime,EndTime,Place_Contain,TotalPeople)
                values ($Num,'$Usr_Ac','$today','$New_StartTime','$New_EndTime',$value,$PNum);
            EOF;
            $returnTable = pg_query($db, $New_Record);  

            $Num+=1;
        }

        pg_close($db);
    }

    

?>

<form method="post" action="applicant_5.php">
    是否付款？<br>
    <input type="radio" name="PayFlag" value=1>付款
    <input type="radio" name="PayFlag" value=0>未付款
    <input type="submit" value="確定">
</form>
</body>

</html>