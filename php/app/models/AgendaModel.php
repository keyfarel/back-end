<?php 

class AgendaModel{
    private $table = 'agenda';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllAgenda(){
        $this->db->query('
            SELECT 
                agenda.agenda_id, 
                agenda.title, 
                category.category AS category_name, 
                agenda.deskripsi, 
                agenda.date, 
                agenda.roadmap_id, 
                agenda.created_by
            FROM 
                agenda
            INNER JOIN 
                category
            ON 
                agenda.category = category.id
            ;
        ');
        return $this->db->resultSet();
    }
}