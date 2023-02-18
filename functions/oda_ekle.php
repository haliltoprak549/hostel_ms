<?php
  if(isset($_POST['oda_no']))
  {
    $oda_no = $_POST['oda_no'];
    $yatak_kapasitesi = $_POST['yatak_kapasitesi'];
    $bos_yatak = $_POST['bos_yatak'];
    $aciklama = $_POST['aciklama'];

    include('database_connection.php');

    if ($yatak_kapasitesi == NULL) $yatak_kapasitesi = 0;
    if ($bos_yatak == NULL) $bos_yatak = 0;

    $oda_ekle = "INSERT INTO odalar (oda_no, yatak_kapasitesi, bos_yatak, aciklama) VALUES ('$oda_no', $yatak_kapasitesi, $bos_yatak, '$aciklama');";

    if (mysqli_query($conn, $oda_ekle)) {
      echo "<script>alert('Oda basariyla eklendi.')</script>";
    } else {
      echo "<script>alert('Hata meydana geldi!')</script>";
    }

    mysqli_close($conn);
  }
?>