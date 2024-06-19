<?php
class t_responden_industri
{
    public $db;
    protected $table = 't_responden_industri';

    public function __construct()
    {
        include('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data)
    {
        // prepare statement untuk query insert
        $query = $this->db->prepare("insert into {$this->table} (survey_id, responden_tanggal, responden_nama, responden_jabatan, responden_perusahaan, responden_email, responden_hp, responden_kota) values(?,?,?,?,?,?,?,?)");

        // binding parameter ke query, "s" berarti string, "ss" berarti dua string
        $query->bind_param('isssssss', $data['survey_id'], $data['responden_tanggal'], $data['responden_nama'], $data['responden_jabatan'], $data['responden_perusahaan'], $data['responden_email'], $data['responden_hp'], $data['responden_kota']);

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
        $query = $this->db->prepare("select * from {$this->table} where responden_industri_id = ?");

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
        $query = $this->db->prepare("update {$this->table} set responden_tanggal = ?, respondem_nama = ?, responden_jabatan = ?, responden_perusahaan = ? , responden_email = ?, responden_hp = ?, responden_kota = ? where responden_industri_id = ?");

        // binding parameter ke query
        $query->bind_param('sssssssi', $data['responden_tanggal'], $data['responden_nama'], $data = ['responden_jabatan'], $data = ['responden_perusahaan'], $data['responden_email'], $data = ['responden_hp'], $data['responden_kota'], $id);

        // eksekusi query
        $query->execute();
    }

    public function deleteData($id)
    {
        // query untuk delete data menggunakan multi_query untuk mengizinkan multiple statements
        $query = "
            SET FOREIGN_KEY_CHECKS = 0;
            DELETE FROM {$this->table} WHERE responden_industri_id = $id;
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
    
    public function getRespondenId()
    {
        $query = $this->db->prepare("SELECT responden_industri_id FROM {$this->table} WHERE responden_nama = ?");

        $query->bind_param('s', $_SESSION['nama']);

        $query->execute();

        $result = $query->get_result();
        if ($row = $result->fetch_assoc()) {
            return $row['responden_industri_id'];
        } else {
            return null;
        }
    }

    public function getRespondenTotal()
    {
        $query = $this->db->prepare("SELECT COUNT(responden_industri_id) AS total FROM {$this->table}");
        $query->execute();
        $result = $query->get_result();
        if ($row = $result->fetch_assoc()) {
            return $row['total'];
        } else {
            return null;
        }
    }

    public function getNamebyId($id)
    {
        $query = $this->db->prepare("SELECT responden_nama FROM {$this->table} WHERE responden_industri_id = ?");

        // binding parameter ke query "i" berarti integer. Biar tidak kena SQL Injection
        $query->bind_param('i', $id);
        $query->execute();

        $result = $query->get_result();
        $row = $result->fetch_assoc();

        return $row['responden_nama'];
    }
}