<html>

<?php
require(dirname(__DIR__) . "/function/queryDB.php");// 登入檢查

?>

<head>
<title>校外人士修改完成</title>
</head>

<body>

<?php
    $details=$_POST['ID'];
    $phone=$_POST["phone"];
    $email=$_POST["email"];
    $address=$_POST["address"];
    $uniformnumber=$_POST["uniformnumber"];
    $taxserialnumber=$_POST["taxserialnumber"];
    $company=$_POST["company"];
    //echo $details.'<br>'.$phone.'<br>'.$email.'<br>'.$address.'<br>'.$uniformnumber.'<br>'.$taxserialnumber.'<br>'. $company.'<br>';
    $sql_query = "UPDATE SystemUser SET Phone='".$phone."',Email='".$email."',Address='".$address."' WHERE Account = '".$details."'";
    $db = pg_connect(getenv("DATABASE_URL"));
    pg_query($db ,$sql_query);
    $sql_query = "UPDATE Outsider SET UniformNumbers='".$uniformnumber."',TaxSerialNumber='".$taxserialnumber."',Company='".$company."' WHERE Account = '".$details."'";
    $db = pg_connect(getenv("DATABASE_URL"));
    pg_query($db ,$sql_query);
    pg_close($db);
    echo '<p>完成，請回上一頁';
    echo '<form method="POST" action="renter_file.php">';
    //echo '<input type="hidden" name="account" value="'.$_POST["ac"].'">';
    //echo '<input type="hidden" name="password" value="'.$_POST["psd"].'">';
    echo '<td align="center"><input type="submit" name="submit" value="回到校外人士、學生資料">';
    echo '</form>';
?>

</body>

</html>