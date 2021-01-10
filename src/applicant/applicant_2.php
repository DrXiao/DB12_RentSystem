<html>

<head>

    <meta charset="utf-8">
    <title>高大露營烤肉區租借系統</title>

</head>



<body>



    高大露營烤肉區租借系統<br>

    <?php
        session_start();
        echo "User:";
        $Usr_Name1 = $_SESSION['Usr_Name'];
        echo $Usr_Name1.'<br>';


        if($_POST['BBQ_ver']){
            $Place_ver=1;
        }
        else{
            $Place_ver=2;
        }
    ?>
    <hr>

<form method="post" action="applicant_3.php">
    總人數：<input type=text maxlength="10" size="10" name="PNum">
    <br>(一個烤爐最多10個人)<br>
    <br>借用時間及時段:<br>
    <input type=string name="App_Year">年（西元）
    <input type=string name="App_Month">月
    <input type=string name="App_Day">日
    <?php
        if($Place_ver==1){
            ?>
            <input type=string name="App_Hour">時
            <input type=string name="App_Minute">分
            <br>
            <input type="submit" name="BBQ_Time" value="下一步">
            <?php
        }
        else{
            ?>
            <br>
            <input type="submit" name="Camp_Time" value="下一步">
            <?php
        }
    ?>
    
</form>
</body>

</html>