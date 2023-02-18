<?php
if (isset($_POST['oda_no']) && isset($_POST['adi_soyadi'])) {
  include('database_connection.php');

  $bos_yatak_query = "SELECT bos_yatak FROM odalar WHERE oda_no = '" . $_POST['oda_no'] . "';";
  $bos_yatak = mysqli_query($conn, $bos_yatak_query)->fetch_object()->bos_yatak;

  if ($bos_yatak > 0) {
    $oda_no = $_POST['oda_no'];

    $oda_id_query = "SELECT id FROM odalar WHERE oda_no = '" . $_POST['oda_no'] . "';";
    $oda_id = mysqli_query($conn, $oda_id_query)->fetch_object()->id;

    $adi_soyadi = $_POST['adi_soyadi'];
    $tc_no = $_POST['tc_no'];
    $geldigi_il = $_POST['geldigi_il'];
    $gorevi = $_POST['gorevi'];
    $tlf_no = $_POST['tlf_no'];
    if ($_POST['giris_tarihi'] == "0000-00-00")
      $giris_tarihi = $_POST['giris_tarihi'];
    else
      $giris_tarihi = date('Y-m-d');
    $cikis_tarihi = $_POST['cikis_tarihi'];
    $aciklama = $_POST['aciklama'];
    if (isset($_POST['cocuk']))
      $cocuk = 1;
    else
      $cocuk = 0;
    if (isset($_POST['aktif']))
      $aktif = 1;
    else
      $aktif = 0;

    $insert = "INSERT INTO misafirler (oda_id, adi_soyadi, tc_no, geldigi_il, gorevi, tlf_no, giris_tarihi, cikis_tarihi, aktif, aciklama, cocuk) VALUES ($oda_id, '$adi_soyadi', '$tc_no', '$geldigi_il', '$gorevi', '$tlf_no', '$giris_tarihi', '$cikis_tarihi', $aktif, '$aciklama', $cocuk);";

    if (mysqli_query($conn, $insert)) {
      echo "
      <div class='alert alert-success alert-dismissible fade show' role='alert'>
      Misafir başarıyla eklendi.
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
      </button>
      </div>";
    } else {
      echo "
      <div class='alert alert-danger alert-dismissible fade show' role='alert'>
      Misafir eklenmeye çalışırken bir hata meydana geldi!
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
      </button>
      </div>";
    }

    if (!$cocuk) {
      // Musteri giris yaptiginda kullanilabilir yatak sayisini azalt.
      $bos_yatak_query = "UPDATE odalar SET bos_yatak = bos_yatak - 1 WHERE id = $oda_id";
      mysqli_query($conn, $bos_yatak_query);
    }
    
    mysqli_close($conn);
  } else { // kullanilabilir yatak yoksa
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    " . $_POST['oda_no'] . " numaralı odada kullanılabilir yatak yok!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
  }
}
?>