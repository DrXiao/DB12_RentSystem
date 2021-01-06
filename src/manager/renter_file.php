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
$sql_query1="SELECT *from Student";
$Student = GetQueryTable($sql_query1);
$sql_query2="SELECT *from Outsider";
$Outsider = GetQueryTable($sql_query2);

echo '<p align = "center"><font size="6" face="標楷體" color=blue>租借人基本資料</font></p>';
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
echo '<th>統一編號</th>';
echo '<th>稅籍編號</th>';
echo '<th>公司</th>';
echo '<th>學號</th>';
echo '</tr>';
//$row1 = pg_fetch_array($Student);
//$row2 = pg_fetch_array($Outsider);
while($row0 = pg_fetch_array($SystemUser))
{
    if (($row0[2] == '00') or ($row0[2] == '01'))
    {
        echo '<table border = "1" width = "74.3%" style="table-layout:fixed">';
        echo '<tr>';
        echo '<td align="left">';
        echo '<input type=text value='.$row0[0].' maxLength="20" size="13" name="accout">';
        echo '<td align="left">';
        echo '<input type=text value='.$row0[1].' maxLength="10" size="13" name="phone">';
        echo '<td align="left">';
        echo '<input type=text value='.$row0[4].' maxLength="25" size="13" name="email">';
        echo '<td align="left">';
        echo '<input type=text value='.$row0[6].' maxLength="40" size="13" name="address">';
        echo '<td align="left">';
        if (($row0[2] == '00') and ($row2 = pg_fetch_array($Outsider)))
        {
            echo '<input type = "radio" style = "width:11px" value = "school">學生';
            echo '<input type = "radio" style = "width:11px" value = "noschool" CHECKED>校外人士';

            echo '<td align="left">';
            echo '<input type=text value='.$row2[1].' maxLength="8" size="13" name="uniformnumber">';

            echo '<td align="left">';
            echo '<input type=text value='.$row2[2].' maxLength="20" size="13" name="taxserialnumber">';

            echo '<td align="left">';
            echo '<input type=text value='.$row2[3].' maxLength="20" size="13" name="company">';

            echo '<td align="left">';
            echo '<input type=text value=無 maxLength="8" size="13" name="studentid">';
        }
        else if(($row0[2] == '01') and ($row1 = pg_fetch_array($Student)))
        {
            echo '<input type = "radio" style = "width:11px" value = "school" CHECKED>學生';
            echo '<input type = "radio" style = "width:11px" value = "noschool">校外人士';

            echo '<td align="left">';
            echo '<input type=text value=無 maxLength="8" size="13" name="uniformnumber">';

            echo '<td align="left">';
            echo '<input type=text value=無 maxLength="20" size="13" name="taxserialnumber">';

            echo '<td align="left">';
            echo '<input type=text value=無 maxLength="20" size="13" name="company">';

            echo '<td align="left">';
            echo '<input type=text value='.$row1[1].' maxLength="8" size="13" name="studentid">';
        }
    echo '</table>';
    }
}
echo '</table>';

echo '<p align = "center">';
echo '<input value = "確認修改" type = "submit">';
echo '<input value = "取消" type = "submit">';

echo '</form>';

?>

</body>

</html>