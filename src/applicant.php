<html>

<?php
require(dirname(__DIR__) . "/src/function/queryDB.php");
// 登入檢查

// 用 $query 的請求，檢查 $_POST 是否存在，且帳號密碼有存在於 SystemUser 裡面
LoginCheck();

?>

<head>

    <meta charset="utf-8">
    <title>高大露營烤肉區租借系統</title>

</head>



<body>

    高大露營烤肉區租借系統<br>
    <table border=1 width="100%">


        <tr>
            <td align="center">總人數：<input type=text maxlength="10" size="10" name="PNum"></td>

        <tr>
            <td align="center">借用時間及時段:<input type=date name="Dates"></td>

        <tr>
            <td align="center">烤肉爐:<input type=text maxlength="2" size="2" name="BBQ">個(一爐限十人內使用)
                借用時段<input type=text maxlength="2" size="2" name="SHr">:
                <input type=text maxlength="2" size="2" name="SMin">~
                <input type=text maxlength="2" size="2" name="EHr">:
                <input type=text maxlength="2" size="2" name="EMin">(提供水電、洗手間)</td>

        <tr>
            <td align="center">營位:<input type=text maxlength="2" size="2" name="BBQ">個:12：30~翌日11：30 (提供水電、洗手間、夜間照明及沐浴熱水)</td>

        <tr>
            <td align="left">備註:</td>

        <tr>
            <td align="left">1.1時段為4小時．若有特殊需求，請洽事務組 07-5919094。</td>

        <tr>
            <td align="left">2.若是校外人士租借，汽車停車收費方式(請先自備場地繳費收據正本或影本，並於進校園時出示給警衛室)：將以日計費/每台車收30元。</td>

        <tr>
            <td align="center">
                <input value="申請" type="submit">
                <input value="清除" type="reset"></td>
        </tr>

</body>

</html>