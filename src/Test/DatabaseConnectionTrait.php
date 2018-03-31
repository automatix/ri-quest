<?php
namespace App\Test;

use PDO;
use PHPUnit\DbUnit\Database\Connection;
use PHPUnit\DbUnit\InvalidArgumentException;

trait DatabaseConnectionTrait
{

    /**
     * @var array
     */
    static private $dbConfigs;
    /**
     * @var PDO
     */
    static private $pdo;
    /**
     * @var Connection
     */
    private $connection;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
    }

    /**
     * @return Connection
     */
    public function getConnection()
    {
        if (! $this->connection) {
            if (! self::$dbConfigs) {
                throw new InvalidArgumentException(
                    'Set the database configuration first.'
                    . ' '. 'Use the ' . self::class . '::setDbConfigs(...).'
                );
            }
            if (! self::$pdo) {
                self::$pdo = new PDO(
                    self::$dbConfigs['dsn'] . ';' . 'dbname=' . self::$dbConfigs['database'],
                    self::$dbConfigs['username'],
                    self::$dbConfigs['password'],
                    [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'']
                );
            }

            $test1 = self::$dbConfigs;
            $test2 = self::$dbConfigs['dsn'] . ';' . 'dbname=' . self::$dbConfigs['database'];

            $this->connection = $this->createDefaultDBConnection(self::$pdo, self::$dbConfigs['database']);
        }
        return $this->connection;
    }

    public static function setDbConfigs(array $dbConfigs)
    {
        self::$dbConfigs = $dbConfigs;
    }

    abstract protected function createDefaultDBConnection(PDO $connection, $schema = '');

}
