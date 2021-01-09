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
$sql_query1="SELECT * from SystemUser natural join Staff";
$UndertakerandStaff = GetQueryTable($sql_query1);
//$sql_query2="SELECT *from Staff";
//$Staff = GetQueryTable($sql_query2);

echo '<p align = "center"><font size="6" face="標楷體" color=blue>承辦人、教職員基本資料</font></p>';
echo '<hr>';

echo '<TT>';
echo '<center>';

echo '<form>';

echo '<table border = "1" width = "74.3%" style="table-layout:fixed">';

echo '<tr>';
echo '<th>姓名</th>';
echo '<th>連絡電話</th>';
echo '<th>電子郵件</th>';
echo '<th>地址</th>';
echo '<th>身分</th>';
echo '<th>承辦人編號</th>';
echo '<th>隸屬組別</th>';
echo '<th>教職員號</th>';
echo '</tr>';

echo '<table border = "1" width = "74.3%" style="table-layout:fixed">';
echo '<tr>';
/*while($row0 = pg_fetch_array($SystemUser))
{
    if ($row0[2] == '10')
    {
        echo '<td align="left">';
        echo '<input type=text value='.$row0[0].' maxLength="20" size="13" name="accout">';
        echo '<td align="left">';
        echo '<input type=text value='.$row0[1].' maxLength="10" size="13" name="phone">';
        echo '<td align="left">';
        echo '<input type=text value='.$row0[4].' maxLength="25" size="13" name="email">';
        echo '<td align="left">';
        echo '<input type=text value='.$row0[6].' maxLength="40" size="13" name="address">';
    }
}*/
        while ($row1 = pg_fetch_array($UndertakerandStaff))
        {
            echo '<td align="left">';
            echo $row1[0];

            echo '<td align="left">';
            echo '<input type=text value='.$row1[1].' maxLength="20" size="13" name="takernumber">';

            echo '<td align="left">';
            echo '<input type=text value='.$row1[2].' maxLength="20" size="13" name="department">';

            echo '<td align="left">';
            echo '<input type=text value='.$row1[3].' maxLength="8" size="13" name="staffid">';
        }
        /*while ($row2 = pg_fetch_array($Staff))
        {
            echo '<td align="left">';
            echo '教職員';

            echo '<td align="left">';
            echo '無';

            echo '<td align="left">';
            echo '無';

            echo '<td align="left">';
            echo '<input type=text value='.$row2[1].' maxLength="8" size="13" name="staffid">';
        }*/
        echo '</table>';
echo '</table>';

echo '<p align = "center">';
echo '<input value = "確認修改" type = "submit">';
echo '<input value = "取消" type = "submit">';

echo '</form>';

?>

</body>

</html>