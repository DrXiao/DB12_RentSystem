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
<title>承辦人</title>
</head>

<body>

<p align="left"><font size="6"face="微軟正黑體">承辦人</font></p>
<hr>

尚未核准的申請件數 : xx
<p>日期查詢<input type=date></p>

<form>
<table border="1"width="30%">
<tr>
  <th >案件編號</th>
  <th>申請日期</th>
  <th>申請人</th>
  <th></th>
  <th>批准與否</th>
</tr>

<tr align="center">
  <td>123456789</td>
  <td>2020/11/28</td>
  <td>hongbin</td>
  <td><input type="submit"value="詳細資料"></td>
  <td><input type="radio"name="check"value="yes">是
      <input type="radio"name="check"value="no">否</td>
</tr>

<tr align="center">
  <td>564654132</td>
  <td>2020/11/29</td>
  <td>bonghin</td>
  <td><input type="submit"value="詳細資料"></td>
  <td><input type="radio"name="check1"value="yes">是
      <input type="radio"name="check2"value="no">否</td>
</tr>
</table>
<p><input type="submit"value="確認送出"></p>
</form>
</body>
</html>