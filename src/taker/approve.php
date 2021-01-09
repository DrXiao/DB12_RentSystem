<html>
<?php
  require(dirname(__DIR__) . "/function/queryDB.php");
  $isTakerQuery = <<<EOF
      Select Account From Undertaker;
  EOF;

  $table = GetQueryTable($isTakerQuery);

  $isTaker = false;

  while($row = pg_fetch_row($table)){
    if($row[0] == $_COOKIE["ac"]){
      $isTaker = true;
      break;
    }
  }
  if($isTaker == false){
    echo "<h3 style=\"color: red;\">帳號登入錯誤！</h3>";
    exit();
  }
?>
<head>
</head>

<body>
<?php
  $details=$_COOKIE['id'];
  if($_GET["action"]=="ok"){
    $sql_query = "UPDATE RentRecord SET AdmitFlag='1' WHERE No= $details";
    $db = pg_connect(getenv("DATABASE_URL"));
    pg_query($db ,$sql_query);
    pg_close($db);
    echo '<p>完成，請回上一頁';
    setcookie("id","");
  }
?>
</body>
</html>
