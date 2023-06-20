<?php




if ($_SERVER['HTTP_HOST'] == 'users.multimediatechnology.at') {
    $DB_NAME = "norvi";
    $DB_USER = "fhs44559";
    $DB_PASS = "xwzNygbqgxJB";  // fill in password here!!
    $DSN     = "pgsql:dbname=$DB_NAME;host=localhost";
} else {

    $DB_NAME = "norvi";
    $DB_USER = "postgres"; // fill in your local db-username here!!
    $DB_PASS = "jacksparrow"; // fill in password here!!
    $DSN     = "pgsql:dbname=$DB_NAME;host=localhost";
}
