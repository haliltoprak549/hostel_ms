<?php

include('database_connection.php');

if (isset($_POST['sirala'])) {
    if ($_POST['sirala'] == 'isme_gore')
        $query = "SELECT m.id, o.oda_no, m.adi_soyadi, m.adi_soyadi, m.tc_no, m.geldigi_il, m.gorevi, m.tlf_no, m.giris_tarihi, m.cikis_tarihi, m.aktif, m.aciklama, m.cocuk
        FROM misafirler AS m
        LEFT JOIN odalar AS o ON m.oda_id = o.id
        ORDER BY m.adi_soyadi;";
    else if ($_POST['sirala'] == 'tc_noya_gore')
        $query = "SELECT m.id, o.oda_no, m.adi_soyadi, m.adi_soyadi, m.tc_no, m.geldigi_il, m.gorevi, m.tlf_no, m.giris_tarihi, m.cikis_tarihi, m.aktif, m.aciklama, m.cocuk
        FROM misafirler AS m
        LEFT JOIN odalar AS o ON m.oda_id = o.id
        ORDER BY m.tc_no;";
    else if ($_POST['sirala'] == 'oda_noya_gore') {
        $query = "SELECT m.id, o.oda_no, m.adi_soyadi, m.adi_soyadi, m.tc_no, m.geldigi_il, m.gorevi, m.tlf_no, m.giris_tarihi, m.cikis_tarihi, m.aktif, m.aciklama, m.cocuk
        FROM misafirler AS m
        LEFT JOIN odalar AS o ON m.oda_id = o.id
        ORDER BY o.oda_no;";
    } else
        $query = "SELECT m.id, o.oda_no, m.adi_soyadi, m.adi_soyadi, m.tc_no, m.geldigi_il, m.gorevi, m.tlf_no, m.giris_tarihi, m.cikis_tarihi, m.aktif, m.aciklama, m.cocuk
        FROM misafirler AS m
        LEFT JOIN odalar AS o ON m.oda_id = o.id;";
} else if (isset($_POST['isim_ara'])) {
    $query = "SELECT m.id, o.oda_no, m.adi_soyadi, m.adi_soyadi, m.tc_no, m.geldigi_il, m.gorevi, m.tlf_no, m.giris_tarihi, m.cikis_tarihi, m.aktif, m.aciklama, m.cocuk
        FROM misafirler AS m
        LEFT JOIN odalar AS o ON m.oda_id = o.id
        WHERE m.adi_soyadi LIKE '%" . $_POST['isim_ara'] . "%' OR m.tc_no LIKE '%" . $_POST['isim_ara'] . "%';";
} else if (isset($_POST['oda_ara'])) {
    echo "a";
    $query = "SELECT m.id, o.oda_no, m.adi_soyadi, m.adi_soyadi, m.tc_no, m.geldigi_il, m.gorevi, m.tlf_no, m.giris_tarihi, m.cikis_tarihi, m.aktif, m.aciklama, m.cocuk
      FROM misafirler AS m
      LEFT JOIN odalar AS o ON m.oda_id = o.id
      WHERE o.oda_no LIKE '%" . $_POST['oda_ara'] . "%';";
} else
    $query = "SELECT m.id, o.oda_no, m.adi_soyadi, m.adi_soyadi, m.tc_no, m.geldigi_il, m.gorevi, m.tlf_no, m.giris_tarihi, m.cikis_tarihi, m.aktif, m.aciklama, m.cocuk
        FROM misafirler AS m
        LEFT JOIN odalar AS o ON m.oda_id = o.id;";

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
?>