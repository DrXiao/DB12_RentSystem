<!DOCTYPE html>
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
    <h1>Hello world</h1>
    <h1>Hello world again</h1>
    <div id="Main">
        <h2>高大露營區租借系統</h2>
        <form action="rent.php" method="post">
            <p>帳號：<input type="text" name="account">
                <p>密碼：<input type="password" name="password">
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