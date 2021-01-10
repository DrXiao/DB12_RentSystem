<html>

<?php
    require(dirname(__DIR__) . "/function/queryDB.php");
?>

<head>

    <meta charset="utf-8">
    <title>修改資料</title>

</head>



<body>
<?php

    $db = pg_connect(getenv("DATABASE_URL"));

    session_start();
    echo "User:";
    $Usr_Name1 = $_SESSION['Usr_Name'];
    echo $Usr_Name1.'<br>';
    $Usr_find = <<<EOF
            select * from SystemUser where '$Usr_Name1'=SystemUser.su_name;
    EOF;
    $Usr_query = GetQueryTable($Usr_find);


    while($row = pg_fetch_row($Usr_query)) {
        $fieldNumber = count($row);
        for($i=0;$i<$fieldNumber;$i++){
            //echo $row[$i];
            //echo '|';
            //$Uac=$row[0];
            $Usr_Ac=$row[0];
            $Usr_pa=$row[5];

            $Uph=$row[1];
            $Usu=$row[3];
            $Uem=$row[4];
            $Upa=$row[5];
            $Uad=$row[6];
        }
        //echo '<br>';
    }
    echo "電話:".$Uph." | ";
    echo "姓名:".$Usu." | ";
    echo "email:".$Uem." | ";
    echo "密碼:".$Upa." | ";
    echo "地址:".$Uad;

    //pg_close($db);
?>

<form method="post" action="user_2.php">
<?php
echo "<input type=\"hidden\" name=\"Uph\" value=\"$Uph\">";
echo "<input type=\"hidden\" name=\"Usu\" value=\"$Usu\">";
echo "<input type=\"hidden\" name=\"Uem\" value=\"$Uem\">";
echo "<input type=\"hidden\" name=\"Upa\" value=\"$Upa\">";
echo "<input type=\"hidden\" name=\"Uad\" value=\"$Uad\">";
echo "<input type=\"hidden\" name=\"Usr_Ac\" value=\"$Usr_Ac\">";
?>    
    電話：<input type="test" name="phone">
    姓名：<input type="test" name="name">
    密碼：<input type="test" name="password">
    email:<input type="test" name="email">
    地址：<input type="test" name="address">
    <input type="submit" value="送出修改">
</form>

<form method="post" action="user_applicant.php">
<?php
    echo "<input type=\"hidden\" name=\"account\" value=$Usr_Ac>";
    echo "<input type=\"hidden\" name=\"password\" value=$Usr_pa>";
?>
    <input type="submit" value="回用戶頁">
</form>

</body>

</html>