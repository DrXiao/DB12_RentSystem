<html>

<?php
require(dirname(__DIR__) . "/function/queryDB.php");
?>

<head>
<title>租借人基本資料</title>
</head>

<body>

<?php
$sql_query0="SELECT *from SystemUser";
$SystemUser = GetQueryTable($sql_query0);
$sql_query1="SELECT *from SystemUser natural join Outsider";
$Outsider = GetQueryTable($sql_query1);
$sql_query2="SELECT *from SystemUser natural join Student";
$Student = GetQueryTable($sql_query2);

echo '<p align = "center"><font size="6" face="標楷體" color=blue>校外人士基本資料</font></p>';

echo '<TT>';
echo '<center>';

echo '<form>';

echo '<table border = "1" width = "74%" style="table-layout:fixed">';

echo '<tr>';
echo '<th>姓名</th>';
echo '<th>連絡電話</th>';
echo '<th>電子郵件</th>';
echo '<th>地址</th>';
echo '<th>身分</th>';
echo '<th>統一編號</th>';
echo '<th>稅籍編號</th>';
echo '<th>公司</th>';
echo '</tr>';
while($row1 = pg_fetch_array($Outsider))
{
    if ($row1[2] == '00')
    {
        echo '<table border = "1" width = "74%" style="table-layout:fixed">';
        echo '<tr>';
        echo '<td align="left">';
        echo $row1[0];
        echo '<td align="left">';
        echo '<input type=text value='.$row1[1].' maxLength="10" size="15" name="phone">';
        echo '<td align="left">';
        echo '<input type=text value='.$row1[4].' maxLength="25" size="15" name="email">';
        echo '<td align="left">';
        echo '<input type=text value='.$row1[6].' maxLength="40" size="15" name="address">';
        echo '<td align="left">';
        echo '校外人士';
        echo '<td align="left">';
        echo '<input type=text value='.$row1[7].' maxLength="8" size="15" name="uniformnumber">';
        echo '<td align="left">';
        echo '<input type=text value='.$row1[8].' maxLength="20" size="15" name="taxserialnumber">';
        echo '<td align="left">';
        echo '<input type=text value='.$row1[9].' maxLength="20" size="15" name="company">';
    }
    echo '</table>';
}
echo '</table>';

echo '<hr>';
echo '<p align = "center"><font size="6" face="標楷體" color=blue>學生基本資料</font></p>';

echo '<table border = "1" width = "74%" style="table-layout:fixed">';
echo '<tr>';
echo '<th>姓名</th>';
echo '<th>連絡電話</th>';
echo '<th>電子郵件</th>';
echo '<th>地址</th>';
echo '<th>身分</th>';
echo '<th>學號</th>';
echo '</tr>';
while($row2 = pg_fetch_array($Student))
{
    if ($row2[2] == '01')
    {
        echo '<table border = "1" width = "74%" style="table-layout:fixed">';
        echo '<tr>';

        echo '<td align="left">';
        echo $row2[0];
        echo '<td align="left">';
        echo '<input type=text value='.$row2[1].' maxLength="10" size="22" name="phone">';
        echo '<td align="left">';
        echo '<input type=text value='.$row2[4].' maxLength="25" size="22" name="email">';
        echo '<td align="left">';
        echo '<input type=text value='.$row2[6].' maxLength="40" size="22" name="address">';
        echo '<td align="left">';
        echo '學生';
        echo '<td align="left">';
        echo '<input type=text value='.$row2[7].' maxLength="8" size="22" name="studentid">';
    }
    echo '</table>';
}
echo '</table>';

echo '</form>';

?>

</body>

</html>