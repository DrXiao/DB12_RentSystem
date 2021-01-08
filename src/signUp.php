<!DOCTYPE html>
<?php
if ($_POST) {
    require(dirname(__DIR__) . "/src/function/queryDB.php");
    // NULL => 空值


    $returnTable = GetQueryTable(<<<EOF
        select Account from SystemUser where Account = '{$_POST["account"]}'
    EOF);

    $exist = false;
    $row = pg_fetch_row($returnTable);

    if($row[0] == $_POST["account"]) {
        $exist = true;
    }

    if ($exist) {
        echo "<h3 style=\"color: red;\">帳號已被註冊，請換帳號名稱!<h3>";
    } else {
        $insert_SystemUser = <<<EOF
        insert into SystemUser values(
            '{$_POST["account"]}',
            '{$_POST["phone"]}',
            '{$_POST["identity"]}',
            '{$_POST["name"]}',
            '{$_POST["email"]}',
            '{$_POST["password"]}',
            '{$_POST["address"]}'
        );
    EOF;

        $insert_Ident;
        switch ($_POST["identity"]) {
            case 00: {
                    $insert_Ident = <<<EOF
                    insert into Outsider values(
                        '{$_POST["account"]}',
                        '{$_POST["uniformNum"]}',
                        '{$_POST["taxSerialNum"]}',
                        '{$_POST["company"]}'
                    );
                EOF;
                    break;
                }
            case 01: {
                    $insert_Ident = <<<EOF
                    insert into Student values(
                        '{$_POST["account"]}',
                        '{$_POST["studentID"]}'
                    );
                EOF;
                    break;
                }
            case 10: {
                    $insert_Ident = <<<EOF
                    insert into Staff values(
                        '{$_POST["account"]}',
                        '{$_POST["staffID"]}'
                    );
                EOF;
                    break;
                }
        }
        $db = pg_connect(getenv("DATABASE_URL"));
        if (!$db) {
            exit();
        }

        $res = pg_query($db, $insert_SystemUser . $insert_Ident);
        if (!$res) {
            echo pg_last_error($db);
            pg_close($db);
            exit();
        } else {
            pg_close($db);
            echo "<h1>註冊成功</h1></br>";
            echo "<a href=\"index.php\">回首頁</a";
            exit();
        }
    }
}
?>


<html>

<head>
    <meta charset="utf-8">
    <style>
        <?php
        require(dirname(__DIR__) . "/static/css/signUp.css");
        ?>
    </style>
    <script>
        <?php
        require(dirname(__DIR__) . "/static/scripts/signUp.js");
        ?>
    </script>
    <title>Rent System Web - Sign Up</title>
</head>

<body>
    <div id="BasicForm">
        <h2>基本資料</h2>
        <form action="signUp.php" method="post" id="InfoForm" onsubmit="return checkForm(this);">
            <table style="border:3px #000000 solid;">
                <tr>
                    <td>帳號：<input type="text" name="account" maxlength="20" required></td>
                    <td>電話：<input type="text" name="phone" maxlength="10" pattern="[0-9]+" required></td>
                    <td>名字：<input type="text" name="name" maxlength="10" required></td>
                    <td>地址：<input type="text" name="address" maxlength="40" required></td>
                </tr>
                <tr>
                    <td>Email：<input type="text" name="email" pattern="[a-z0-9]+@[a-z.]+" maxlength="25" required>（格式：[...]@[...]）</td>
                </tr>
                <tr>
                    <td>密碼：<input type="text" name="password" maxlength="30" pattern="[a-z0-9]+" required> </td>
                    <td>密碼確認：<input type="text" name="validatePsw" maxlength="30" pattern="[a-z0-9]+" required></td>
                </tr>
                <tr>
                    <td>
                        <p>身份：
                            <select id="ident" name="identity" onchange="changeExtraForm()">
                                <option value="00">校外人士</option>
                                <option value="01">學生</option>
                                <option value="10">教職員</option>
                            </select>
                    </td>
                </tr>
                <tr id="Outsider">
                    <td>統一編號：<input type="text" name="uniformNum" maxlength="8"></td>
                    <td>稅籍編號：<input type="text" name="taxSerialNum" maxlength="20"></td>
                    <td>公司：<input type="text" name="company" maxlength="20"></td>
                </tr>
                <tr id="Student" hidden>
                    <td>學號：<input type="text" name="studentID" maxlength="8" pattern="[ABLM][0-9]{7}">（格式：[ABLM]XXXXXX）</td>
                </tr>
                <tr id="Staff" hidden>
                    <td>教職員編號：<input type="text" name="staffID" maxlength="8"></td>
                </tr>
            </table>
            <p><input type="submit" value="註冊">
        </form>
    </div>
</body>


</html>