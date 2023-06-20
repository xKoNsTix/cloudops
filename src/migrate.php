<?php

// Path to the SQL file
$sqlFilePath = 'norvi_dump.sql';

try {
    $url = getenv("DATABASE_URL");
    $params = parse_url($url);

    // Generate DSN from params
    $dsn = "{$params['scheme']}:host={$params['host']};dbname=".ltrim($params['path'], '/');

    // make a database connection
    $pdo = new PDO($dsn, $params['user'], $params['pass'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    // Check if SQL file exists
    if (file_exists($sqlFilePath)) {
        // Read SQL file
        $sql = file_get_contents($sqlFilePath);

        // Execute SQL file
        $pdo->exec($sql);
    } else {
        die("SQL file not found: $sqlFilePath");
    }
} catch (PDOException $e) {
    die($e->getMessage());
} finally {
    $pdo = null;
}

