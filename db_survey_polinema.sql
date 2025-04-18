CREATE TABLE m_user (
	user_id INT PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(20),
	nama VARCHAR(50),
	password VARCHAR(255)
);

CREATE TABLE m_kategori (
	kategori_id INT PRIMARY KEY AUTO_INCREMENT,
	kategori_nama VARCHAR(255)
);

CREATE TABLE m_survey (
	survey_id INT PRIMARY KEY AUTO_INCREMENT,
	user_id INT,
	survey_jenis ENUM('mahasiswa','dosen','tendik','ortu','alumni','industri'),
	survey_kode VARCHAR(20),
	survey_nama VARCHAR(50),
	survey_deskripsi TEXT,
	survey_tanggal DATETIME,
	FOREIGN KEY (user_id) REFERENCES m_user(user_id)
	
);

CREATE TABLE m_survey_soal (
	soal_id INT PRIMARY KEY AUTO_INCREMENT,
	survey_id INT,
	kategori_id INT,
	no_urut INT,
	soal_jenis ENUM('rating','esai'),
	soal_nama VARCHAR(500)
);

CREATE TABLE t_responden_dosen (
	responden_dosen_id INT PRIMARY KEY AUTO_INCREMENT,
	survey_id INT,
	responden_tanggal DATETIME,
	responden_nip VARCHAR(20),
	responden_nama VARCHAR(50),
	responden_unit VARCHAR(50),
	FOREIGN KEY (survey_id) REFERENCES m_survey(survey_id)
);

CREATE TABLE t_responden_tendik (
	responden_tendik_id INT PRIMARY KEY AUTO_INCREMENT,
	survey_id INT,
	responden_tanggal DATETIME,
	responden_nopeg VARCHAR(20),
	responden_nama VARCHAR(50),
	responden_unit VARCHAR(50),
	FOREIGN KEY (survey_id) REFERENCES m_survey(survey_id)
);

CREATE TABLE t_responden_mahasiswa (
	responden_mahasiswa_id INT PRIMARY KEY AUTO_INCREMENT,
	survey_id INT,
	responden_tanggal DATETIME,
	responden_nim VARCHAR(20),
	responden_nama VARCHAR(50),
	responden_prodi VARCHAR(100),
	responden_email VARCHAR(100),
	responden_hp VARCHAR(20),
	tahun_masuk YEAR,
	FOREIGN KEY (survey_id) REFERENCES m_survey(survey_id)
);

CREATE TABLE t_responden_alumni (
	responden_alumni_id INT PRIMARY KEY AUTO_INCREMENT,
	survey_id INT,
	responden_tanggal DATETIME,
	responden_nim VARCHAR(20),
	responden_nama VARCHAR(50),
	responden_prodi VARCHAR(100),
	responden_email VARCHAR(100),
	responden_hp VARCHAR(20),
	tahun_lulus YEAR,
	FOREIGN KEY (survey_id) REFERENCES m_survey(survey_id)
);

CREATE TABLE t_responden_ortu (
	responden_ortu_id INT PRIMARY KEY AUTO_INCREMENT,
	survey_id INT,
	responden_tanggal DATETIME,
	responden_nama VARCHAR(50),
	responden_jk VARCHAR(50),
	responden_hp VARCHAR(20),
	responden_pendidikan VARCHAR(50),
	responden_pekerjaan VARCHAR(50),
	responden_penghasilan VARCHAR(50),
	mahasiswa_nim VARCHAR(50),
	mahasiswa_prodi VARCHAR(100),
	FOREIGN KEY (survey_id) REFERENCES m_survey(survey_id)
);

CREATE TABLE t_responden_industri (
	responden_industri_id INT PRIMARY KEY AUTO_INCREMENT,
	survey_id INT,
	responden_tanggal DATETIME,
	responden_nama VARCHAR(50),
	respoden_jabatan VARCHAR(50),
	responden_perusahaan VARCHAR(50),
	responden_email VARCHAR(100),
	responden_hp VARCHAR(20),
	responden_kota VARCHAR(50),
	FOREIGN KEY (survey_id) REFERENCES m_survey(survey_id)
);

