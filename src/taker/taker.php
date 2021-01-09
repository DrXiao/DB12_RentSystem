<html>

<?php
require(dirname(__DIR__) . "/function/queryDB.php");
// 登入檢查

// 用 $query 的請求，檢查 $_POST 是否存在，且帳號密碼有存在於 SystemUser 裡面
LoginCheck();

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


?>
<?php
  setcookie("ac",$_POST["account"]);
  setcookie("psd",$_POST["password"]);
?>

<head>
<title>承辦人</title>
</head>

<body>
<?php
  $sql_query="SELECT *from RentRecord";
  echo '<p align="left"><font size="6"face="微軟正黑體">承辦人</font></p><hr>';
  echo '<strong>尚未核准</strong>';
  echo '<table border="1"width="30%"';
  echo '<tr>';
  echo '<th>案件編號';
  echo '<th>申請日期';
  echo '<th>申請人';
  echo '<th>詳細資料';
  echo '<th>核准狀態';

  $result = GetQueryTable($sql_query);   //從資料表取得資料
  while( $row= pg_fetch_array($result)){  
    if($row[8]=='f'){                   //如果row[8](AdmitFlag)為false
      echo '<form method="POST" action="detail.php">';
      echo '<tr>';
      echo '<td align="center">'.$row[0];    //案件編號
      echo '<input type="hidden" name="ID" value="'.$row[0].'">';
      echo '<td align="center">'.$row[2];   //申請日期
      echo '<td align="center">'.$row[1];   //申請人
      echo '<td align="center"><input type="submit" name="details" value="詳細資料">';
      echo '<td align="center">尚未核准';
      echo '</form>';
    }
  }
  echo '</table>';
  echo '<hr>';
  echo '<strong>已核准</strong>';
  echo '<table border="1"width="30%"';
  echo '<tr>';
  echo '<th>案件編號';
  echo '<th>申請日期';
  echo '<th>申請人';
  echo '<th>核准狀態';
  $result2 = GetQueryTable($sql_query);   //從資料表取得資料
  while( $row= pg_fetch_array($result2)){  
    if($row[8]=='t'){                   //如果row[8](AdmitFlag)為false
      echo '<tr>';
      echo '<td align="center">'.$row[0];    //案件編號
      echo '<input type="hidden" name="ID" value="'.$row[0].'">';
      echo '<td align="center">'.$row[2];   //申請日期
      echo '<td align="center">'.$row[1];   //申請人
      echo '<td align="center">已核准';
      echo '</form>';
    }
  }
  echo '</table>';
?>
<script>
function logout(){
  if(confirm("確定嗎?")){
    <?php
      setcookie("ac","");
      setcookie("psd","");
    ?>
    window.location.href = "/xdmin/login.php";
  }
}
</script>
<input type="button" onclick="logout()" value="登出">

</body>
</html>