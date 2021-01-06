<html>

<?php

$Usr_Ac=$_POST[account];

$Usr_find = <<<EOF
        Select * From SystemUser;
EOF;
$Usr_query = GetQueryTable($Usr_find);


while($row = pg_fetch_row($Usr_query)) {
    $fieldNumber = count($row);
    if($row[0]==$Usr_Ac)
        $Usr_Name=$row[3];
}
echo "<hr>";


session_start();
$_SESSION['Usr_Name']=$Usr_Name;
//session值的讀取:

//session值的銷燬
//nset($_SESSION['one']);
//echo $Usr_Name1;
?>

<head>

    <meta charset="utf-8">
    <title>高大露營烤肉區租借系統</title>

</head>



<body>



    高大露營烤肉區租借系統<br>
    <br>User:
    <?php
        echo $Usr_Name;
    ?>
    <hr>

<form method="post" action="applicant_3.php">
    總人數：<input type=text maxlength="10" size="10" name="PNum">
    <br>借用時間及時段:<br>
    <input type=string name="App_Year">年
    <input type=string name="App_Month">月
    <input type=string name="App_Day">日
    <br>
    <input type="submit">下一步
</form>
</body>

</html>