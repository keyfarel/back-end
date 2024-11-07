<?php

namespace app\core;
//untuk data wrapper dibuat supaya bisa menggunakan query create update delete berulang kali di setiap table
use PDO;

class Database
{
    private string $host = DB_HOST;
    private string $user = DB_USER;
    private string $pass = DB_PASS;
    private string $db_name = DB_NAME;

    private PDO $dbh;
    private $stmt;

    public function __construct()
    {
        //data source name
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

        //optimasi databse
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        //cek sambungan database
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


    //
    public function query($query): void
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null): void
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    //menjalankan query
    //ini adalah funtion buatan sendir
    public function execute(): void
    {
        $this->stmt->execute();//ini adalah function pdo
    }

    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    {
        // Mengembalikan jumlah baris yang terpengaruh oleh operasi terakhir
        return $this->stmt->rowCount();
    }
}