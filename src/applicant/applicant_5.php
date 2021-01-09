<html>
<head>
    <meta charset="utf-8">
    <title>高大露營烤肉區租借系統</title>
</head>
<body>
<?php

    //PayFlag
    $Pay=$_POST['PayFlag'];
    if($Pay==1){
        echo "already pay<br>";
    }
    else{
        echo "not pay<br>";
    }
?>

    <form method="post" action="../index.php">
        <input type="submit" value="回首頁">
    </form>

</body>
</html>