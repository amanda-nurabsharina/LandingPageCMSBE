<?php
$host = getenv('DB_HOST') ?: '127.0.0.1';
$port = getenv('DB_PORT') ?: '3306';
$user = getenv('DB_USERNAME') ?: 'root';
$pass = getenv('DB_PASSWORD') ?: '';
$db   = getenv('DB_DATABASE') ?: 'forge';

echo "Waiting for database connection to $host:$port...\n";
for ($i = 0; $i < 30; $i++) {
    try {
        $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_TIMEOUT => 2
        ]);
        echo "Database connection established!\n";
        exit(0);
    } catch (PDOException $e) {
        echo "Database connection failed. Retrying in 2 seconds...\n";
        sleep(2);
    }
}
echo "Database connection timeout!\n";
exit(1);
