<?php

function getConfig(): array
{
    return [
        'db_host' => '127.0.0.1',
        'db_port' => '3306',
        'db_database' => 'plancy',
        'db_user' => 'root',
        'db_password' => 'root',
        'db_charset' => 'utf8mb4',
    ];
}

function getConnection(): \PDO
{
    $config = getConfig();
    $options = [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    ];
    $dsn = "mysql:host={$config['db_host']};dbname={$config['db_database']};charset={$config['db_charset']};port={$config['db_port']}";
    try {
        $pdo = new \PDO($dsn, $config['db_user'], $config['db_password'], $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }

    return $pdo;
}