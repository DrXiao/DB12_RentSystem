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
                echo "Error\n";
            } else {
                echo "Successful\n";
            }
            
            pg_close($db);
        ?>
    </body>
</html>