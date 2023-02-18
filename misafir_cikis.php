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
  <title>Misafir Çıkış</title>
</head>

<body>
  <!-- Navigation Bar -->
  <div id="navigation">
    <script>$(function () { $("#navigation").load("http://localhost/pansiyon/navbar.html"); });</script>
  </div>

  <div class="container mt-5">
    <h2 class="text-center mb-5">Misafir Çıkış Yap</h2>
    <form action="functions/cikis_yap.php" method="get">
      <div class="form-group">
        <label for="tc_no">T.C. Kimlik No</label>
        <input type="text" name="tc_no" class="form-control" id="tc_no" aria-describedby="roomNumberHelp">
        <small class="form-text text-muted">Lütfen misafirin T.C. kimlik numarasını giriniz.</small>
      </div>
      <input type="hidden" name="misafir_cikis_sayfasindan_yonlendirildi" value="1">
      <button type="submit" class="btn btn-primary">Çıkış Yap</button>
    </form>
  </div>
</body>

</html>