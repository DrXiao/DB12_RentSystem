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
    //$fieldNumber = count($row);
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
echo "烤爐 :".count($tag1)." 個<br>";
echo "營位 :".count($tag2)." 個<br>";

$price=(count($tag1)+count($tag2))*$Pay;

echo "共 ".$price." 元<br>";

?>

<form method="post" action="applicant_5.php">
<input type="button" name="action" value="確認送出">
</form>
    
<?php
    if (isset($_POST['action'])){
        for($i=0;$i<sizeof($tag1);$i++){
            //sql update
        }
        for($i=0;$i<sizeof($tag2);$i++){
            //sql update
        }
    }

    session_start();
    nset($_SESSION['one']);
?>

</body>

</html>