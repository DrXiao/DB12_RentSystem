<html>

<?php
require(dirname(__DIR__) . "function/queryDB.php");
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

    $PNum=$_POST['PNum'];

    $App_Year=$_POST['App_Year'];
    $App_Month=$_POST['App_Month'];
    $App_Day=$_POST['App_Day'];
    if($_POST['BBQ_Time']){
        $Place_ver=1;
        $App_Hour=$_POST['App_Hour'];
        $App_Minute=$_POST['App_Minute'];

        $New_StartTime=$App_Year."-".$App_Month."-".$App_Day." ".$App_Hour.":".$App_Minute.":00";
        if($App_Hour+4>23){
            $App_Hour-=20;
            $App_Day+=1;
        }
        else{
            $App_Hour+=4;
        }
        $New_EndTime=$App_Year."-".$App_Month."-".$App_Day." ".$App_Hour.":".$App_Minute.":00";
    }
    else{
        $Place_ver=2;
        $New_StartTime=$App_Year."-".$App_Month."-".$App_Day." 12:30:00";
        $App_Day+=1;
        $New_EndTime=$App_Year."-".$App_Month."-".$App_Day." 11:30:00";
    }
    
    
    
    
    
    
    $Place_Idle=  <<<EOF
        select RentPlace.No from
        RentPlace left join
        (
        select RentPlace.No,RentRecord.StartTime,RentRecord.EndTime from RentPlace
        natural join RentRecord
        where RentRecord.StartTime between '$New_StartTime' and '$New_EndTime'
        or RentRecord.EndTime between '$New_StartTime' and '$New_EndTime') as Rest
        on RentPlace.No=Rest.No 
        where Rest.No is null;

    EOF;

//show Place_idle
$Place_Use[13];
$table = GetQueryTable($Place_Idle);
while($row = pg_fetch_row($table)) {
    $fieldNumber = count($row);
    for($i = 0; $i < $fieldNumber ; $i += 1) {
        //echo $row[$i];
        $Place_Use[$row[$i]]=1;
    }
    //echo "</br>";
}
echo "<hr>";
?>
<form method="post" action="applicant_4.php">
<?php


if($Place_ver==1){
    for($i=0;$i<7;$i++){
        if($Place_Use[$i]==1){

            echo "<input type=\"checkbox\" name=\"BBQ_Place[]\" value=$i>";
            echo $i."號烤爐";
        }
    }
}
else{
    for($i＝7;$i<13;$i++){
        if($Place_Use[$i]==1){
            
            echo "<input type=\"checkbox\" name=\"Camp_Place[]\" value=$i>";
            $i-=6;
            echo $i,"號營位";
        }
    }
}

?>  
<br>
<input type="submit" value="送出">
<?php

    $_SESSION['PNum']=$PNum;
    $_SESSION['New_StartTime']=$New_StartTime;
    $_SESSION['New_EndTime']=$New_EndTime;

?>

 

</body>

</html>