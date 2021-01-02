<html>

<?php
require(dirname(__DIR__) . "/src/function/queryDB.php");
// 登入檢查

// 用 $query 的請求，檢查 $_POST 是否存在，且帳號密碼有存在於 SystemUser 裡面
LoginCheck();

?>


<head>

    <meta charset="utf-8">
    <title>高大露營烤肉區租借系統</title>

</head>



<body>

<?php

$db = pg_connect(getenv("DATABASE_URL")); 
if (!$db) {
    echo "Error<br>";
} else {
    echo "Successful<br>";
}


?>

<form method="POST" action="">
    高大露營烤肉區租借系統<br>
    總人數：<input type=text maxlength="10" size="10" name="PNum"><br>
    借用時間:<input type=date name="Dates"><br>
    <input  type="radio" name="BBQ" value="Choose">烤肉爐
    <input  type="radio" name="Camp" value="Choose">營位

    <input value="送出"type="submit">

</form>

<?php
    $Choose=$_GET["Choose"];
    if($choose=="BBQ"){
        //設BBQ:No.1~6
    }
?>
<?php
    if($choose=="Camp"){
        //設Camp:No.7~12
        $Dates=$_GET["Dates"];
        //--------------------------找不在RentRecord的Place_Contain上的Place
        $Camp_Not_Use = <<<EOF
            select No 
            from RentPlace 
            inner join RentRecord 
            in RentPlace.No=RentRecord.Place_Contain 
            where $Dates between StartTime and EndTime; 
        EOF;
        $result = pgsql_query($Camp_Not_Use);
        //--------------------------
        $Camp_7=0;
        $Camp_8=0;
        $Camp_9=0;
        $Camp_10=0;
        $Camp_11=0;
        $Camp_12=0;
        
        
    }
?>
</body>

</html>