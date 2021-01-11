<html>

<?php
require(dirname(__DIR__) . "/function/queryDB.php");
// 登入檢查
$query = <<<EOF
            Select Account, SU_Password From SystemUser;
        EOF;
// 用 $query 的請求，檢查 $_POST 是否存在，且帳號密碼有存在於 SystemUser 裡面
LoginCheck();

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
//echo "Hello ".$_POST["account"];
  $ac=$_POST["account"];
  $psd=$_POST["password"];
?>

<head>
<title>系統管理員</title>
</head>

<body>

<?php

//$sql_query="SELECT *from RentRecord";

echo '<p align = "center"><font size="6" face="標楷體" color=blue>系統管理員</font></p>';
echo '<hr>';

echo '<TT>';
echo '<center>';
echo '<p align = "center">';

echo '<form method="POST" action="renter_file.php">';
echo '<input type="hidden" name = "AC" value="'.$ac.'">';
echo '<input type="hidden" name = "PSD" value="'.$psd.'">';
echo '<input value = "修改校外人士、學生基本資料" type = "submit">';
echo '</form>';

echo '<form method="POST" action="taker_file.php">';
echo '<input type="hidden" name = "AC" value="'.$ac.'">';
echo '<input type="hidden" name = "PSD" value="'.$psd.'">';
echo '<input value = "修改承辦人、教職員基本資料" type = "submit">';
echo '</form>';

echo '<form method="POST" action="rent_record.php">';
echo '<input type="hidden" name = "AC" value="'.$ac.'">';
echo '<input type="hidden" name = "PSD" value="'.$psd.'">';
echo '<input value = "修改租借紀錄" type = "submit">';
echo '</form>';

//echo '<form method="POST" action="system_file.php">';
//echo '<input value = "修改系統資訊" type = "submit">';
//echo '</form>';

echo '</p>';

?>

</body>

</html>