CREATE TABLE t_jawaban_dosen (
	jawaban_dosen_id INT PRIMARY KEY AUTO_INCREMENT,
	responden_dosen_id INT,
	soal_id INT,
	jawaban VARCHAR(255),
	FOREIGN KEY (responden_dosen_id) REFERENCES t_responden_dosen(responden_dosen_id),
	FOREIGN KEY (soal_id) REFERENCES m_survey_soal(soal_id)
);

CREATE TABLE t_jawaban_tendik (
	jawaban_tendik_id INT PRIMARY KEY AUTO_INCREMENT,
	responden_tendik_id INT,
	soal_id INT,
	jawaban VARCHAR(255),
	FOREIGN KEY (responden_tendik_id) REFERENCES t_responden_tendik(responden_tendik_id),
	FOREIGN KEY (soal_id) REFERENCES m_survey_soal(soal_id)
);

CREATE TABLE t_jawaban_mahasiswa (
	jawaban_mahasiswa_id INT PRIMARY KEY AUTO_INCREMENT,
	responden_mahasiswa_id INT,
	soal_id INT,
	jawaban VARCHAR(255),
	FOREIGN KEY (responden_mahasiswa_id) REFERENCES t_responden_mahasiswa(responden_mahasiswa_id),
	FOREIGN KEY (soal_id) REFERENCES m_survey_soal(soal_id)
);

CREATE TABLE t_jawaban_alumni (
	jawaban_alumni_id INT PRIMARY KEY AUTO_INCREMENT,
	responden_alumni_id INT,
	soal_id INT,
	jawaban VARCHAR(255),
	FOREIGN KEY (responden_alumni_id) REFERENCES t_responden_alumni(responden_alumni_id),
	FOREIGN KEY (soal_id) REFERENCES m_survey_soal(soal_id)
);

CREATE TABLE t_jawaban_ortu (
	jawaban_ortu_id INT PRIMARY KEY AUTO_INCREMENT,
	responden_ortu_id INT,
	soal_id INT,
	jawaban VARCHAR(255),
	FOREIGN KEY (responden_ortu_id) REFERENCES t_responden_ortu(responden_ortu_id),
	FOREIGN KEY (soal_id) REFERENCES m_survey_soal(soal_id)
);

CREATE TABLE t_jawaban_industri (
	jawaban_industri_id INT PRIMARY KEY AUTO_INCREMENT,
	responden_industri_id INT,
	soal_id INT,
	jawaban VARCHAR(255),
	FOREIGN KEY (responden_industri_id) REFERENCES t_responden_industri(responden_industri_id),
	FOREIGN KEY (soal_id) REFERENCES m_survey_soal(soal_id)
);



-- Mengisi tabel m_user
INSERT INTO m_user (username, nama, password) VALUES
('admin', 'Administrator', '$2y$10$abcdefghijklmnopqrstuv'),
('petugas1', 'Petugas Survey 1', '$2y$10$abcdefghijklmnopqrstuv'),
('petugas2', 'Petugas Survey 2', '$2y$10$abcdefghijklmnopqrstuv');

-- Mengisi tabel m_kategori sesuai permintaan
INSERT INTO m_kategori (kategori_nama) VALUES
('Pendidikan'),
('Fasilitas'),
('Layanan');

