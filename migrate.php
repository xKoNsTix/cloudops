<?php

include 'db_functions.php';

$statements = [
    'CREATE TABLE IF NOT EXISTS images (
        image_id serial PRIMARY KEY,
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
        FOREIGN KEY (image_owner) REFERENCES users(username)
    )',
    'CREATE TABLE IF NOT EXISTS likes (
        like_id serial PRIMARY KEY,
        fk_image_id integer,
        fk_image_owner character varying(256),
        FOREIGN KEY (fk_image_id) REFERENCES images(image_id),
        FOREIGN KEY (fk_image_owner) REFERENCES users(username)
    )',
    'CREATE TABLE IF NOT EXISTS users (
        user_id serial PRIMARY KEY,
        username character varying(25) NOT NULL,
        name character varying(25) NOT NULL,
        email character varying(320) NOT NULL,
        password character varying(256) NOT NULL,
        vkey character varying(256) NOT NULL,
        verified boolean DEFAULT false,
        created_at timestamp without time zone DEFAULT now(),
        updated_at timestamp without time zone DEFAULT now(),
        UNIQUE (email),
        UNIQUE (name)
    )'
];

try {
    $DB_NAME = getenv('DB_NAME');
    $DB_USER = getenv('DB_USER');
    $DB_PASS = getenv('DB_PASS');
    $DB_HOST = getenv('DB_HOST');

    // make a database connection
    $db = new PDO($DSN, $DB_USER, $DB_PASS);

    foreach ($statements as $statement) {
        $pdo->exec($statement);
    }

    echo "Tables created successfully.";
} catch (PDOException $e) {
    die($e->getMessage());
} finally {
    $pdo = null;
}
