<?php 
class t_responden_ortu{
    public $db;
    protected $table = 't_responden_ortu';

    public function __construct($db){
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function insertData($data){
        // prepare statement untuk query insert
        $query = $this->db->prepare("INSERT INTO {$this->table} (urvey_id, responden_tanggal, responden_nama, responden_jk, responden_umur, responden_hp, responden_pendidikan, responden_pekerjaan, responden_penghasilan, mahasiswa_nim, mahasiswa_nama, mahasiswa_prodi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // binding parameter ke query, "s" berarti string, "ssss" berarti empat string
        $query->bind_param('isssisssssss', $data['survey_id'], $data['responden_tanggal'], $data['responden_nama'], $data['responden_jk'], $data['responden_umur'], $data['responden_hp'], $data['responden_pendidikan'], $data['responden_pekerjaan'], $data['responden_penghasilan'], $data['mahasiswa_nim'], $data['mahasiswa_nama'], $data['mahasiswa_prodi']);
        
        // eksekusi query untuk menyimpan ke database
        $query->execute();
    }

    public function getData(){
        // query untuk mengambil data dari tabel m_user
        return $this->db->query("select * from {$this->table} ");
    }

    public function getDataById($id){

        // query untuk mengambil data berdasarkan id
        $query = $this->db->prepare("select * from {$this->table} where responden_ortu_id = ?");
        
        // binding parameter ke query "i" berarti integer. Biar tidak kena SQL Injection
        $query->bind_param('i', $id);

        // eksekusi query
        $query->execute();

        // ambil hasil query
        return $query->get_result();
    }

    public function updateData($id, $data){
        // query untuk update data
        $query = $this->db->prepare("update {$this->table} set responden_tanggal = ?, respondem_nama = ?,  responden_jk = ?, responden_umur = ?, responden_hp = ?, responden_pendidikan = ?, responden_pekerjaan = ?, responden_penghasilan = ?, mahasiswa_nim = ?, mahasiswa_nama = ?, mahasiswa_prodi = ? where responden_ortu_id = ?");

        // binding parameter ke query
        $query->bind_param('sssisssssssi', $data['responden_tanggal'], $data['responden_nama'], $data['responden_jk'], $data['responden_umur'], $data['responden_hp'], $data['responden_pendidikan'], $data['responden_pekerjaan'], $data['mahasiswa_nim'], $data['mahasiswa_nama'], $data['mahasiswa_prodi'], $id);

        // eksekusi query
        $query->execute();
    }

    public function deleteData($id){
        // query untuk delete data
        $query = $this->db->prepare("delete from {$this->table} where responden_ortu_id = ?");

        // binding parameter ke query
        $query->bind_param('i', $id);

        // eksekusi query
        $query->execute();
    }

    public function getRespondenId() {
        $query = $this->db->prepare("SELECT responden_ortu_id FROM {$this->table} WHERE responden_nama = ?");
    
        $query->bind_param('s', $_SESSION['nama']);
        
        $query->execute();
        
        $result = $query->get_result();
        if ($row = $result->fetch_assoc()) {
            return $row['responden_ortu_id'];
        } else {
            return null;
        }
    }

    public function getRespondenTotal() {
        $query = $this->db->prepare("SELECT COUNT(responden_ortu_id) AS total FROM {$this->table}");
        $query->execute();
        $result = $query->get_result();
        if ($row = $result->fetch_assoc()) {
            return $row['total'];
        } else {
            return null;
        }
    }
}