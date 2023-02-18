<?php
if (isset($_POST['duzenlemeye_basildi']) && isset($_POST['id'])) {
    include('database_connection.php');

    $id = $_POST['id'];

    $oda_no = $_POST['oda_no'];
    $yatak_kapasitesi = $_POST['yatak_kapasitesi'];
    $bos_yatak = $_POST['bos_yatak'];
    $aciklama = $_POST['aciklama'];

    $edit = "UPDATE odalar SET oda_no = '$oda_no', yatak_kapasitesi = $yatak_kapasitesi, bos_yatak = $bos_yatak, aciklama = '$aciklama' WHERE id = $id;";

    if (mysqli_query($conn, $edit))
        echo "<script>alert('Oda başarıyla düzenlendi.')</script>";
    else
        echo "<script>alert('Hata meydana geldi!')</script>";

    mysqli_close($conn);
}
?>