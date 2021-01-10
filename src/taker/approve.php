<html>
<?php
  require(dirname(__DIR__) . "/function/queryDB.php");
  $isTakerQuery = <<<EOF
      Select Account From Undertaker;
  EOF;

  $table = GetQueryTable($isTakerQuery);

  $isTaker = false;

  while($row = pg_fetch_row($table)){
    if($row[0] == $_POST["ac"]){
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
  $details=$_POST['ID'];
  //$ac=$_POST['ac'];
  //if($_GET["action"]=="ok"){
    $sql_query = "UPDATE RentRecord SET AdmitFlag='1' WHERE No= $details";
    $db = pg_connect(getenv("DATABASE_URL"));
    pg_query($db ,$sql_query);
    $sql_query = "UPDATE RentRecord SET taker_admit='".$ac."' WHERE No = $details";
    pg_query($db ,$sql_query);
    pg_close($db);
    echo '<p>完成，請回上一頁';
    echo '<form method="POST" action="taker.php">';
    echo '<input type="hidden" name="account" value="'.$_POST["ac"].'">';
    echo '<input type="hidden" name="password" value="'.$_POST["psd"].'">';
    echo '<td align="center"><input type="submit" name="submit" value="跳回承辦人頁面">';
    echo '</form>';
  //}
?>
</body>
</html>
