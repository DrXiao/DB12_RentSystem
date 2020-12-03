<?php
//require("../vendor/autoload.php");
$host = "host=ec2-52-20-248-222.compute-1.amazonaws.com";
$port = "port=5432";
$dbname = "ded5rsvcdg3lgk";
$userInfo = "user=bnyojzfovtnuth password=7c25dceccb34298445b4f983a04ca8a74d704a989f68faca7ca89e6793fc1b65";
$para = "sslmode=require";

$db = pg_connect("$host $port $dbname $userInfo $para");
if (!$db) {
    echo "Error! Cannot connect!\n";
} else {
    echo "Get Database!\n";
}
pg_close($db);
?>

<!DOCTYPE html>
<html>



<head>
    <meta charset="utf-8">
    <style>
        <?php
        require(dirname(__DIR__) . "/static/css/index.css");
        ?>
    </style>
    <title>Rent System Web - Team12</title>
</head>


<body>
    <div id="Main">
        <h2>高大露營區租借系統</h2>
        <form action="rent.php" method="post">
            <p>帳號：<input type="text" name="account">
                <p>密碼：<input type="password">
                    <p><input type="submit" value="登入"> <input type="reset">
        </form>
    </div>
    <div>
        <h2>還沒有帳號？</h2>
        <form action="" method="GET">
            <p><input type="submit" value="我要註冊">
        </form>
    </div>
</body>



</html>