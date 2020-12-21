<html>

<?php
require(dirname(__DIR__) . "/function/queryDB.php");
// 登入檢查
$query = <<<EOF
            Select Account, SU_Password From SystemUser;
        EOF;
// 用 $query 的請求，檢查 $_POST 是否存在，且帳號密碼有存在於 SystemUser 裡面
LoginCheck($_POST, $query);

$isTakerQuery = <<<EOF
      Select Account From Undertaker;
EOF;

$table = GetQueryTable($isTakerQuery);

$isTaker = false;

while($row = pg_fetch_row($table)){
  if($row[0] == $_POST["account"]){
    $isTaker = true;
    break;
  }
}
if($isTaker == false){
  echo "<h3 style=\"color: red;\">帳號登入錯誤！</h3>";
  exit();
}
echo "Hello ".$_POST["account"];
?>

<head>
<title>租借內容詳細</title>
</head>

<body>

<?php
    $details = $_COOKIE['ID'];
    $sql_query = "select *from RentRecord where No = $details";
    $result = GetQueryTable($sql_query);
    $row= pg_fetch_array($result);
    echo '<table border="1"width="30%"';
    echo '<tr>';
    echo '<th>案件編號';
    echo '<th>申請人';
    echo '<th>申請日期';
    echo '<th>起始時間';
    echo '<th>結束時間';
    echo '<th>地點';
    echo '<th>人數';
    echo '<th>付款';
    echo '<th>准許與否';
    echo '<th>承辦人員編號';
    echo '<tr>';
    echo '<td>'.$row[0];
    echo '<td>'.$row[1];
    echo '<td>'.$row[2];
    echo '<td>'.$row[3];
    echo '<td>'.$row[4];
    echo '<td>'.$row[5];
    echo '<td>'.$row[6];
    echo '<td>'.$row[7];
    echo '<td>'.$row[8];
    echo '<td>'.$row[9];
    
?>
<form action = "" method="post">
<input type="submit" name="accept" value="核准">
<?php 
    $sql_query="select *from RentRecord";   
    if($_POST['submit']){
        $sql_query = "UPDATE RentRecord SET AdmitFlag='1' WHERE No=$details";
        $db = pg_connect(getenv("DATABASE_URL"));
        pg_query($db ,$sql_query);
        pg_close($db);
        echo '<p>完成，請回上一頁';
    }
?>