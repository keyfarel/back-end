<?php 

class LettersModel{
    private $table = 'letters';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllLetter(){
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
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

    public function getLetterById($id) {
        $this->db->query('SELECT file_url FROM ' . $this->table . ' WHERE letter_id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
    
    public function updateStatusLetter($id, $status){
        $this->db->query('UPDATE ' . $this->table . ' SET status = :status WHERE letter_id = :id ');
        $this->db->bind(':status', $status) ;
        $this->db->bind(':id', $id);
        $this->db->execute();
        $rowcount = $this->db->rowCount();
        if ($rowcount > 0) {
            return $rowcount;  // Jika ada baris yang terpengaruh, kembalikan jumlahnya
        } else {
            return 0;  // Jika tidak ada baris yang terpengaruh
        }
    }

}