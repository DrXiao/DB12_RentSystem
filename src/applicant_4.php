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
$Usr_Name = $_SESSION['Usr_Name'];
echo $Usr_Name.'<br>';

$Usr_find = <<<EOF
        Select * From SystemUser;
EOF;
$Usr_query = GetQueryTable($Usr_find);


while($row = pg_fetch_row($Usr_query)) {
    //$fieldNumber = count($row);
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


    

    $New_StartTime = $_SESSION['New_StartTime'];
    echo $New_StartTime.'<hr>';
    $New_EndTime = $_SESSION['New_EndTime'];
    echo $New_EndTime.'<hr>';
    $PNum = $_SESSION['PNum'];
    echo $PNum.'<hr>';
    


    if (isset($_POST['action'])){
        for($i=0;$i<count($tag);$i++){
            echo "Account:".$Usr_Ac."| StartTime:".$New_StartTime."| EndTime:".$New_EndTime."| Place:".$tag[$i]."| total:".$PNum."<br>";
            /*
            $New_Record=  <<<EOF
                insert into RentRecord(User_Has,ApplyTime,StartTime,EndTime,Place_Contain,TotalPeople)
                values ($Usr_Ac,,$New_StartTime,$New_EndTime,$tag[$i],$PNum);
            EOF;
            */ 
        }
    }

/*
from line 64

<form method="post" action="applicant_5.php">
<input type="button" name="action" value="確認送出">
</form>

*/

?>



</body>

</html>