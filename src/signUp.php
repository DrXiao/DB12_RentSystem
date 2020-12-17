<!DOCTYPE html>
<?php
if ($_POST) {
    $db = pg_connect(getenv("DATABASE_URL"));
    // NULL => 空值

    if (!$db) {
        echo "Error<br>";
    } else {
        echo "Successful<br>";
    }

    $query = <<<EOF
                Select Account, SU_Password From SystemUser;
            EOF;

    $returnTable = pg_query($db, $query);

    if (!$returnTable) {
        echo pg_last_error($db);
        exit;
    }

    
    
    pg_close($db);
}
?>


<html>

<head>
    <meta charset="utf-8">
    <style>
        <?php
        require("../static/css/signUp.css");
        ?>
    </style>
    <script>
        <?php
        require("../static/scripts/signUp.js");
        ?>
    </script>
    <title>Rent System Web - Sign Up</title>
</head>

<body>
    <div id="BasicForm">
        <h2>基本資料</h2>
        <form action="signUp.php" method="post" id="InfoForm" onsubmit="return checkPwd(this);">
            <table style="border:3px #000000 solid;">
                <tr>
                    <td>帳號：<input type="text" name="account" maxlength="20"></td>
                    <td>電話：<input type="text" name="phone" maxlength="10" pattern="[0-9]+"></td>
                    <td>名字：<input type="text" name="name"></td>
                    <td>地址：<input type="text" name="address"></td>
                </tr>
                <tr>
                    <td>Email：<input type="text" name="email" pattern="[a-z0-9]+@[a-z.]+"></td>
                </tr>
                <tr>
                    <td>密碼：<input type="text" name="password" maxlength="30" pattern="[a-z0-9]+"></td>
                    <td>密碼確認：<input type="text" name="validatePsw" maxlength="30" pattern="[a-z0-9]+"></td>
                </tr>
                <tr>
                    <td>
                        身份：
                        <select id="ident" name="identity" onchange="changeExtraForm()">
                            <option value="00">校外人士</option>
                            <option value="01">學生</option>
                            <option value="10">教職員</option>
                        </select>
                    </td>
                </tr>
                <tr id="Outsider">
                    <td>統一編號：<input type="text" name="uniformNum" maxlength="8"></td>
                    <td>稅籍編號：<input type="text" name="taxSerialNum"></td>
                    <td>公司：<input type="text" name="company" maxlength="20"></td>
                </tr>
                <tr id="Student" hidden>
                    <td>學號：<input type="text" name="studentID" maxlength="8" pattern="[ABLM][0-9]{7}"></td>
                </tr>
                <tr id="Staff" hidden>
                    <td>教職員編號：<input type="text" name="staffID"></td>
                </tr>
            </table>
            <p><input type="submit" value="註冊">
        </form>
    </div>
</body>


</html>