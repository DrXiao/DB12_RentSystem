<html>

<?php
require(dirname(__DIR__) . "/function/queryDB.php");// 登入檢查

?>

<head>
<title>校外人士詳細資料</title>
</head>

<body>

<?php
    $details=$_POST['ID'];
    $sql_query = "SELECT *from SystemUser natural join Outsider WHERE Account = $details";
    $result = GetQueryTable($sql_query);
    $row= pg_fetch_array($result);
    //if ($row[2] = '00')
    //{
        echo '<p align = "center"><font size="6" face="標楷體" color=blue>校外人士詳細資料</font></p>';
        echo '<hr>';
      
        echo '<TT>';
        echo '<center>';
    
        echo '<table border = "1" width = "25%" style="table-layout:fixed">';
    
        echo '<tr>';
        echo '<th>帳號</th>';
        echo '<th>連絡電話</th>';
        echo '<th>電子郵件</th>';
        echo '<th>地址</th>';
        echo '<th>身分</th>';
        echo '<th>統一編號</th>';
        echo '<th>稅籍編號</th>';
        echo '<th>公司</th>';
        echo '</tr>';
        echo '<tr>';
        echo '<td align="left">';
        echo $row[0];
        echo '<td align="left">';
        echo '<input type=text value='.$row[1].' maxLength="10" size="13" name="phone">';
        echo '<td align="left">';
        echo '<input type=text value='.$row[4].' maxLength="25" size="13" name="email">';
        echo '<td align="left">';
        echo '<input type=text value='.$row[6].' maxLength="40" size="13" name="address">';
        echo '<td align="left">';
        echo '校外人士';
        echo '<td align="left">';
        echo '<input type=text value='.$row[7].' maxLength="8" size="13" name="uniformnumber">';
        echo '<td align="left">';
        echo '<input type=text value='.$row[8].' maxLength="20" size="13" name="taxserialnumber">';
        echo '<td align="left">';
        echo '<input type=text value='.$row[9].' maxLength="20" size="13" name="company">';
    //}
?>

</body>

</html>