<?php
/*** Database credentials for local database.
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'brandao');
define('DB_PASSWORD', 'sistema');
define('DB_NAME', 'brindes');

***/

/*** Database credentials for test database */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'epontual_diogo');
define('DB_PASSWORD', 'epontual2018');
define('DB_NAME', 'epontual_teste');

/* Attempt to connect to MySQL database */
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}