<?php
class Gallery {
    private $db;
    private $table = 'galleries';

    public function __construct($db) {
        $this->db = $db;
    }

    // Create a new gallery entry
    public function create($image, $category, $title, $status, $uploaded_by) {
        $query = "INSERT INTO " . $this->table . " (image, category, title, status, uploaded_by, created_at)
                  VALUES (:image, :category, :title, :status, :uploaded_by, GETDATE())";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':uploaded_by', $uploaded_by);

        return $stmt->execute();
    }

    // Read all gallery entries
    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Read a specific gallery entry by ID
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE gallery_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update a gallery entry
    public function update($id, $image, $category, $title, $status) {
        $query = "UPDATE " . $this->table . "
                  SET image = :image, category = :category, title = :title, status = :status
                  WHERE gallery_id = :id";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':status', $status);

        return $stmt->execute();
    }

    // Delete a gallery entry
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE gallery_id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
