<html>

<?php
require(dirname(__DIR__) . "/src/function/queryDB.php");
// 登入檢查

?>

<head>

    <meta charset="utf-8">
    <title>高大露營烤肉區租借系統</title>

</head>



<body>



    高大露營烤肉區租借系統<br>

<?php
    $Dates=$_GET['Dates'];
    $Place_Idle=  <<<EOF
    select No 
    from (select * 
        from RentPlace 
        left join RentRecord 
        on RentPlace.No=RentRecord.Place_Contain 
        where $Dates between RentRecord.StartTime and RentRecord.EndTime)
    as Result
    where No is null;
    EOF;

    $Place_table = GetQueryTable($Place_Idle);

    while($row = pg_fetch_row($Place_table)) {
        $fieldNumber = count($row);
        for($i = 0; $i < $fieldNumber ; $i += 1) {
            if($i<7){
                echo "BBQ:";
                echo $row[$i];
            }
            else{
                echo "Camp:";
                echo $row[$i]-6;
            }
            echo "<br>";
        }
        echo "</br>";
    }
?>  



    
 

</body>

</html>