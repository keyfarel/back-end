<?php 

class LettersModel{
    private $table = 'letters';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function addLetter($data, $fileName){
        $query = "INSERT INTO letters(title, file_url, status, user_id)
                    VALUES 
                    (:title, :file_url, :status, :user_id)";

        $this->db->query($query);
        $this->db->bind(":title", $data["researchTitle"]);
        $this->db->bind(":file_url", $fileName);
        $this->db->bind(":status", 1);
        $this->db->bind(":user_id", (int) $data["user_id"]);

        $this->db->execute();

        return $this->db->rowCount();
    }
}