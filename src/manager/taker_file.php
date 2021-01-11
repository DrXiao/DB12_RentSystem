<html>

<?php
require(dirname(__DIR__) . "/function/queryDB.php");
?>

<head>
<title>承辦人、教職員基本資料</title>
</head>

<body>

<?php
$sql_query1="SELECT *from SystemUser natural join Undertaker";
$Undertaker = GetQueryTable($sql_query1);
$sql_query2="SELECT *from SystemUser natural join Staff";
$Staff = GetQueryTable($sql_query2);

echo '<p align = "center"><font size="6" face="標楷體" color=blue>承辦人基本資料</font></p>';

echo '<TT>';
echo '<center>';

echo '<table border = "1" width = "60%" style="table-layout:fixed">';

echo '<tr>';
echo '<th>帳號</th>';
echo '<th>電子郵件</th>';
echo '<th>身分</th>';
echo '<th>承辦人編號</th>';
echo '<th>詳細資料</th>';
echo '</tr>';

while($row1 = pg_fetch_array($Undertaker))
{
    if ($row1[2] == '10')
    {
        echo '<form method="POST" action="taker_file_takermodify.php">';
        echo '<tr>';
        echo '<td align="left">'.$row1[0];
        echo '<input type="hidden" name="ID" value="'.$row1[0].'">';
        echo '<td align="left">'.$row1[4];
        echo '<td align="left"> 承辦人';
        echo '<td align="left">'.$row1[7];
        echo '<td align="center" width="100px"><input type="submit" name="details" value="詳細資料">';
        echo '</form>';
    }
}
echo '</table>';

echo '<hr>';
echo '<p align = "center"><font size="6" face="標楷體" color=blue>教職員基本資料</font></p>';

echo '<table border = "1" width = "60%" style="table-layout:fixed">';
echo '<tr>';
echo '<th>帳號</th>';
echo '<th>電子郵件</th>';
echo '<th>身分</th>';
echo '<th>教職員編號</th>';
echo '<th>詳細資料</th>';
echo '</tr>';
while($row2 = pg_fetch_array($Staff))
{
    if ($row2[2] == '10')
    {
        echo '<form method="POST" action="taker_file_staffmodify.php">';
        echo '<tr>';
        echo '<td align="left">'.$row2[0];
        echo '<input type="hidden" name="ID" value="'.$row2[0].'">';
        echo '<td align="left">'.$row2[4];
        echo '<td align="left"> 教職員';
        echo '<td align="left">'.$row2[7];
        echo '<td align="center" width="100px"><input type="submit" name="details" value="詳細資料">';
        echo '</form>';
    }
}
echo '</table>';

?>

</body>

</html>