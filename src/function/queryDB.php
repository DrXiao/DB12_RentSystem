<?php
function LoginCheck($_outerPOST, $query)
{
    if ($_POST) {

        $db = pg_connect(getenv("DATABASE_URL"));
        // NULL => 空值

        if (!$db) {
            exit();
        }

        $returnTable = pg_query($db, $query);

        if (!$returnTable) {
            echo pg_last_error($db);
            exit();
        }
        pg_close($db);

        $isUser = false;
        while ($row = pg_fetch_row($returnTable)) {
            $num = count($row);
            if ($_POST["account"] == $row[0] && $_POST["password"] == $row[1]) {
                $isUser = true;
            }
        }
        if (!$isUser) {
            echo "<h3 style=\"color: red;\">帳號登入錯誤！<h3>";
            exit();
        }
    } else {
        echo "<h3 style=\"color: red;\">非正常登入行為！<h3>";
        exit();
    }
}

function GetQueryTable($query)
{
    $db = pg_connect(getenv("DATABASE_URL"));

    if (!$db) {
        exit();
    }

    $returnTable = pg_query($db, $query);

    if (!$returnTable) {
        echo pg_last_error($db);
        exit();
    }
    pg_close($db);

    return $returnTable;
}
