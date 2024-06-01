<?php 

 include_once('model/t_responden_mahasiswa_model.php');
 $mahasiswa = new t_responden_mahasiswa($db);
 $idRes = $mahasiswa->getRespondenId();
?>