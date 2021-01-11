<html>

<?php
require(dirname(__DIR__) . "/function/queryDB.php");
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
<title>租借人基本資料</title>
</head>

<body>

<?php
$sql_query1="SELECT *from SystemUser natural join Outsider";
$Outsider = GetQueryTable($sql_query1);
$sql_query2="SELECT *from SystemUser natural join Student";
$Student = GetQueryTable($sql_query2);

echo '<TT>';
echo '<center>';

echo '<form method="POST" action="manage.php">';
echo '<input type="hidden" name="account" value="'.$_POST['account'].'">';
echo '<input type="hidden" name="password" value="'.$_POST['password'].'">';
echo '<br><td align="center"><input type="submit" name="submit" value="返回上一頁">';
echo '</form>';

echo '<p align = "center"><font size="6" face="標楷體" color=blue>校外人士基本資料</font></p>';

echo '<table border = "1" width = "60%" style="table-layout:fixed">';
echo '<tr>';
echo '<th>帳號</th>';
echo '<th>電子郵件</th>';
echo '<th>身分</th>';
echo '<th>公司</th>';
echo '<th>詳細資料</th>';
echo '</tr>';
while($row1 = pg_fetch_array($Outsider))
{
    echo '<form method="POST" action="renter_file_outsidermodify.php">';
    echo '<tr>';
    echo '<td align="left">'.$row1[0];
    echo '<input type="hidden" name="ID" value="'.$row1[0].'">';
    echo '<td align="left">'.$row1[4];
    echo '<td align="left"> 校外人士';
    echo '<td align="left">'.$row1[9];
    echo '<input type="hidden" name="account" value="'.$_POST['account'].'">';
    echo '<input type="hidden" name="password" value="'.$_POST['password'].'">';
    echo '<td align="center" width="100px"><input type="submit" name="details" value="詳細資料">';
    echo '</form>';
}
echo '</table>';

echo '<hr>';
echo '<p align = "center"><font size="6" face="標楷體" color=blue>學生基本資料</font></p>';

echo '<table border = "1" width = "60%" style="table-layout:fixed">';
echo '<tr>';
echo '<th>帳號</th>';
echo '<th>電子郵件</th>';
echo '<th>身分</th>';
echo '<th>學號</th>';
echo '<th>詳細資料</th>';
echo '</tr>';
while($row2 = pg_fetch_array($Student))
{
    echo '<form method="POST" action="renter_file_studentmodify.php">';
    echo '<tr>';
    echo '<td align="left">'.$row2[0];
    echo '<input type="hidden" name="ID" value="'.$row2[0].'">';
    echo '<td align="left">'.$row2[4];
    echo '<td align="left"> 學生';
    echo '<td align="left">'.$row2[7];
    echo '<input type="hidden" name="account" value="'.$_POST['account'].'">';
    echo '<input type="hidden" name="password" value="'.$_POST['password'].'">';
    echo '<td align="center" width="100px"><input type="submit" name="details" value="詳細資料">';
    echo '</form>';
}
echo '</table>';

?>

</body>

</html>