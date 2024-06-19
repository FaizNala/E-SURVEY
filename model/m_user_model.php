<?php
class m_user
{
    public $db;
    protected $table = 'm_user';

    public function __construct()
    {
        include_once('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data)
    {
        // prepare statement untuk query insert
        $query = $this->db->prepare("insert into {$this->table} (username, nama, password) values(?,?,?)");

        // binding parameter ke query, "s" berarti string, "ss" berarti dua string
        $pass = password_hash($data['password'], PASSWORD_BCRYPT);
        $query->bind_param('sss', $data['username'], $data['nama'], $pass);

        // eksekusi query untuk menyimpan ke database
        $query->execute();
    }

    public function getData()
    {
        // query untuk mengambil data dari tabel m_user
        return $this->db->query("select * from {$this->table} ");
    }

    public function getDataById($id)
    {

        // query untuk mengambil data berdasarkan id
        $query = $this->db->prepare("select * from {$this->table} where user_id = ?");

        // binding parameter ke query "i" berarti integer. Biar tidak kena SQL Injection
        $query->bind_param('i', $id);

        // eksekusi query
        $query->execute();

        // ambil hasil query
        return $query->get_result();
    }

    public function updateData($id, $data)
    {
        // query untuk update data
        $query = $this->db->prepare("update {$this->table} set username = ?, nama = ?, password = ? where user_id = ?");

        // binding parameter ke query
        $query->bind_param('sssi', $data['username'], $data['nama'], password_hash($data['password'], PASSWORD_BCRYPT), $id);

        // eksekusi query
        $query->execute();
    }

    public function deleteData($id)
    {
        // query untuk delete data menggunakan multi_query untuk mengizinkan multiple statements
        $query = "
            SET FOREIGN_KEY_CHECKS = 0;
            DELETE FROM {$this->table} WHERE user_id = $id;
            SET FOREIGN_KEY_CHECKS = 1;
        ";
    
        // menggunakan multi_query untuk menjalankan beberapa pernyataan sekaligus
        if ($this->db->multi_query($query)) {
            do {
                // ini akan membuang hasil dari setiap query yang dieksekusi
                if ($result = $this->db->store_result()) {
                    $result->free();
                }
            } while ($this->db->more_results() && $this->db->next_result());
        } else {
            // menangani kesalahan
            throw new Exception("Error executing query: " . $this->db->error);
        }
    }
    
}