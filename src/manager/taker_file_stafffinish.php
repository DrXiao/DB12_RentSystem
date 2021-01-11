<html>

<?php
require(dirname(__DIR__) . "/function/queryDB.php");// 登入檢查

?>

<head>
<title>教職員資料修改完成</title>
</head>

<body>

<?php
    $details=$_POST['ID'];
    $phone=$_POST["phone"];
    $email=$_POST["email"];
    $address=$_POST["address"];
    $staffid=$_POST["staffid"];
    $sql_query = "UPDATE SystemUser  SET Phone='".$phone."',Email='".$email."',Address='".$address."' WHERE Account = '".$details."'";
    $db = pg_connect(getenv("DATABASE_URL"));
    pg_query($db ,$sql_query);
    $sql_query = "UPDATE Staff SET staffid='".$staffid."' WHERE Account = '".$details."'";
    $db = pg_connect(getenv("DATABASE_URL"));
    pg_query($db ,$sql_query);
    pg_close($db);
    echo '<TT>';
    echo '<center>';
    echo '<p>完成，請回上一頁';
    echo '<form method="POST" action="taker_file.php">';
    echo '<td align="center"><input type="submit" name="submit" value="回到承辦人、教職員基本資料">';
    echo '</form>';
?>

</body>

</html>