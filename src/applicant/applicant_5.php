<html>

<?php
require(dirname(__DIR__) . "/function/queryDB.php");
?>

<head>
    <meta charset="utf-8">
    <title>高大露營烤肉區租借系統</title>
</head>
<body>
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
        $Usr_pa=$row[5];
    }
}

    //PayFlag
    $Pay=$_POST['PayFlag'];
    if($Pay==1){
        echo "<br>已付款<br>";
    }
    else{
        echo "<br>尚未付款<br>";
    }



    echo "<form method=\"post\" action=\"user_applicant.php\">";
        echo "<input type=\"hidden\" name=\"account\" value=$Usr_Ac>";
        echo "<input type=\"hidden\" name=\"password\" value=$Usr_pa>";
        echo "<input type=\"submit\" value=\"回用戶頁\">";
    echo "</form>";
?>


</body>
</html>