-- Mengisi tabel m_survey
INSERT INTO m_survey (user_id, survey_jenis, survey_kode, survey_nama, survey_deskripsi, survey_tanggal) VALUES
(1, 'mahasiswa', 'MHS-2025-01', 'Survey Kepuasan Mahasiswa 2025', 'Survey untuk mengukur tingkat kepuasan mahasiswa terhadap layanan kampus', '2025-04-01 08:00:00'),
(1, 'dosen', 'DSN-2025-01', 'Survey Kepuasan Dosen 2025', 'Survey untuk mengukur tingkat kepuasan dosen terhadap fasilitas dan lingkungan kerja', '2025-04-02 09:00:00'),
(2, 'tendik', 'TDK-2025-01', 'Survey Kepuasan Tenaga Kependidikan 2025', 'Survey untuk mengukur kepuasan tenaga kependidikan terhadap kondisi kerja', '2025-04-03 10:00:00'),
(2, 'ortu', 'ORT-2025-01', 'Survey Orang Tua Mahasiswa 2025', 'Survey untuk mengetahui persepsi orang tua mahasiswa terhadap kualitas kampus', '2025-04-04 11:00:00'),
(3, 'alumni', 'ALM-2025-01', 'Tracer Study Alumni 2025', 'Survey untuk melacak karir alumni dan mengevaluasi relevansi kurikulum', '2025-04-05 08:30:00'),
(3, 'industri', 'IND-2025-01', 'Survey Kepuasan Mitra Industri 2025', 'Survey untuk mengukur kepuasan mitra industri terhadap lulusan dan kerjasama', '2025-04-06 09:30:00');

-- Mengisi tabel m_survey_soal untuk kategori Pendidikan
INSERT INTO m_survey_soal (survey_id, kategori_id, no_urut, soal_jenis, soal_nama) VALUES
-- Survey Mahasiswa - Kategori Pendidikan
(1, 1, 1, 'rating', 'Bagaimana kualitas materi pembelajaran yang disampaikan oleh dosen?'),
(1, 1, 2, 'rating', 'Seberapa baik metode pengajaran yang diterapkan dalam perkuliahan?'),
(1, 1, 3, 'rating', 'Bagaimana kesesuaian kurikulum dengan kebutuhan dunia kerja?'),
(1, 1, 4, 'rating', 'Bagaimana ketersediaan dan kualitas bahan ajar/modul/buku referensi?'),
(1, 1, 5, 'esai', 'Berikan saran untuk peningkatan kualitas pembelajaran di kampus'),

-- Survey Dosen - Kategori Pendidikan
(2, 1, 1, 'rating', 'Bagaimana dukungan institusi terhadap pengembangan metode pengajaran?'),
(2, 1, 2, 'rating', 'Seberapa baik sistem penilaian mahasiswa yang diterapkan saat ini?'),
(2, 1, 3, 'rating', 'Bagaimana kualitas dan relevansi kurikulum program studi?'),
(2, 1, 4, 'rating', 'Bagaimana dukungan untuk kegiatan penelitian dan publikasi ilmiah?'),
(2, 1, 5, 'esai', 'Berikan saran untuk peningkatan kualitas akademik di institusi'),

-- Survey Orang Tua - Kategori Pendidikan
(4, 1, 1, 'rating', 'Bagaimana kualitas pendidikan yang diterima putra/putri Anda?'),
(4, 1, 2, 'rating', 'Seberapa baik kompetensi dosen dalam mengajar?'),
(4, 1, 3, 'rating', 'Bagaimana perkembangan keterampilan putra/putri Anda selama kuliah?'),
(4, 1, 4, 'esai', 'Berikan saran untuk peningkatan kualitas pendidikan kampus'),

-- Survey Alumni - Kategori Pendidikan
(5, 1, 1, 'rating', 'Seberapa relevan kurikulum dengan kebutuhan di tempat kerja Anda?'),
(5, 1, 2, 'rating', 'Bagaimana pengaruh pendidikan yang Anda terima terhadap karir?'),
(5, 1, 3, 'rating', 'Seberapa bermanfaat mata kuliah yang Anda ambil untuk pekerjaan Anda?'),
(5, 1, 4, 'esai', 'Kompetensi apa yang dirasa kurang dari pendidikan yang Anda terima?'),

