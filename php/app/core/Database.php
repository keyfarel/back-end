<?php
//
////untuk data wrapper dibuat supaya bisa menggunakan query create update delete berulang kali di setiap table
//    class Database{
//    private $host = DB_HOST;
//    private $user = DB_USER;
//    private $pass = DB_PASS;
//    private $db_name = DB_NAME;
//
//    private $dbh;
//    private $stmt;
//
//    public function __construct(){
//        //data source name
//        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
//
//        //optimasi databse
//        $option = [
//            PDO::ATTR_PERSISTENT => true,
//            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
//        ];
//
//        //cek sambungan database
//        try {
//            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
//        } catch (PDOException $e) {
//            die($e->getMessage());
//        }
//    }
//
//
//    //
//    public function query($query){
//        $this->stmt = $this->dbh->prepare($query);
//    }
//
//    public function bind($param, $value, $type = null){
//        if (is_null($type)) {
//            switch(true){
//                case is_int($value) :
//                    $type = PDO::PARAM_INT;
//                    break;
//                case is_bool($value) :
//                    $type = PDO::PARAM_BOOL;
//                    break;
//                case is_null($value) :
//                    $type = PDO::PARAM_NULL;
//                    break;
//                default :
//                    $type = PDO::PARAM_STR;
//            }
//        }
//
//        $this->stmt->bindValue($param, $value, $type);
//    }
//
//    //menjalankan query
//    //ini adalah funtion buatan sendir
//    public function execute(){
//        $this->stmt->execute();//ini adalah function pdo
//    }
//
//    public function resultSet(){
//        $this->execute();
//        return $this->stmt->fetchALL(PDO::FETCH_ASSOC);
//    }
//
//    public function single(){
//        $this->execute();
//        return $this->stmt->fetch(PDO::FETCH_ASSOC);
//    }
//
//    public function rowCount(){
//        // Mengembalikan jumlah baris yang terpengaruh oleh operasi terakhir
//        return $this->stmt->rowCount();
//    }
//}

 class Database {
     private $host = DB_HOST;
     private $user = DB_USER;
     private $pass = DB_PASS;
     private $db_name = DB_NAME;

     private $dbh;
     private $stmt;

     public function __construct() {
         // Data Source Name untuk SQL Server
         $dsn = "sqlsrv:Server=" . $this->host . ";Database=" . $this->db_name;

         // Opsi koneksi (tanpa ATTR_PERSISTENT)
         $options = [
             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
         ];

         // Cek sambungan ke database
         try {
             $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
         } catch (PDOException $e) {
             die("Connection failed: " . $e->getMessage());
         }
     }

     public function query($query) {
         $this->stmt = $this->dbh->prepare($query);
     }

     public function bind($param, $value, $type = null) {
         if (is_null($type)) {
             switch (true) {
                 case is_int($value):
                     $type = PDO::PARAM_INT;
                     break;
                 case is_bool($value):
                     $type = PDO::PARAM_BOOL;
                     break;
                 case is_null($value):
                     $type = PDO::PARAM_NULL;
                     break;
                 default:
                     $type = PDO::PARAM_STR;
             }
         }
         $this->stmt->bindValue($param, $value, $type);
     }

     public function execute() {
         try {
             return $this->stmt->execute();
         } catch (PDOException $e) {
             error_log("Database Error: " . $e->getMessage());
             return false;
         }
     }


     public function resultSet() {
         $this->execute();
         return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
     }

     public function single() {
         $this->execute();
         return $this->stmt->fetch(PDO::FETCH_ASSOC);
     }

     public function rowCount() {
         return $this->stmt->rowCount();
     }
 }
