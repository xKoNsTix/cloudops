<?php
if ($_SERVER['HTTP_HOST'] == 'cloudops.tokowa.at') {
    $DB_NAME = getenv('DB_NAME');
    $DB_USER = getenv('DB_USER');
    $DB_PASS = getenv('DB_PASS');
    $DB_HOST = getenv('DB_HOST');

    $DSN = "pgsql:dbname=$DB_NAME;host=$DB_HOST";
    try {
        $db = new PDO($DSN, $DB_USER, $DB_PASS);
        $currentDir = getcwd();
        echo "<p style='color: white;'> Hallo Andi. This is an UNRELEASED VERSION. You're currently in the directory: $currentDir . #linuxistcool </p>";
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
} else {
    echo "FAIL TO ESTABLISH HOST";
}
