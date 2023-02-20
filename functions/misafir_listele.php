<?php

include('database_connection.php');
include('functions.php');

alert_bootstrap('' . $_POST['data_query']. '', 'success');

if (isset($_POST['data_query'])) {
    $query = $_POST['data_query'];
    $result = mysqli_query($conn, $query);

    mysqli_close($conn);

    echo "<div class='pb-5 bg-light'>
          <div class='container-fluid'>
            <table class='table table-striped table-sm'>
              <thead class='table-dark'>
                <tr>
                  <th style='vertical-align: middle;'>Oda No</th>
                  <th style='vertical-align: middle;'>Ad Soyad</th>
                  <th style='vertical-align: middle;'>T.C Kimlik No</th>
                  <th style='vertical-align: middle;'>Geldiği İl</th>
                  <th style='vertical-align: middle;'>Görevi</th>
                  <th style='vertical-align: middle;'>Telefon No</th>
                  <th style='vertical-align: middle;'>Giriş Tarihi</th>
                  <th style='vertical-align: middle;'>Çıkış Tarihi</th>
                  <th style='vertical-align: middle;'>Aktif</th>
                  <th style='vertical-align: middle;'>Açıklama</th>
                  <th style='vertical-align: middle;'>Çocuk</th>
                  <th style='vertical-align: middle;'>Düzenle</th>
                  <th style='vertical-align: middle;'>Çıkış</th>
                  <th style='vertical-align: middle;'>Sil</th>
                </tr>
              </thead>
    ";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td style='vertical-align: middle;'>" . $row['oda_no'] . "</td>";
        echo "<td style='vertical-align: middle;'>" . $row['adi_soyadi'] . "</td>";
        echo "<td style='vertical-align: middle;'>" . $row['tc_no'] . "</td>";
        echo "<td style='vertical-align: middle;'>" . $row['geldigi_il'] . "</td>";
        echo "<td style='vertical-align: middle;'>" . $row['gorevi'] . "</td>";
        echo "<td style='vertical-align: middle;'>" . $row['tlf_no'] . "</td>";

        if ($row['giris_tarihi'] == "0000-00-00")
            $giris_tarihi = "";
        else
            $giris_tarihi = $row['giris_tarihi'];
        echo "<td style='vertical-align: middle;'>" . $giris_tarihi . "</td>";

        if ($row['cikis_tarihi'] == "0000-00-00")
            $cikis_tarihi = "";
        else
            $cikis_tarihi = $row['cikis_tarihi'];
        echo "<td style='vertical-align: middle;'>" . $cikis_tarihi . "</td>";

        if ($row['aktif'] == 1)
            $aktif = "checked";
        else
            $aktif = "unchecked";
        echo "<td style='vertical-align: middle;'><input type='checkbox' disabled " . $aktif . "></input></td>";

        echo "<td style='vertical-align: middle;'>" . $row['aciklama'] . "</td>";

        if ($row['cocuk'] == 1)
            $cocuk = "checked";
        else
            $cocuk = "unchecked";
        echo "<td style='vertical-align: middle;'><input type='checkbox' disabled " . $cocuk . "></td>";

        // Düzenle
        echo "<td style='vertical-align: middle;'>
        <button class='btn btn-sm btn-primary' type='button' onclick='javascript:misafir_duzenle_sayfasi(" . $row['id'] . ", \"" . $row['oda_no'] . "\", \"" . $row['adi_soyadi'] . "\", \"" . $row['tc_no'] . "\", \"" . $row['geldigi_il'] . "\", \"" . $row['gorevi'] . "\", \"" . $row['tlf_no'] . "\", \"" . $row['giris_tarihi'] . "\", \"" . $row['cikis_tarihi'] . "\", " . $row['aktif'] . ", \"" . $row['aciklama'] . "\", " . $row['cocuk'] . ");'>Düzenle</button>";
        // Çıkış Yap
        echo "<td style='vertical-align: middle;'>
            <button class='btn btn-sm btn-primary' type='button' onclick='javascript:misafir_cikis_yap(" . $row['id'] . ", " . $row['cocuk'] . ")'>Çıkış</button>";
        // Sil
        echo "<td style='vertical-align: middle;'>
        <button class='btn btn-sm btn-primary' type='button' onclick='javascript:misafir_sil(" . $row['id'] . ", \"" . $row['oda_no'] . "\", " . $row['cocuk'] . ");'>Sil</button>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    alert_bootstrap('Query has not posted!', 'danger');
}

?>