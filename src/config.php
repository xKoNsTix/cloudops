<?php




if ($_SERVER['HTTP_HOST'] == 'cloudops.tokowa.at') {
    $DB_NAME = "norvi_db";
    $DB_USER = "postgres";
    $DB_PASS = "bilke123";  // fill in password here!!
    $DSN     = "pgsql:dbname=$DB_NAME;host=localhost";
    echo "checkt webserver ist da";
} else {

    $DB_NAME = "norvi";
    $DB_USER = "postgres"; // fill in your local db-username here!!
    $DB_PASS = "jacksparrow"; // fill in password here!!
    $DSN     = "pgsql:dbname=$DB_NAME;host=localhost";
    echo "checkt webserver nicht";

}
// // make a database connection
// try {
//     $pdo = new PDO($DSN, $DB_USER, $DB_PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

//     // Run your database operations here

//     echo "Database connection successful.";
// } catch (PDOException $e) {
//     die($e->getMessage());
// } finally {
//     $pdo = null;
// }

