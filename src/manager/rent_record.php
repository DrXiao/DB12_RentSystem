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
<title>租借紀錄</title>
</head>

<body>

<?php
$sql_query="SELECT *from RentRecord";
$result = GetQueryTable($sql_query);

echo '<TT>';
echo '<center>';

echo '<form method="POST" action="manage.php">';
echo '<input type="hidden" name="account" value="'.$_POST['account'].'">';
echo '<input type="hidden" name="password" value="'.$_POST['password'].'">';
echo '<br><td align="center"><input type="submit" name="submit" value="返回上一頁">';
echo '</form>';

echo '<p align = "center"><font size="6" face="標楷體" color=blue>租借紀錄</font></p>';
echo '<hr>';

echo '<table border = "1" width = "70%" style="table-layout:fixed">';
echo '<tr>';
echo '<th>案件編號</th>';
echo '<th>租借人</th>';
echo '<th>申請日期</th>';
echo '<th>起始時間</th>';
echo '<th>結束時間</th>';
echo '<th>租借場地編號</th>';
echo '<th>總人數</th>';
echo '<th>詳細資料</th>';
echo '</tr>';

while($row = pg_fetch_array($result))
{
    echo '<form method="POST" action="rent_record_modify.php">';
    echo '<tr>';
    echo '<td align="center">'.$row[0]; //案件編號
    echo '<input type="hidden" name="ID" value="'.$row[0].'">';
    echo '<td align="center">'.$row[1]; //租借人
    echo '<td align="center">'.$row[2]; //申請日期
    echo '<td align="center">'.$row[3]; //起始時間
    echo '<td align="center">'.$row[4]; //結束時間
    echo '<td align="center">'.$row[5]; //租借場地編號
    echo '<td align="center">'.$row[6]; //總人數
    echo '<input type="hidden" name="account" value="'.$_POST['account'].'">';
    echo '<input type="hidden" name="password" value="'.$_POST['password'].'">';
    echo '<td align="center" width="100px"><input type="submit" name="details" value="繳費與核准狀態">';
    echo '</form>';
}
echo '</table>';
?>

</body>

</html>