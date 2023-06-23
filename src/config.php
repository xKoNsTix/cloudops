<?php




if ($_SERVER['HTTP_HOST'] == 'cloudops.tokowa.at') {
    $DB_NAME = getenv('DB_NAME');
    $DB_USER = getenv('DB_USER');
    $DB_PASS = getenv('DB_PASS');
    $DB_HOST = getenv('DB_HOST');

    $DSN = "pgsql:dbname=$DB_NAME;host=$DB_HOST";

    echo "checkt webserver ist da";
} else {

    $DB_NAME = "norvi";
    $DB_USER = "postgres"; // fill in your local db-username here!!
    $DB_PASS = "jacksparrow"; // fill in password here!!
    $DSN     = "pgsql:dbname=$DB_NAME;host=localhost";
    echo "checkt webserver nicht";
}
