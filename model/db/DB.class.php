<?php
namespace model\db;

class DB {
    const SERVER = 'localhost';
    const DATABASE = 'estukalov';
    const USER = 'estukalov';
    const PASSWORD = 'neto1205';

    function getDBConnect ()
    {

        try {
            $pdo = new \PDO('mysql:host='.self::SERVER.';dbname='.self::DATABASE.';charset=utf8', self::USER, self::PASSWORD);
        }
        catch (\PDOException $e) {
            throw new \Exception('Ошибка подключения к базе данных');
        }

        return $pdo;
    }
}