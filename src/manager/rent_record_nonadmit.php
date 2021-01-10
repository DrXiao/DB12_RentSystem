<html>

<?php
require(dirname(__DIR__) . "/function/queryDB.php");// 登入檢查

?>

<head>
<title>租借紀錄修改完成</title>
</head>

<body>

<?php
    $details=$_POST['ID'];
    $sql_query = "UPDATE RentRecord SET AdmitFlag='0' WHERE No= $details";
    $db = pg_connect(getenv("DATABASE_URL"));
    pg_query($db ,$sql_query);
    pg_close($db);
    echo '<p>完成，請回上一頁';
    echo '<form method="POST" action="rent_record.php">';
    //echo '<input type="hidden" name="account" value="'.$_POST["ac"].'">';
    //echo '<input type="hidden" name="password" value="'.$_POST["psd"].'">';
    echo '<td align="center"><input type="submit" name="submit" value="回到租借紀錄">';
    echo '</form>';
?>

</body>

</html>