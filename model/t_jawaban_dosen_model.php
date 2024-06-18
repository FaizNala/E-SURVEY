<?php
class t_jawaban_dosen
{
    public $db;
    protected $table = 't_jawaban_dosen';

    public function __construct()
    {
        include('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data)
    {
        // prepare statement untuk query insert
        $query = $this->db->prepare("INSERT INTO {$this->table} (responden_dosen_id, soal_id, jawaban) VALUES (?, ?, ?)");

        // binding parameter ke query, "iis" berarti integer, integer, string
        $query->bind_param('iis', $data['responden_dosen_id'], $data['soal_id'], $data['jawaban']);

        // eksekusi query untuk menyimpan ke database
        $query->execute();

        // Tutup statement setelah selesai
        $query->close();
    }

    public function getData()
    {
        // query untuk mengambil data dari tabel t_jawaban_dosen
        return $this->db->query("SELECT * FROM {$this->table}");
    }

    public function getDataById($id)
    {
        // query untuk mengambil data berdasarkan id
        $query = $this->db->prepare("SELECT * FROM {$this->table} WHERE responden_dosen_id = ?");

        // binding parameter ke query "i" berarti integer. Biar tidak kena SQL Injection
        $query->bind_param('i', $id);

        // eksekusi query
        $query->execute();

        // ambil hasil query
        $result = $query->get_result();

        // Tutup statement setelah selesai
        $query->close();

        return $result;
    }

    public function updateData($id, $data)
    {
        // query untuk update data
        $query = $this->db->prepare("UPDATE {$this->table} SET jawaban = ? WHERE t_jawaban_dosen_id = ?");

        // binding parameter ke query
        $query->bind_param('si', $data['jawaban'], $id);

        // eksekusi query
        $query->execute();

        // Tutup statement setelah selesai
        $query->close();
    }

    public function deleteData($id)
    {
        // query untuk delete data
        $query = $this->db->prepare("DELETE FROM {$this->table} WHERE t_jawaban_dosen_id = ?");

        // binding parameter ke query
        $query->bind_param('i', $id);

        // eksekusi query
        $query->execute();

        // Tutup statement setelah selesai
        $query->close();
    }

    public function getNamebyId($id)
    {
        // query untuk mengambil data berdasarkan id
        $query = $this->db->prepare("SELECT r.responden_nama FROM {$this->table} t JOIN t_responden_dosen r ON t.responden_dosen_id = r.responden_dosen_id WHERE t.responden_dosen_id = ?");

        // binding parameter ke query "i" berarti integer. Biar tidak kena SQL Injection
        $query->bind_param('i', $id);
        $query->execute();

        $result = $query->get_result();
        $row = $result->fetch_assoc();

        return $row['responden_nama'];
    }
}