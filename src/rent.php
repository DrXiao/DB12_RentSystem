<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Rent System Web - RentClient</title>
    </head>
    <body>
        <?php
            $host = "host=ec2-52-20-248-222.compute-1.amazonaws.com";
            $port = "port=5432";
            $dbname = "ded5rsvcdg3lgk";
            $userInfo = "user=bnyojzfovtnuth password=7c25dceccb34298445b4f983a04ca8a74d704a989f68faca7ca89e6793fc1b65";

            $db = pg_connect("$host $port $dbname $userInfo");
            if(!$db) {
                echo "Error! Cannot connect!\n";
            }
            else {
                echo "Get Database!\n";
            }
            pg_close($db);
        ?>
    </body>
</html>