<html>

<?php
require(dirname(__DIR__) . "/function/queryDB.php");
?>

<head>
<title>承辦人、教職員基本資料</title>
</head>

<body>

<?php
$sql_query0="SELECT *from SystemUser";
$SystemUser = GetQueryTable($sql_query0);
$sql_query1="SELECT *from SystemUser natural join Undertaker";
$Undertaker = GetQueryTable($sql_query1);
$sql_query2="SELECT *from SystemUser natural join Staff";
$Staff = GetQueryTable($sql_query2);

echo '<p align = "center"><font size="6" face="標楷體" color=blue>承辦人基本資料</font></p>';

echo '<TT>';
echo '<center>';

echo '<form>';

echo '<table border = "1" width = "73%" style="table-layout:fixed">';

echo '<tr>';
echo '<th>帳號</th>';
echo '<th>連絡電話</th>';
echo '<th>電子郵件</th>';
echo '<th>地址</th>';
echo '<th>身分</th>';
echo '<th>承辦人編號</th>';
echo '<th>隸屬組別</th>';
echo '</tr>';

while($row1 = pg_fetch_array($Undertaker))
{
    if ($row1[2] == '10')
    {
        echo '<table border = "1" width = "73%" style="table-layout:fixed">';
        echo '<tr>';

        echo '<td align="left">';
        echo $row1[0];
        echo '<td align="left">';
        echo '<input type=text value='.$row1[1].' maxLength="10" size="18" name="phone">';
        echo '<td align="left">';
        echo '<input type=text value='.$row1[4].' maxLength="25" size="18" name="email">';
        echo '<td align="left">';
        echo '<input type=text value='.$row1[6].' maxLength="40" size="18" name="address">';
        echo '<td align="left">';
        echo '承辦人';
        echo '<td align="left">';
        echo '<input type=text value='.$row1[7].' maxLength="20" size="18" name="takernumber">';
        echo '<td align="left">';
        echo '<input type=text value='.$row1[8].' maxLength="20" size="18" name="department">';
    }
    echo '</table>';
}
echo '</table>';

echo '<hr>';
echo '<p align = "center"><font size="6" face="標楷體" color=blue>教職員基本資料</font></p>';

echo '<table border = "1" width = "73%" style="table-layout:fixed">';
echo '<tr>';
echo '<th>帳號</th>';
echo '<th>連絡電話</th>';
echo '<th>電子郵件</th>';
echo '<th>地址</th>';
echo '<th>身分</th>';
echo '<th>教職員號</th>';
echo '</tr>';
while($row2 = pg_fetch_array($Staff))
{
    if ($row2[2] == '10')
    {
        echo '<table border = "1" width = "73%" style="table-layout:fixed">';
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
        echo '教職員';
        echo '<td align="left">';
        echo '<input type=text value='.$row2[7].' maxLength="8" size="13" name="staffid">';
    }
    echo '</table>';
}
echo '</table>';

echo '</form>';

?>

</body>

</html>