-- Survey Industri - Kategori Pendidikan
(6, 1, 1, 'rating', 'Bagaimana kualitas lulusan dari institusi ini?'),
(6, 1, 2, 'rating', 'Seberapa baik kompetensi lulusan sesuai dengan kebutuhan industri?'),
(6, 1, 3, 'rating', 'Bagaimana kemampuan adaptasi lulusan di lingkungan kerja?'),
(6, 1, 4, 'esai', 'Kompetensi apa yang perlu ditingkatkan dari lulusan institusi ini?');

-- Mengisi tabel m_survey_soal untuk kategori Fasilitas
INSERT INTO m_survey_soal (survey_id, kategori_id, no_urut, soal_jenis, soal_nama) VALUES
-- Survey Mahasiswa - Kategori Fasilitas
(1, 2, 6, 'rating', 'Bagaimana kondisi dan kelengkapan fasilitas ruang kuliah?'),
(1, 2, 7, 'rating', 'Bagaimana kualitas dan ketersediaan fasilitas laboratorium?'),
(1, 2, 8, 'rating', 'Bagaimana kualitas fasilitas perpustakaan dan kemudahan akses?'),
(1, 2, 9, 'rating', 'Bagaimana kualitas koneksi internet di lingkungan kampus?'),
(1, 2, 10, 'esai', 'Fasilitas apa yang perlu ditingkatkan di kampus?'),

-- Survey Dosen - Kategori Fasilitas
(2, 2, 6, 'rating', 'Bagaimana kondisi ruang kerja/dosen yang disediakan?'),
(2, 2, 7, 'rating', 'Bagaimana kelengkapan fasilitas mengajar di ruang kuliah?'),
(2, 2, 8, 'rating', 'Bagaimana ketersediaan peralatan pendukung penelitian?'),
(2, 2, 9, 'rating', 'Bagaimana kualitas koneksi internet untuk mendukung pekerjaan?'),
(2, 2, 10, 'esai', 'Fasilitas apa yang perlu ditingkatkan untuk mendukung kinerja dosen?'),

-- Survey Tenaga Kependidikan - Kategori Fasilitas
(3, 2, 1, 'rating', 'Bagaimana kondisi ruang kerja yang disediakan?'),
(3, 2, 2, 'rating', 'Bagaimana kelengkapan peralatan kerja yang tersedia?'),
(3, 2, 3, 'rating', 'Bagaimana kualitas sarana teknologi informasi yang disediakan?'),
(3, 2, 4, 'esai', 'Fasilitas apa yang perlu ditingkatkan untuk mendukung kinerja Anda?'),

-- Survey Orang Tua - Kategori Fasilitas
(4, 2, 5, 'rating', 'Bagaimana pendapat Anda tentang fasilitas belajar di kampus?'),
(4, 2, 6, 'rating', 'Bagaimana pendapat Anda tentang fasilitas pendukung kegiatan mahasiswa?'),
(4, 2, 7, 'rating', 'Bagaimana pendapat Anda tentang kondisi asrama/tempat tinggal mahasiswa?'),
(4, 2, 8, 'esai', 'Fasilitas apa yang perlu ditingkatkan untuk mendukung putra/putri Anda?');

-- Mengisi tabel m_survey_soal untuk kategori Layanan
INSERT INTO m_survey_soal (survey_id, kategori_id, no_urut, soal_jenis, soal_nama) VALUES
-- Survey Mahasiswa - Kategori Layanan
(1, 3, 11, 'rating', 'Bagaimana kualitas layanan administrasi akademik?'),
(1, 3, 12, 'rating', 'Bagaimana kualitas layanan bimbingan konseling/karir?'),
(1, 3, 13, 'rating', 'Bagaimana kualitas layanan kesehatan kampus?'),
(1, 3, 14, 'rating', 'Bagaimana kemudahan akses informasi akademik melalui sistem informasi?'),
(1, 3, 15, 'esai', 'Layanan apa yang perlu ditingkatkan di kampus?'),

