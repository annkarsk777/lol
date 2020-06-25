<?php
declare(strict_types=1);

namespace App\Models;

class Db
{
    /**
     * @var $dbh
     */
    private static $dbh;

    /**
     * @return \PDO
     */
    public static function getDbh(): \PDO
    {
        if (null === self::$dbh) {
            try {
                self::$dbh = new \PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS, [
                    \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8",
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
                ]);
            } catch (\PDOException $e) {
                echo 'connection error: ' . $e->getMessage();
            }
        }

        return self::$dbh;
    }
}