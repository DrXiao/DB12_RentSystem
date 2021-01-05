<html>

<?php
require(dirname(__DIR__) . "/src/function/queryDB.php");
?>

<head>

    <meta charset="utf-8">
    <title>高大露營烤肉區租借系統</title>

</head>



<body>

    高大露營烤肉區租借系統<br>
<?php
session_start();
echo "User:";
$Usr_Name = $_SESSION['Usr_Name'];
echo $Usr_Name.'<br>';

$Usr_find = <<<EOF
        Select * From SystemUser;
EOF;
$Usr_query = GetQueryTable($Usr_find);


while($row = pg_fetch_row($Usr_query)) {
    $fieldNumber = count($row);
    if($row[3]==$Usr_Name)
        $Usr_ident=$row[2];
}

if($Usr_ident=='00')
    $Pay=600;
else
    $Pay=300;

$tag1 = $_POST['BBQ_Place'];
$tag2 = $_POST['Camp_Place'];
$cnt_BBQ=0;
$cnt_Camp=0;
echo count($tag1).'<br>';
echo count($tag2).'<br>';

$price=(count($tag1)+count($tag2))*$Pay;
echo $price."給錢";
?>
    

</body>

</html>