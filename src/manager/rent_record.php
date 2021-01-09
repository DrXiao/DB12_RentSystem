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

while($row = pg_fetch_array($result))
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
    if ($row[7] == 'f')
    {
      echo "<form>";
      echo '<input type = "radio" name="pay'.$row[0].'" value = "nonAdmit">是';
      echo '<input type = "radio" name="pay'.$row[0].'"value = "nonAdmit" checked="true">否';
      echo "</form>";
    }
    else
    {
      echo "<form>";
      echo '<input type = "radio" name="pay'.$row[0].'"value = "nonAdmit" checked="true">是';
      echo '<input type = "radio" name="pay'.$row[0].'"value = "nonAdmit">否';
      echo "</form>";
    }
    echo '<td align="center">';
    if ($row[8] == 'f')
    {
      echo "<form>";
      echo '<input type = "radio" name="admit'.$row[0].'"value = "nonAdmit">是';
      echo '<input type = "radio" name="admit'.$row[0].'"value = "nonAdmit" checked="true">否';
      echo "</form>";
    }
    else
    {
      echo "<form>";
      echo '<input type = "radio" name="admit'.$row[0].'"value = "nonAdmit" checked="true">是';
      echo '<input type = "radio" name="admit'.$row[0].'"value = "nonAdmit">否';
      echo "</form>";
    }
    echo '</table>';
}
echo '</table>';
echo '<p align = "center">';
echo '<input value = "確認修改" type = "submit">';
echo '<input value = "取消" type = "submit">';
echo '</form>';
?>

</body>

</html>