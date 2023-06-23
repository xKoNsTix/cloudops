<?php

include 'db_functions.php';

$statements = [
    'CREATE TABLE IF NOT EXISTS images (
        image_id integer NOT NULL,
        image_title character varying(256),
        file_name character varying(256) NOT NULL,
        image_owner character varying(256),
        nd_filter_used character varying(256) NOT NULL,
        cpol_used character varying(256) NOT NULL,
        motive_coordinates character varying(256) NOT NULL,
        creator_coordinates character varying(256) NOT NULL,
        recommended_weather character varying(256) NOT NULL,
        additional_information character varying(512) NOT NULL,
        location_type character varying(512) NOT NULL,
        uploaded_at timestamp without time zone DEFAULT now(),
        PRIMARY KEY (image_id),
        FOREIGN KEY (image_owner) REFERENCES users(username)
    )',
    'CREATE TABLE IF NOT EXISTS likes (
        fk_image_id integer,
        fk_image_owner character varying(256),
        FOREIGN KEY (fk_image_id) REFERENCES images(image_id),
        FOREIGN KEY (fk_image_owner) REFERENCES users(username)
    )',
    'CREATE TABLE IF NOT EXISTS users (
        user_id integer NOT NULL,
        username character varying(25) NOT NULL,
        name character varying(25) NOT NULL,
        email character varying(320) NOT NULL,
        password character varying(256) NOT NULL,
        vkey character varying(256) NOT NULL,
        verified boolean DEFAULT false,
        created_at timestamp without time zone DEFAULT now(),
        updated_at timestamp without time zone DEFAULT now(),
        PRIMARY KEY (username),
        UNIQUE (email),
        UNIQUE (name)
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
