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

    $today = date('Y/m/d H:i:s');
    echo "申請時間：".$today.'<hr>';

    $New_StartTime = $_SESSION['New_StartTime'];
    //echo $New_StartTime.'<hr>';
    $New_EndTime = $_SESSION['New_EndTime'];
    //echo $New_EndTime.'<hr>';
    $PNum = $_SESSION['PNum'];
    //echo $PNum.'<hr>';

    //PayFlag
    $PayF=$_POST['PayFlag'];
    if($PayF==true){
        echo "already pay<br>";
    }
    else{
        echo "not pay<br>";
    }

    $Num=0;
    $NoSearch=  <<<EOF
        select RentRecord.No from RentRecord;
    EOF;
    $table = GetQueryTable($NoSearch);
    while($row = pg_fetch_row($table)) {
        if($Num<$row[0]){
            $Num=$row[0];
        }
        //echo "</br>";
    }
    $Num+=1;
    echo $Num;
    

    $db = pg_connect(getenv("DATABASE_URL"));

    foreach($tag as $value){
            
        $New_Record=  <<<EOF
            insert into RentRecord(No,User_Has,ApplyTime,StartTime,EndTime,Place_Contain,TotalPeople,PayFlag)
            values ($Num,'$Usr_Ac','$today','$New_StartTime','$New_EndTime',$value,$PNum,$PayF);
        EOF;
        $returnTable = pg_query($db, $New_Record);  

        $Num+=1;
    }

    pg_close($db);
?>



</body>

</html>