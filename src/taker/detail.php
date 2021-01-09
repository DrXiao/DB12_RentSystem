<html>
<?php
  require(dirname(__DIR__) . "/function/queryDB.php");

  $isTakerQuery = <<<EOF
      Select Account From Undertaker;
  EOF;

  $table = GetQueryTable($isTakerQuery);

  $isTaker = false;
  while($row = pg_fetch_row($table)){
    if($row[0] == $_POST["AC"]){
      $isTaker = true;
      break;
    }
  }
  if($isTaker == false){
    echo "<h3 style=\"color: red;\">帳號登入錯誤！</h3>";
    exit();
  }
  $ac=$_POST["AC"];
  $psd=$_POST["PSD"];
?>
<head>
<title>租借內容詳細</title>
</head>

<body>

<?php
    $details=$_POST['ID'];
    $sql_query = "SELECT *from RentRecord WHERE No = $details";
    $result1 = GetQueryTable($sql_query);
    $row= pg_fetch_array($result1);
    echo '<table border="1">';
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
      echo '<td align="center">'.$row[0];  //案件編號
      echo '<td align="center" width="100px">'.$row[1];  //申請人
      echo '<td align="center" width="150px"> '.$row[2];  //申請日期
      echo '<td align="center" width="150px">'.$row[3];  //起始時間
      echo '<td align="center" width="150px">'.$row[4];  //結束時間
      echo '<td align="center">'.$row[5];  //地點
      echo '<td align="center">'.$row[6];  //人數
      if($row[7]=='t'){
        echo '<td align="center" width="100px">已付款';  //付款
      }
      else if($row[7]=='f'){
        echo '<td align="center" width="100px">尚未付款';  //付款
      }
      if($row[8]=='f'){
        echo '<td align="center" align="center" width="100px">尚未核准';  //准許與否
      }
      else if($row[8]=='t'){
        echo '<td align="center" align="center" width="100px">已核准';  //准許與否
      }
      echo '<td align="center" width="100px">'.$row[9];  //承辦人編號
    echo '</table>';
    if($row[8]=='f'){
      echo '<form method="POST" action="approve.php">';
      echo '<input type="hidden" name="ac" value="'.$ac.'">';
      echo '<input type="hidden" name="psd" value="'.$psd.'">';
      echo '<input type="hidden" name="ID" value="'.$details.'">';
      echo '<td align="center"><input type="submit" name="submit" value="核准">';
      echo '</form>';
    }
    echo '<form method="POST" action="taker.php">';
    echo '<input type="hidden" name="account" value="'.$ac.'">';
    echo '<input type="hidden" name="password" value="'.$psd.'">';
    echo '<td align="center"><input type="submit" name="submit" value="返回上一頁">';
    echo '</form>';
?>
<?php 
    /*$sql_query="SELECT *from RentRecord";   
    if($_POST['submit']){
        $sql_query = "UPDATE RentRecord SET AdmitFlag='1' WHERE No= $details";
        $db = pg_connect(getenv("DATABASE_URL"));
        pg_query($db ,$sql_query);
        pg_close($db);
        echo '<p>完成，請回上一頁';
    }*/
?>
<script>
function Approved(){
  if(confirm("Sure?")){
    this.location = "approve.php?action=ok";
  }
  else{
    this.location = "approve.php?action=cancel";
  }
    
}
</script>
</body>

</html>