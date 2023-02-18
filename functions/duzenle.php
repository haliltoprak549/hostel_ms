<?php
require('functions.php');

if (isset($_POST['id'])) {
    include('database_connection.php');

    $id = $_POST['id'];

    $oda_no = $_POST['oda_no'];
    $adi_soyadi = $_POST['adi_soyadi'];
    $tc_no = $_POST['tc_no'];
    $geldigi_il = $_POST['geldigi_il'];
    $gorevi = $_POST['gorevi'];
    $tlf_no = $_POST['tlf_no'];
    $giris_tarihi = $_POST['giris_tarihi'];
    $cikis_tarihi = $_POST['cikis_tarihi'];
    $aciklama = $_POST['aciklama'];

    if (isset($_POST['aktif']))
        $aktif = 1;
    else
        $aktif = 0;
    if (isset($_POST['cocuk']))
        $cocuk = 1;
    else
        $cocuk = 0;

    if ($oda_no != NULL) {
        $oda_id_query = "SELECT id FROM odalar WHERE oda_no = '$oda_no';";
        $oda_id = mysqli_query($conn, $oda_id_query)->fetch_object()->id;
    } else
        $oda_id = NULL;

    $update = "UPDATE misafirler SET oda_id = '$oda_id', adi_soyadi = '$adi_soyadi', tc_no = '$tc_no', geldigi_il = '$geldigi_il', gorevi = '$gorevi', tlf_no = '$tlf_no', giris_tarihi = '$giris_tarihi', cikis_tarihi = '$cikis_tarihi', aciklama = '$aciklama', aktif = $aktif, cocuk = $cocuk WHERE id = $id;";

    if (mysqli_query($conn, $update))
        alert_bootstrap('Misafir başarıyla düzenlendi.', 'success');
    else
        alert_bootstrap('Misafir düzenlenirken hata meydana geldi.', 'danger');

    mysqli_close($conn);
} else
    alert_bootstrap('Misafir ID\'si bulunamadı!', 'danger');
?>