-- Survey Dosen - Kategori Layanan
(2, 3, 11, 'rating', 'Bagaimana kualitas layanan administrasi kepegawaian?'),
(2, 3, 12, 'rating', 'Bagaimana kualitas layanan pengembangan karir dosen?'),
(2, 3, 13, 'rating', 'Bagaimana dukungan administrasi untuk kegiatan penelitian dan pengabdian?'),
(2, 3, 14, 'rating', 'Bagaimana kemudahan akses sistem informasi akademik?'),
(2, 3, 15, 'esai', 'Layanan apa yang perlu ditingkatkan untuk mendukung kinerja dosen?'),

-- Survey Tenaga Kependidikan - Kategori Layanan
(3, 3, 5, 'rating', 'Bagaimana kualitas layanan administrasi kepegawaian?'),
(3, 3, 6, 'rating', 'Bagaimana kualitas layanan kesehatan untuk pegawai?'),
(3, 3, 7, 'rating', 'Bagaimana program pengembangan kompetensi untuk tenaga kependidikan?'),
(3, 3, 8, 'esai', 'Layanan apa yang perlu ditingkatkan untuk tenaga kependidikan?'),

-- Survey Orang Tua - Kategori Layanan
(4, 3, 9, 'rating', 'Bagaimana kemudahan komunikasi dengan pihak kampus?'),
(4, 3, 10, 'rating', 'Bagaimana kualitas layanan informasi akademik kepada orang tua?'),
(4, 3, 11, 'rating', 'Bagaimana tanggapan kampus terhadap keluhan/pertanyaan orang tua?'),
(4, 3, 12, 'esai', 'Layanan apa yang perlu ditingkatkan untuk orang tua mahasiswa?'),

-- Survey Alumni - Kategori Layanan
(5, 3, 5, 'rating', 'Bagaimana kualitas layanan tracer study untuk alumni?'),
(5, 3, 6, 'rating', 'Bagaimana akses terhadap layanan karir dan lowongan kerja dari kampus?'),
(5, 3, 7, 'rating', 'Bagaimana program pengembangan profesional untuk alumni?'),
(5, 3, 8, 'esai', 'Layanan apa yang perlu ditingkatkan untuk alumni?'),

-- Survey Industri - Kategori Layanan
(6, 3, 5, 'rating', 'Bagaimana kualitas layanan kemitraan dengan industri?'),
(6, 3, 6, 'rating', 'Bagaimana respon kampus terhadap kebutuhan industri?'),
(6, 3, 7, 'rating', 'Bagaimana kemudahan dalam mengakses informasi kerjasama?'),
(6, 3, 8, 'esai', 'Layanan apa yang perlu ditingkatkan untuk mitra industri?');

-- Menambahkan beberapa responden untuk contoh data
-- Responden Mahasiswa
INSERT INTO t_responden_mahasiswa (survey_id, responden_tanggal, responden_nim, responden_nama, responden_prodi, responden_email, responden_hp, tahun_masuk) VALUES
(1, '2025-04-10 13:45:22', '192110001', 'Budi Santoso', 'Teknik Informatika', 'budi@example.com', '081234567890', 2022),
(1, '2025-04-10 14:25:11', '192110002', 'Ani Wulandari', 'Sistem Informasi', 'ani@example.com', '081234567891', 2022),
(1, '2025-04-11 09:12:33', '202110015', 'Dian Permata', 'Teknik Komputer', 'dian@example.com', '081234567892', 2023);

-- Responden Dosen
INSERT INTO t_responden_dosen (survey_id, responden_tanggal, responden_nip, responden_nama, responden_unit) VALUES
(2, '2025-04-15 10:45:22', '197505102001121001', 'Dr. Ahmad Fadillah', 'Fakultas Teknik'),
(2, '2025-04-15 13:12:45', '198303152008011002', 'Dr. Maya Indira, M.Sc.', 'Fakultas MIPA');

