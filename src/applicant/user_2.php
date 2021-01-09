<html>

<?php
    require(dirname(__DIR__) . "/function/queryDB.php");
?>

<head>

    <meta charset="utf-8">
    <title>個人資料</title>

</head>



<body>
<?php

    $db = pg_connect(getenv("DATABASE_URL"));

    session_start();
    echo "User:";
    $Usr_Name1 = $_SESSION['Usr_Name'];
    echo $Usr_Name1.'<br>';
    $Usr_find = <<<EOF
            select * from SystemUser where '$Usr_Name1'=SystemUser.su_name;
    EOF;
    $Usr_query = GetQueryTable($Usr_find);


    
    echo '<hr>';
    if(strlen($_POST['phone'])){
        $Uph=$_POST['phone'];
    }
    else{
        $Uph=$_POST['Uph'];
    }
    if(strlen($_POST['name'])){
        $Usu=$_POST['name'];
    }
    else{
        $Usu=$_POST['Usu'];
    }
    if(strlen($_POST['email'])){
        $Uem=$_POST['email'];
    }
    else{
        $Uem=$_POST['Uem'];
    }
    if(strlen($_POST['password'])){
        $Upa=$_POST['password'];
    }
    else{
        $Upa=$_POST['Upa'];
    }
    if(strlen($_POST['address'])){
        $Uad=$_POST['address'];
    }
    else{
        $Uad=$_POST['Uad'];
    }
    
    echo $Uph;
    echo $Usu;
    echo $Uem;
    echo $Upa;
    echo $Uad;

    $Up=  <<<EOF
        update SystemUser 
        set "phone"='$Upa',"su_name"='$Usu',"email"='$Uem',"su_password"='$Upa',"address"='$Uad'
        where '$Usr_Name1'=su_name;
    EOF;
    
    $query = GetQueryTable($Up);

    pg_close($db);
?>

<form method="post" action="../index.php">
    <input type="submit" value="回首頁">
</form>


</body>

</html>