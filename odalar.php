<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <title>Odalar</title>
</head>

<body>
  <!-- Navigation Bar -->
  <div id="navigation">
    <script>$(function () { $("#navigation").load("http://localhost/pansiyon/navbar.html"); });</script>
  </div>

  <div class="container mt-4">
    <h2 class="text-center mb-4">Odalar</h2>
    <div class="row">
      <div class="col-lg-6">
        <form action="odalar.php" method="post">
          <div class="form-group">
            <select name="filtre_secenek" id="filtre_secenek" onchange="this.form.submit()" class="form-control">
              <option value="">-----Filtrele-----</option>
              <option value="bos_odalar">Boş Odaları Göster</option>
              <option value="dolu_odalar">Dolu Odaları Göster</option>
              <option value="zemin_kat">Zemin Kattaki Odaları Göster</option>
              <option value="birinci_kat">Birinci Kattaki Odaları Göster</option>
              <option value="ikinci_kat">İkinci Kattaki Odaları Göster</option>
              <option value="ucuncu_kat">Üçüncü Kattaki Odaları Göster</option>
            </select>
          </div>
        </form>
      </div>
      <div class="col-lg-6">
        <form action="odalar.php" method="post">
          <div class="form-group">
            <select name="oda_ara" onchange="this.form.submit()" class="form-control">
              <option value="">----Oda Ara----</option>
              <?php
              include('functions/database_connection.php');

              $query = "SELECT oda_no FROM odalar;";
              $result = mysqli_query($conn, $query);
              while ($row = mysqli_fetch_array($result)) {
                ?>
                <option value="<?php echo $row["oda_no"]; ?>">
                  <?php echo $row["oda_no"]; ?>
                </option>
                <?php
              }
              ?>
            </select>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="container-fluid mt-4">
    <table class="table table-striped table-sm">
      <thead class="table-dark">
        <tr>
          <th style='vertical-align: middle;'>ID</th>
          <th style='vertical-align: middle;'>Oda No</th>
          <th style='vertical-align: middle;'>Yatak Kapasitesi</th>
          <th style='vertical-align: middle;'>Boş Yatak Sayısı</th>
          <th style='vertical-align: middle;'>Açıklama</th>
          <th style='vertical-align: middle;'>Düzenle</th>
        </tr>
      </thead>
      <?php include('functions/filtre.php'); ?>
  </div>
</body>

</html>