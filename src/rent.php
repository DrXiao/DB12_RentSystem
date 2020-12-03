<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Rent System Web - RentClient</title>
    </head>
    <body>
        <?php
            include("./config.php");
            $db = pg_connect($DATABASE_URL);
            
            if (!$db) {
                echo "Error<br>";
            } else {
                echo "Successful<br>";
            }

            $query = <<<EOF
                Select * From SystemUser;
            EOF;
            
            $returnTable = pg_query($db, $query);

            if(!$returnTable) {
                echo pg_last_error($db);
                exit;
            }
            while($row = pg_fetch_row($returnTable)) {
                $num = count($row);
                for($i = 0; $i < $num; $i += 1) {
                    echo $row[$i];
                    echo " <br>";
                }
            }
            echo "End<br>";
            pg_close($db);
        ?>
    </body>
</html>