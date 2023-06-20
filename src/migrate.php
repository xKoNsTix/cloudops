<?php

include 'db_functions.php';

$statements = [
    'CREATE TABLE IF NOT EXISTS visits (
        visit timestamp
    )'
];

try {
    $url = getenv("DATABASE_URL");
    $params = parse($url);
    $dsn = from_params($params);

    // make a database connection
    $pdo = new PDO($dsn, $params['user'], $params['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    foreach ($statements as $statement) {
        $pdo->exec($statement);
    }
} catch (PDOException $e) {
    die($e->getMessage());
} finally {
    $pdo = null;
}

