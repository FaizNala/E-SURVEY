<?php
class Survey
{
    public $db;
    protected $table = 'm_survey';

    public function __construct()
    {
        include('model/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data)
    {
        // prepare statement untuk query insert
        $query = $this->db->prepare("insert into {$this->table} (user_id, survey_jenis, survey_kode, survey_nama, survey_deskripsi, survey_tanggal) values(?,?,?,?,?,?)");

        // binding parameter ke query, "s" berarti string, "ss" berarti dua string
        $query->bind_param('isssss', $data['user_id'], $data['survey_jenis'], $data['survey_kode'], $data['survey_nama'], $data['survey_deskripsi'], $data['survey_tanggal']);

        // eksekusi query untuk menyimpan ke database
        $query->execute();
    }

    public function getData()
    {
        // query untuk mengambil data dari tabel survey_soal
        return $this->db->query("select * from {$this->table} ");
    }

    public function getDataById($id)
    {

        // query untuk mengambil data berdasarkan id
        $query = $this->db->prepare("select * from {$this->table} where survey_id = ?");

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
        $query = $this->db->prepare("update {$this->table} set survey_jenis = ?, survey_kode = ?, survey_nama = ?, survey_deskripsi = ?, survey_tanggal = ? where survey_id = ?");

        // binding parameter ke query
        $query->bind_param('sssssi', $data['survey_jenis'], $data['survey_kode'], $data['survey_nama'], $data['survey_deskripsi'], $data['survey_tanggal'], $id);

        // eksekusi query
        $query->execute();
    }

    public function deleteData($id)
    {
        // query untuk delete data menggunakan multi_query untuk mengizinkan multiple statements
        $query = "
            SET FOREIGN_KEY_CHECKS = 0;
            DELETE FROM {$this->table} WHERE survey_id = $id;
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

    public function getSurveyId()
    {
        $query = $this->db->prepare("SELECT survey_id FROM {$this->table} WHERE survey_jenis = ?");

        $query->bind_param('s', $_SESSION['user']);

        $query->execute();

        $result = $query->get_result();
        if ($row = $result->fetch_assoc()) {
            return $row['survey_id'];
        } else {
            return null;
        }
    }

    public function getDataMahasiswa()
    {
        // query untuk mengambil data dari tabel survey_soal
        return $this->db->query("select * from {$this->table} WHERE survey_jenis = 'mahasiswa'");
    }
    public function getDataDosen()
    {
        // query untuk mengambil data dari tabel survey_soal
        return $this->db->query("select * from {$this->table} WHERE survey_jenis = 'dosen'");
    }
    public function getDataTendik()
    {
        // query untuk mengambil data dari tabel survey_soal
        return $this->db->query("select * from {$this->table} WHERE survey_jenis = 'tendik'");
    }
    public function getDataOrtu()
    {
        // query untuk mengambil data dari tabel survey_soal
        return $this->db->query("select * from {$this->table} WHERE survey_jenis = 'ortu'");
    }
    public function getDataAlumni()
    {
        // query untuk mengambil data dari tabel survey_soal
        return $this->db->query("select * from {$this->table} WHERE survey_jenis = 'alumni'");
    }
    public function getDataIndustri()
    {
        // query untuk mengambil data dari tabel survey_soal
        return $this->db->query("select * from {$this->table} WHERE survey_jenis = 'industri'");
    }
}