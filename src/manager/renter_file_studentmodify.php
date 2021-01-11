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
<title>學生詳細資料</title>
</head>

<body>

<?php
    $details=$_POST['ID'];
    $sql_query = "SELECT *from SystemUser natural join Student WHERE Account = '".$details."'";
    $result = GetQueryTable($sql_query);
    $row= pg_fetch_array($result);
    echo '<p align = "center"><font size="6" face="標楷體" color=blue>學生詳細資料</font></p>';
    echo '<hr>';
      
    echo '<TT>';
    echo '<center>';
    echo '<table border = "1" width = "74%" style="table-layout:fixed">';
    echo '<tr>';
    echo '<th>帳號</th>';
    echo '<th>連絡電話</th>';
    echo '<th>電子郵件</th>';
    echo '<th>地址</th>';
    echo '<th>身分</th>';
    echo '<th>學號</th>';
    echo '</tr>';
    echo '<tr>';
    echo '<td align="left">'.$row[0];
    echo '<form method="POST" action="renter_file_studentfinish.php">';
    echo '<input type="hidden" name="ID" value="'.$row[0].'">';
    echo '<td align="left">';
    echo '<input type=text value='.$row[1].' maxLength="10" size="22" name="phone">';
    echo '<td align="left">';
    echo '<input type=text value='.$row[4].' maxLength="25" size="22" name="email">';
    echo '<td align="left">';
    echo '<input type=text value='.$row[6].' maxLength="40" size="22" name="address">';
    echo '<td align="left"> 學生';
    echo '<td align="left">';
    echo '<input type=text value='.$row[7].' maxLength="8" size="22" name="studentid">';
    echo '</tr>';
    echo '</table>';
    echo '<input type="hidden" name="account" value="'.$_POST['account'].'">';
    echo '<input type="hidden" name="password" value="'.$_POST['password'].'">';
    echo '<br><input type="submit" name="submit" value="確認更改">';
    echo '</form>';
    echo '<form method="POST" action="renter_file.php">';
    echo '<input type="hidden" name="account" value="'.$_POST['account'].'">';
    echo '<input type="hidden" name="password" value="'.$_POST['password'].'">';
    echo '<br><td align="center"><input type="submit" name="submit" value="返回上一頁">';
    echo '</form>';
?>

</body>

</html>