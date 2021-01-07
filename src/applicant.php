<html>

<?php
//session值的讀取:

//session值的銷燬
//nset($_SESSION['one']);
//echo $Usr_Name1;
require(dirname(__DIR__) . "/src/function/queryDB.php");
// 登入檢查
$query = <<<EOF
            Select Account, SU_Password From SystemUser;
        EOF;
// 用 $query 的請求，檢查 $_POST 是否存在，且帳號密碼有存在於 SystemUser 裡面
LoginCheck($_POST, $query);


?>

<head>

    <meta charset="utf-8">
    <title>高大露營烤肉區租借系統</title>

</head>



<body>



    高大露營烤肉區租借系統<br>
    <br>User:
    <?php
        //取得User_Name
        $Usr_Ac=$_POST['account'];

        $Usr_find = <<<EOF
            Select * From SystemUser;
        EOF;
        $Usr_query = GetQueryTable($Usr_find);


        while($row = pg_fetch_row($Usr_query)) {
            $fieldNumber = count($row);
            if($row[0]==$Usr_Ac)
                $Usr_Name=$row[3];
        }



        session_start();
        $_SESSION['Usr_Name']=$Usr_Name;

        echo $Usr_Name;
    ?>
    <hr>
選擇要租借的場地：
<form method="post" action="applicant_2.php">
    <input type="submit" name="BBQ_ver" value="租借烤爐">
    <input type="submit" name="Camp_ver" value="租借營位">
</form>
</body>

</html>