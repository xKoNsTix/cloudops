<?php




if ($_SERVER['HTTP_HOST'] == 'cloudops.tokowa.at') {
    $DB_NAME = "norvi_db";
    $DB_USER = "postgres";
    $DB_PASS = "004dabac018008f7a6b497cdea9f8543";  // fill in password here!!
    $DSN     = "pgsql:dbname=$DB_NAME;host=localhost";
} else {

    $DB_NAME = "norvi";
    $DB_USER = "postgres"; // fill in your local db-username here!!
    $DB_PASS = "jacksparrow"; // fill in password here!!
    $DSN     = "pgsql:dbname=$DB_NAME;host=localhost";
}
