<html>

<?php
require(dirname(__DIR__) . "/src/function/queryDB.php");
// 登入檢查
$query = <<<EOF
            Select Account, SU_Password From SystemUser;
        EOF;
// 用 $query 的請求，檢查 $_POST 是否存在，且帳號密碼有存在於 SystemUser 裡面
LoginCheck($_POST, $query);



// 範例 ： 用函數取得資料表內容
$query2 = <<<EOF
        Select * From SystemUser;
EOF;

$table = GetQueryTable($query2);
// 讀一列資料  (跟你們網頁 MySQL 教的一樣，只是改叫 pg_fetch_row)
while($row = pg_fetch_row($table)) {
    $fieldNumber = count($row);
    for($i = 0; $i < $fieldNumber ; $i += 1) {
        echo $row[$i];
        echo "|";
    }
    echo "</br>";
}
echo "<hr>";
?>

<head>

    <meta charset="utf-8">
    <title>高大露營烤肉區租借系統</title>

</head>



<body>



    高大露營烤肉區租借系統<br>

    <form method="post" action="applicant_2.php">
    總人數：<input type=text maxlength="10" size="10" name="PNum">
    借用時間及時段:<input type=date name="Dates">
    確認<input type="submit">
    </form>


</body>

</html>