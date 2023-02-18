<?php
include('database_connection.php');

if (isset($_POST['filtre_secenek'])) {
    if ($_POST['filtre_secenek'] == 'bos_odalar')
        $query = "SELECT * FROM odalar WHERE bos_yatak > 0;";
    else if ($_POST['filtre_secenek'] == 'dolu_odalar')
        $query = "SELECT * FROM odalar WHERE bos_yatak = 0;";
    else if ($_POST['filtre_secenek'] == 'zemin_kat')
        $query = "SELECT * FROM odalar WHERE UPPER(SUBSTRING(oda_no, 1, 1)) = 'Z';";
    else if ($_POST['filtre_secenek'] == 'birinci_kat')
        $query = "SELECT * FROM odalar WHERE UPPER(SUBSTRING(oda_no, 1, 1)) = '1';";
    else if ($_POST['filtre_secenek'] == 'ikinci_kat')
        $query = "SELECT * FROM odalar WHERE UPPER(SUBSTRING(oda_no, 1, 1)) = '2';";
    else if ($_POST['filtre_secenek'] == 'ucuncu_kat')
        $query = "SELECT * FROM odalar WHERE UPPER(SUBSTRING(oda_no, 1, 1)) = '3';";
    else
        $query = "SELECT * FROM odalar;";
} else if (isset($_POST['oda_ara'])) {
    $query = "SELECT * FROM odalar WHERE oda_no LIKE '%" . $_POST['oda_ara'] . "%'";
} else
    $query = "SELECT * FROM odalar;";

$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td style='vertical-align: middle;'>" . $row['id'] . "</td>";
    echo "<td style='vertical-align: middle;'>" . $row['oda_no'] . "</td>";
    echo "<td style='vertical-align: middle;'>" . $row['yatak_kapasitesi'] . "</td>";
    echo "<td style='vertical-align: middle;'>" . $row['bos_yatak'] . "</td>";
    echo "<td style='vertical-align: middle;'>" . $row['aciklama'] . "</td>";
    echo "<td style='vertical-align: middle;'>
    <form action='http://localhost/pansiyon/oda_duzenle.php' method='post' style='display: inline;'>
    <input type='hidden' name='tabloadan_duzenleye_basildi' value='1' </input>
    <input type='hidden' name='id' value='" . $row['id'] . "'></input>
    <input type='hidden' name='oda_no' value='" . $row['oda_no'] . "'></input>
    <input type='hidden' name='yatak_kapasitesi' value='" . $row['yatak_kapasitesi'] . "'></input>
    <input type='hidden' name='bos_yatak' value='" . $row['bos_yatak'] . "'></input>
    <input type='hidden' name='aciklama' value='" . $row['aciklama'] . "'></input>  
    <button  class='btn btn-sm btn-primary' type='submit'>Düzenle</button>
    </form>";
    echo "</tr>";
}
mysqli_close($conn);