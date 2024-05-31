<?php
class t_jawaban_mahasiswa {
    public $db;
    protected $table = 't_jawaban_mahasiswa';

    public function __construct($db) {
        include_once('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }
    public function insertData($data) {
        // Prepare statement for insert query
        $query = $this->db->prepare("INSERT INTO {$this->table} (soal_id, jawaban) VALUES (?, ?)");

        // Loop through the data to insert multiple rows
        foreach ($data as $soal_id => $jawaban) {
            // Bind parameters to the query, "si" means string and integer
            $query->bind_param('is', $soal_id, $jawaban);
            // Execute query to save to the database
            $query->execute();
        }
    }
    

    public function getData() {
        // Query to fetch data from the table
        return $this->db->query("SELECT * FROM {$this->table}");
    }

    public function getDataById($id) {
        // Query to fetch data based on ID
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE jawaban_mahasiswa_id = ?");
        // Bind parameter to the query, "i" means integer
        $query->bind_param('i', $id);
        // Execute query
        $query->execute();
        // Fetch result
        return $query->get_result();
    }

    public function updateData($id, $data) {
        // Query to update data
        $query = $this->db->prepare("UPDATE {$this->table} SET jawaban = ? WHERE jawaban_mahasiswa_id = ?");
        // Bind parameters to the query
        $query->bind_param('si', $data['jawaban'], $id);
        // Execute query
        $query->execute();
    }

    public function deleteData($id) {
        // Query to delete data
        $query = $this->db->prepare("DELETE FROM {$this->table} WHERE jawaban_mahasiswa_id = ?");
        // Bind parameter to the query
        $query->bind_param('i', $id);
        // Execute query
        $query->execute();
    }
}
?>
