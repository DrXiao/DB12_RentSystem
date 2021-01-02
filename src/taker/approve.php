<html>
<?php
  require(dirname(__DIR__) . "/function/queryDB.php");
?>
<head>
</head>

<body>
<?php
  $details=$_COOKIE['id'];
  if($_GET["action"]=="ok"){
    $sql_query = "UPDATE RentRecord SET AdmitFlag='1' WHERE No= $details";
    $db = pg_connect(getenv("DATABASE_URL"));
    pg_query($db ,$sql_query);
    pg_close($db);
    echo '<p>完成，請回上一頁';
    setcookie("id","");
  }
?>
</body>
</html>
