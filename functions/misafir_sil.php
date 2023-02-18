<?php

require('functions.php');

if (!isset($_POST['json_id'])) {
    alert_bootstrap('Misafir ID\'si bulunamadı!', 'danger');
} else {

    include('database_connection.php');

    $id = $_POST['json_id'];
    $oda_no = $_POST['json_oda_no'];
    $cocuk = $_POST['json_cocuk'];

    $sil = "DELETE FROM misafirler WHERE id = $id;";

    if (mysqli_query($conn, $sil))
        alert_bootstrap('Misafir başarıyla silindi', 'success');

    if ($oda_no != "" && $oda_no != null) { // oda no gönderildi
        if ($cocuk == "0") { // misafir çocuk değilse

            $oda_id_query = "SELECT id FROM odalar WHERE oda_no = '$oda_no';";
            $oda_id = mysqli_query($conn, $oda_id_query)->fetch_object()->id;
            $bos_yatak_query = "UPDATE odalar SET bos_yatak = bos_yatak + 1 WHERE id = $oda_id";

            if (mysqli_query($conn, $bos_yatak_query)) // boş yatak query çalıştırıldı
                alert_bootstrap('Boş yatak sayısı başarıyla artırıldı.', 'success');
            else { // boş yatak querysi çalıştırılamadı
                alert_bootstrap('Boş yatak sayısı artırılırken hata meydana geldi!', 'danger');
            }

        } else { // misafir çocuksa
            alert_bootstrap('Boş yatak sayısı artırmaya gerek yok.', 'success');
        }
    } else // oda no gönderilmedi
        alert_bootstrap('Oda numarası girilmediği için boş yatak sayısı düzenlemedi!', 'danger');

    mysqli_close($conn);

}
?>