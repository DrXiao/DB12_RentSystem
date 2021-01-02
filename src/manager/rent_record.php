<html>

<?php
  require(dirname(__DIR__) . "/function/queryDB.php");
?>

<head>
<title>租借紀錄</title>
</head>

<body>

<?php
  $sql_query="SELECT *from RentRecord";
  $result = GetQueryTable($sql_query);
  //$row= pg_fetch_array($result);

  //$i = 0;
  //echo row[0]
  //while($i == )
  echo '<p align = "center"><font size="6" face="標楷體" color=blue>租借紀錄</font></p>';
  echo '<hr>';
  
  echo '<TT>';
  echo '<center>';

  echo '<table border = "1" width = "70%" style="table-layout:fixed">';

  echo '<tr>';
  echo '<th>案件編號</th>';
  echo '<th>租借人</th>';
  echo '<th>申請日期</th>';
  //echo '<th>租借數量(烤肉爐/營位)</th>';
  echo '<th>起始時間</th>';
  echo '<th>結束時間</th>';
  echo '<th>租借場地編號</th>';
  echo '<th>總人數</th>';
  echo '<th>繳費與否</th>';
  echo '<th>批准與否</th>';
  //echo '<th>繳費金額</th>';
  echo '</tr>';

  while( $row = pg_fetch_array($result))
  {
  echo '<table border = "1" width = "70%" style="table-layout:fixed">';
  
  echo '<tr>';
  echo '<td align="center">'.$row[0]; //案件編號
  echo '<td align="center">'.$row[1]; //租借人
  echo '<td align="center">'.$row[2]; //申請日期
  echo '<td align="center">'.$row[3]; //起始時間
  echo '<td align="center">'.$row[4]; //結束時間
  echo '<td align="center">'.$row[5]; //租借場地編號
  echo '<td align="center">'.$row[6]; //總人數

  echo '<td align="center">';
    if ($row[7] === false) //繳費與否，有bug
    {
      echo '<input type = "radio" value = "nonAdmit">是';
      echo '<input type = "radio" value = "nonAdmit" CHECKED>否';
    }
    else
    {
      echo '<input type = "radio" value = "nonAdmit" CHECKED>是';
      echo '<input type = "radio" value = "nonAdmit">否';
    }
  echo '<td align="center">';
    if ($row[8] === false) //批准與否，有bug
    {
      echo '<input type = "radio" value = "nonAdmit">是';
      echo '<input type = "radio" value = "nonAdmit" CHECKED>否';
    }
    else
    {
      echo '<input type = "radio" value = "nonAdmit" CHECKED>是';
      echo '<input type = "radio" value = "nonAdmit">否';
    }
  echo '</table>';
  }
  /*echo '<input type = "radio" value = "Admit" name = "AdmitFlag1" CHECKED>是';
  echo '<input type = "radio" value = "nonAdmit" name = "AdmitFlag1">否';
  echo '</td>';
  echo '<td align="center">1800</td>';
  echo '<td align="center">';
  echo '<input type = "radio" value = "Pay" name = "PayFlag1" CHECKED>是';
  echo '<input type = "radio" value = "nonPay" name = "PayFlag1">否';
  echo '</td>';*/

/*<tr>

<td align="center">564654132</td>
<td align="center">2020/11/29</td>
<td align="center">bonghin</td>
<td align="center">11</td>
<td align="center">2</td>
<td align="center">2020/12/5 18:00</td>
<td align="center">2020/12/6 10:00</td>
<td align="center">25</td>
<td align="center">
<input type = "radio" value = "Admit" name = "AdmitFlag2" CHECKED>是
<input type = "radio" value = "nonAdmit" name = "AdmitFlag2">否
</td>
<td align="center">1200</td>
<td align="center">
<input type = "radio" value = "Pay" name = "PayFlag2">是
<input type = "radio" value = "nonPay" name = "PayFlag2" CHECKED>否
</td>*/

  echo '</table>';

  echo '<p align = "center">';
  echo '<input value = "確認修改" type = "submit">';
  echo '<input value = "取消" type = "submit">';

  echo '</form>';

?>

</body>

</html>