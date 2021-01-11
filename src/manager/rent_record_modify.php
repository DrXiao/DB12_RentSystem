<html>

<?php
require(dirname(__DIR__) . "/function/queryDB.php");// 登入檢查

?>

<head>
<title>租借紀錄繳費與核准狀態</title>
</head>

<body>

<?php
    $details=$_POST['ID'];
    $sql_query = "SELECT *from RentRecord WHERE No = $details";
    $result = GetQueryTable($sql_query);
    $row= pg_fetch_array($result);
    echo '<p align = "center"><font size="6" face="標楷體" color=blue>繳費與核准狀態</font></p>';
    echo '<hr>';
      
    echo '<TT>';
    echo '<center>';
    
    echo '<table border = "1" width = "25%" style="table-layout:fixed">';
    
    echo '<tr>';
    echo '<th>繳費狀態</th>';
    echo '<th>核准狀態</th>';
    echo '</tr>';
    if($row[7]=='t'){
      echo '<td align="center">已付款';
    }
    else if($row[7]=='f'){
      echo '<td align="center">尚未付款';
    }
    if($row[8]=='f'){
      echo '<td align="center">尚未核准';
    }
    else if($row[8]=='t'){
      echo '<td align="center">已核准';
    }
    echo '</table>';
    echo '<p>';
    if($row[7]=='f'){
      echo '<form method="POST" action="rent_record_pay.php">';
      echo '<input type="hidden" name="ID" value="'.$details.'">';
      echo '<td align="center"><input type="submit" name="submit" value="修改為已付款">';
      echo '</form>';
    }
    if($row[7]=='t'){
      echo '<form method="POST" action="rent_record_nonpay.php">';
      echo '<input type="hidden" name="ID" value="'.$details.'">';
      echo '<td align="center"><input type="submit" name="submit" value="修改為尚未付款">';
      echo '</form>';
    }
    if($row[8]=='f'){
      echo '<form method="POST" action="rent_record_admit.php">';
      echo '<input type="hidden" name="ID" value="'.$details.'">';
      echo '<td align="center"><input type="submit" name="submit" value="修改為已核准">';
      echo '</form>';
    }
    if($row[8]=='t'){
      echo '<form method="POST" action="rent_record_nonadmit.php">';
      echo '<input type="hidden" name="ID" value="'.$details.'">';
      echo '<td align="center"><input type="submit" name="submit" value="修改為尚未核准">';
      echo '</form>';
    }
    echo '<form method="POST" action="rent_record.php">';
    echo '<td align="center"><input type="submit" name="submit" value="返回上一頁">';
    echo '</form>';
?>

</body>

</html>