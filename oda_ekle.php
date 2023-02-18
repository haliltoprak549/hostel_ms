<?php include 'functions/oda_ekle.php'; ?>
<!DOCTYPE html>
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
  <title>Oda Ekle</title>
</head>

<body>
  <!-- Navigation Bar -->
  <div id="navigation">
    <script>$(function () { $("#navigation").load("http://localhost/pansiyon/navbar.html"); });</script>
  </div>

  <div class="container mt-5">
    <h2 class="text-center mb-5">Oda Ekle</h2>
    <form action="oda_ekle.php" method="post">
      <div class="form-group">
        <label for="oda_no">Oda No<font color="red">*</font></label>
        <input required type="text" name="oda_no" class="form-control" id="oda_no"
          oninput="this.value = this.value.toUpperCase()" maxlength="3">
        <small id="roomNumberHelp" class="form-text text-muted">Lütfen oda numarasını giriniz.</small>
      </div>
      <div class="form-group">
        <label for="yatak_kapasitesi">Yatak Kapasitesi<font color="red">*</font></label>
        <input required type="number" name="yatak_kapasitesi" class="form-control" id="yatak_kapasitesi"
          aria-describedby="bedCapacityHelp">
        <small id="bedCapacityHelp" class="form-text text-muted">Lütfen yatak kapasitesini giriniz.</small>
      </div>
      <div class="form-group">
        <label for="bos_yatak">Boş Yatak<font color="red">*</font></label>
        <input required type="number" name="bos_yatak" class="form-control" id="bos_yatak"
          aria-describedby="availableBedsHelp">
        <small id="availableBedsHelp" class="form-text text-muted">Lütfen boş yatak sayısını giriniz.</small>
      </div>
      <div class="form-group">
        <label for="aciklama">Açıklama</label>
        <input type="text" name="aciklama" class="form-control" id="aciklama" aria-describedby="availableBedsHelp">
        <small id="availableBedsHelp" class="form-text text-muted">Lütfen oda açıklaması giriniz.</small>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>

</html>