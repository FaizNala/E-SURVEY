<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="card-body" align="center">
            <?php
            include_once('kategori_survey_form.php');
            include('model/m_survey_model.php');
            $survey = new Survey();

            if ($pages == 'mahasiswa') {
                $result = $survey->getDataMahasiswa();
            } else if ($pages == 'dosen') {
                $result = $survey->getDataDosen();
            } else if ($pages == 'tendik') {
                $result = $survey->getDataTendik();
            } else if ($pages == 'ortu') {
                $result = $survey->getDataOrtu();
            } else if ($pages == 'alumni') {
                $result = $survey->getDataAlumni();
            } else if ($pages == 'industri') {
                $result = $survey->getDataIndustri();
            } else {
                $result = NULL;
            }

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $survey_nama = $row['survey_nama'];
            ?>
                    <div class="col-lg-2 col-4">
                        <!-- small box -->
                        <div class="small-box ">
                            <div class="inner">
                                <h4><?php echo $survey_nama ?></h4>
                            </div>
                            <a href="form_soal.php?pages=<?php echo $pages ?>" class="small-box-footer">Jawab Survey <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>Tidak ada pertanyaan survey yang tersedia.</p>";
            }
            $result->close();
            ?>
            <div class="form-group">
                <a href="#" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </div>
</section>