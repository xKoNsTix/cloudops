<?php

include 'db_functions.php';

try {
    $url = getenv("DATABASE_URL");
    $params = parse($url);
    $dsn = from_params($params);

    // make a database connection
    $pdo = new PDO($dsn, $params['user'], $params['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    $pdo->exec('INSERT INTO visits VALUES (\'' . date('Y-m-d H:i:s') . '\');');
        
    $result = $pdo->query('SELECT COUNT(visit) AS number FROM visits;')->fetch();
    echo 'We have ' . $result['number'] . ' visitors so far';
} catch (PDOException $e) {
    die($e->getMessage());
} finally {
    $pdo = null;
}
