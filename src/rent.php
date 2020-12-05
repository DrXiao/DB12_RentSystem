<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Rent System Web - RentClient</title>
    </head>
    <body>
        <p>hello world
        <?php

            $db = pg_connect(getenv("DATABASE_URL"));
            // NULL => 空值

            if (!$db) {
                echo "Error<br>";
            } else {
                echo "Successful<br>";
            }

            $query = <<<EOF
                Select Account, SU_Password, SU_Name From SystemUser;
            EOF;
            
            $returnTable = pg_query($db, $query);

            if(!$returnTable) {
                echo pg_last_error($db);
                exit;
            }

            while($row = pg_fetch_row($returnTable)) {
                $num = count($row);
                if($_POST["account"] == $row[0] && $_POST["password"] == $row[1]) {
                    echo "Hello $row[2]<br>";
                }
                else {
                    echo "Not fit<br>";
                }
            }
            echo "End<br>";
            pg_close($db);
        ?>
    </body>
</html>