-- Responden Tendik
INSERT INTO t_responden_tendik (survey_id, responden_tanggal, responden_nopeg, responden_nama, responden_unit) VALUES
(3, '2025-04-16 09:30:15', 'PG001245', 'Rahmat Hidayat', 'Bagian Akademik'),
(3, '2025-04-16 11:42:18', 'PG001358', 'Siti Nurhayati', 'Bagian Keuangan');

-- Responden Orang Tua
INSERT INTO t_responden_ortu (survey_id, responden_tanggal, responden_nama, responden_jk, responden_hp, responden_pendidikan, responden_pekerjaan, responden_penghasilan, mahasiswa_nim, mahasiswa_prodi) VALUES
(4, '2025-04-17 14:25:33', 'Agus Priyanto', 'Laki-laki', '081234567893', 'S1', 'Pegawai Swasta', '5-10 juta', '202110015', 'Teknik Komputer'),
(4, '2025-04-17 16:45:12', 'Rini Wahyuni', 'Perempuan', '081234567894', 'SMA', 'Wiraswasta', '3-5 juta', '192110001', 'Teknik Informatika');

-- Responden Alumni
INSERT INTO t_responden_alumni (survey_id, responden_tanggal, responden_nim, responden_nama, responden_prodi, responden_email, responden_hp, tahun_lulus) VALUES
(5, '2025-04-18 10:15:22', '162110001', 'Hendro Wibowo', 'Teknik Informatika', 'hendro@example.com', '081234567895', 2020),
(5, '2025-04-18 13:45:11', '162110042', 'Dewi Lestari', 'Sistem Informasi', 'dewi@example.com', '081234567896', 2020);

-- Responden Industri
INSERT INTO t_responden_industri (survey_id, responden_tanggal, responden_nama, respoden_jabatan, responden_perusahaan, responden_email, responden_hp, responden_kota) VALUES
(6, '2025-04-19 11:30:45', 'Indra Kusuma', 'HRD Manager', 'PT Maju Bersama', 'indra@majubersama.com', '081234567897', 'Jakarta'),
(6, '2025-04-19 14:22:18', 'Larasati', 'Direktur', 'CV Solusi Digital', 'laras@solusidigital.com', '081234567898', 'Bandung');

-- Contoh beberapa jawaban dari responden
-- Jawaban Mahasiswa
INSERT INTO t_jawaban_mahasiswa (responden_mahasiswa_id, soal_id, jawaban) VALUES
(1, 1, '4'),  -- Rating untuk kualitas materi pembelajaran
(1, 2, '3'),  -- Rating untuk metode pengajaran
(1, 3, '4'),  -- Rating untuk kesesuaian kurikulum
(1, 4, '3'),  -- Rating untuk ketersediaan bahan ajar
(1, 5, 'Perlu ditambahkan lebih banyak praktikum dan kasus nyata'),  -- Esai saran pembelajaran
(1, 6, '4'),  -- Rating untuk fasilitas ruang kuliah
(1, 7, '3'),  -- Rating untuk fasilitas lab
(1, 8, '4'),  -- Rating untuk perpustakaan
(1, 9, '2'),  -- Rating untuk internet
(1, 10, 'Internet kampus perlu ditingkatkan kecepatan dan stabilitasnya'), -- Esai fasilitas
(1, 11, '3'), -- Rating untuk layanan administrasi
(1, 12, '3'), -- Rating untuk bimbingan karir
(1, 13, '4'), -- Rating untuk layanan kesehatan
(1, 14, '4'), -- Rating untuk sistem informasi
(1, 15, 'Perlu ditambahkan layanan konsultasi karir yang lebih intensif'); -- Esai layanan
