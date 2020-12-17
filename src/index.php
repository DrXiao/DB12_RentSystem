<!DOCTYPE html>

<?php
if ($_POST) {

    $db = pg_connect(getenv("DATABASE_URL"));
    // NULL => 空值

    if (!$db) {
        exit;
    }

    $query = <<<EOF
                Select Account, SU_Password From SystemUser;
            EOF;

    $returnTable = pg_query($db, $query);

    if (!$returnTable) {
        echo pg_last_error($db);
        exit;
    }

    while ($row = pg_fetch_row($returnTable)) {
        $num = count($row);
        if ($_POST["account"] == $row[0] && $_POST["password"] == $row[1]) {
            header("Location: /applicant.php");
        }
    }
    pg_close($db);
    echo "<h3 style=\"color: red;\">帳號登入錯誤！<h3>";
}
?>

<html>

<head>
    <meta charset="utf-8">
    <style>
        <?php
        require("../static/css/index.css");
        ?>
    </style>
    <title>Rent System Web - Team12</title>
</head>

<body>
    <div id="Main">
        <h2>高大露營區租借系統</h2>
        <form action="index.php" method="post">
            帳號：<input type="text" name="account" maxlength="20"></br>
            密碼：<input type="password" name="password" maxlength="30">
            <p><input type="submit" value="登入">
        </form>
    </div>
    <div>
        <h2>還沒有帳號？</h2>
        <a href="taker file.php">
            <p>我要註冊
        </a>
    </div>
</body>



</html>