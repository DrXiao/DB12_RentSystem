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
        <h2>高大露營/烤肉區租借系統</h2>
        <form action="/applicant/user_applicant.php" method="post">
            帳號：<input type="text" name="account" maxlength="20"></br>
            密碼：<input type="password" name="password" maxlength="30">
            <p><input type="submit" value="登入">
        </form>
    </div>
    <div>
        <h2>還沒有帳號？</h2>
        <a href="signUp.php">
            <p>我要註冊
        </a>
        <h2>承辦人員專區</h2>
        <a href="xdmin/login.php">
            <p>承辦人員登入處
        </a>
        <h2>系統管理員專區</h2>
        <a href="xdmin/admin.php">
            <p>系統管理員登入處
        </a>
    </div>
</body>



</html>