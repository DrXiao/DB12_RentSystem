<html>

<?php
require(dirname(__DIR__) . "/function/queryDB.php");// 登入檢查
$isTakerQuery = <<<EOF
      Select Account From SystemAdmin;
EOF;

$table = GetQueryTable($isTakerQuery);

$isAdmin = false;

while($row = pg_fetch_row($table)){
  if($row[0] == $_POST["account"]){
    $isAdmin = true;
    break;
  }
}
if($isAdmin == false){
  echo "<h3 style=\"color: red;\">帳號登入錯誤！</h3>";
  exit();
}
?>

<head>
<title>學生資料修改完成</title>
</head>

<body>

<?php
    $details=$_POST['ID'];
    $phone=$_POST["phone"];
    $email=$_POST["email"];
    $address=$_POST["address"];
    $studentid=$_POST["studentid"];
    $sql_query = "UPDATE SystemUser  SET Phone='".$phone."',Email='".$email."',Address='".$address."' WHERE Account = '".$details."'";
    $db = pg_connect(getenv("DATABASE_URL"));
    pg_query($db ,$sql_query);
    $sql_query = "UPDATE Student SET studentid='".$studentid."' WHERE Account = '".$details."'";
    $db = pg_connect(getenv("DATABASE_URL"));
    pg_query($db ,$sql_query);
    pg_close($db);
    echo '<TT>';
    echo '<center>';
    echo '<p>完成，請回上一頁';
    echo '<form method="POST" action="renter_file.php">';
    echo '<input type="hidden" name="account" value="'.$_POST['account'].'">';
    echo '<input type="hidden" name="password" value="'.$_POST['password'].'">';
    echo '<td align="center"><input type="submit" name="submit" value="回到校外人士、學生基本資料">';
    echo '</form>';
?>

</body>

</html>