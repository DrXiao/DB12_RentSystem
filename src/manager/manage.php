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
  echo "<h3 style=\"color: red;\">YA帳號登入錯誤！</h3>";
  exit();
}
echo "Hello ".$_POST["account"];
?>

<head>

<title>系統管理員</title>

</head>

<body>

<form method = "get"action = "manage.php">
<p align = "center"><font size="6" face="標楷體" color=blue>系統管理員</font></p>
<hr>

<TT>
<center>

<table border = "1" width = "33%">

<td align="right">系統管理員ID:</td>
<td align="left"><input type=text maxLength="20" size="20" name="userid"></td>

<tr>

<td align="right">密碼:</td>
<td align="left"><input type=text maxLength="20" size="20" name="password"></td>

</table>

<p align = "center">
<input value = "修改租借人基本資料" type = "submit">
<input value = "修改承辦人基本資料" type = "submit">
<input value = "修改租借紀錄" type = "submit">
<input value = "修改系統資訊" type = "submit">
</p>

</form>

</body>

</html>