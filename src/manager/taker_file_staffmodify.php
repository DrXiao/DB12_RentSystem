<html>

<?php
require(dirname(__DIR__) . "/function/queryDB.php");// 登入檢查

?>

<head>
<title>教職員詳細資料</title>
</head>

<body>

<?php
    $details=$_POST['ID'];
    $sql_query = "SELECT *from SystemUser natural join Staff WHERE Account = '".$details."'";
    $result = GetQueryTable($sql_query);
    $row= pg_fetch_array($result);
    echo '<p align = "center"><font size="6" face="標楷體" color=blue>教職員詳細資料</font></p>';
    echo '<hr>';
      
    echo '<TT>';
    echo '<center>';
    
    echo '<table border = "1" width = "73%" style="table-layout:fixed">';
    
    echo '<tr>';
    echo '<th>帳號</th>';
    echo '<th>連絡電話</th>';
    echo '<th>電子郵件</th>';
    echo '<th>地址</th>';
    echo '<th>身分</th>';
    echo '<th>教職員編號</th>';
    echo '</tr>';
    echo '<tr>';
    echo '<td align="left">'.$row[0];
    echo '<form method="POST" action="taker_file_stafffinish.php">';
    echo '<input type="hidden" name="ID" value="'.$row[0].'">';
    echo '<td align="left">';
    echo '<input type=text value='.$row[1].' maxLength="10" size="22" name="phone">';
    echo '<td align="left">';
    echo '<input type=text value='.$row[4].' maxLength="25" size="22" name="email">';
    echo '<td align="left">';
    echo '<input type=text value='.$row[6].' maxLength="40" size="22" name="address">';
    echo '<td align="left"> 教職員';
    echo '<td align="left">';
    echo '<input type=text value='.$row[7].' maxLength="20" size="22" name="staffid">';
    echo '</tr>';
    echo '</table>';
    echo '<br><input type="submit" name="submit" value="確認更改">';
    echo '</form>';
?>
    
</body>
    
</html>