<?php

require('functions.php');

if (isset($_POST['json_id'])) {
  include('database_connection.php');

  $id = $_POST['json_id'];
  $cocuk = $_POST['json_cocuk'];

  $aktif_query = "SELECT aktif FROM misafirler WHERE id = $id;";
  $aktif = mysqli_query($conn, $aktif_query)->fetch_object()->aktif;

  if ($aktif == 1) { // Misafir aktifse
    $cikis_yap = "UPDATE misafirler SET cikis_tarihi = CURRENT_DATE, aktif = 0 WHERE id = $id;";

    if (mysqli_query($conn, $cikis_yap)) {
      alert_bootstrap('Misafirin cikisi basariyla yapildi.', 'success');

      // Musteri cikis yaptiginda kullanilabilir yatak sayisini arttir.
      $oda_id_query = "SELECT oda_id FROM misafirler WHERE id = $id;";
      $oda_id = mysqli_query($conn, $oda_id_query)->fetch_object()->oda_id;

      if ($cocuk == 0) { // Misafir çocuk değilse
        $bos_yatak_query = "UPDATE odalar SET bos_yatak = bos_yatak + 1 WHERE id = $oda_id";
        mysqli_query($conn, $bos_yatak_query);
      }
    } else // Misafir çocuksa
      alert_bootstrap('Misafirin çıkışı yapılırken hata meydana geldi!', 'danger');

  } else { // Misafir aktif değilse
    alert_bootstrap('Misafirin çıkışı zaten yapıldı.', 'danger');
  }

  mysqli_close($conn);

} else {
  alert_bootstrap('Misafir ID\'si bulunamadı.', 'danger');
}
?>