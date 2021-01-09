<html>

<?php

//nset($_SESSION['one']);
//echo $Usr_Name1;
require(dirname(__DIR__) . "/function/queryDB.php");


?>

<head>

    <meta charset="utf-8">
    <title>高大露營烤肉區租借系統</title>

</head>



<body>
    
    高大露營烤肉區租借系統<br>
    <br>
    <?php
        //取得User_Name
        session_start();
        echo "User:";
        $Usr_Name1 = $_SESSION['Usr_Name'];
        echo $Usr_Name1.'<br>';
    ?>
    <hr>
選擇要租借的場地：
<form method="post" action="applicant_2.php">
    <input type="submit" name="BBQ_ver" value="租借烤爐">
    <input type="submit" name="Camp_ver" value="租借營位">
</form>
</body>

</html>