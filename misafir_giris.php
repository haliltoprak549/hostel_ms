<?php include 'functions/giris_yap.php'; ?>
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
  <title>Yeni Misafir Ekle</title>
</head>

<body>
  <!-- Navigation Bar -->
  <div id="navigation">
    <script>$(function () { $("#navigation").load("http://localhost/pansiyon/navbar.html"); });</script>
  </div>

  <div class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center mb-5">Misafir Giriş Yap</h2>
      <form action="misafir_giris.php" method="post">
        <div class="form-group">
          <label for="oda_no">Oda No<font color="red">*</font></label>
          <select required name="oda_no" id="oda_no" class="form-control">
            <option value="">Oda No Seçin</option>
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
          <small class="form-text text-muted">Lütfen misafirin oda numarasını giriniz.</small>
        </div>
        <div class="form-group">
          <label for="adi_soyadi">Adı Soyadı<font color="red">*</font></label>
          <input required type="text" name="adi_soyadi" class="form-control" id="adi_soyadi"
            oninput="this.value = this.value.toUpperCase()" maxlength="100">
          <small class="form-text text-muted">Lütfen misafirin ad ve soyadını giriniz.</small>
        </div>
        <div class="form-group">
          <label for="tc_no">T.C. Kimlik No</label>
          <input type="number" id="tc_no" name="tc_no" class="form-control" maxlength="11"
            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
          <small class="form-text text-muted">Lütfen misafirin T.C. kimlik numarası giriniz.</small>
        </div>
        <div class="form-group">
          <label for="geldigi_il">Geldiği İl</label>
          <input type="text" name="geldigi_il" class="form-control" id="geldigi_il"
            oninput="this.value = this.value.toUpperCase()" maxlength="50">
          <small class="form-text text-muted">Lütfen misafirin geldiği ili giriniz.</small>
        </div>
        <div class="form-group">
          <label for="gorevi">Görevi</label>
          <input type="text" name="gorevi" class="form-control" id="gorevi"
            oninput="this.value = this.value.toUpperCase()" maxlength="50">
          <small class="form-text text-muted">Lütfen misafirin görevini giriniz.</small>
        </div>
        <div class="form-group">
          <label for="tlf_no">Telefon Numarası</label>
          <input type="number" id="tlf_no" name="tlf_no" class="form-control" maxlength="10"
            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
          <small class="form-text text-muted">Lütfen misafirin telefon numarasını (505)1231212 formatında arada boşluk
            bırakmadan giriniz.</small>
        </div>
        <div class="form-group">
          <label for="giris_tarihi">Giriş Tarihi</label>
          <input type="date" name="giris_tarihi" class="form-control" id="giris_tarihi"
            value="<?php echo date('Y-m-d'); ?>">
          <small class="form-text text-muted">Lütfen misafirin giriş tarihini giriniz.</small>
        </div>
        <div class="form-group">
          <label for="cikis_tarihi">Çıkış Tarihi</label>
          <input type="date" name="cikis_tarihi" class="form-control" id="cikis_tarihi">
          <small class="form-text text-muted">Lütfen misafirin çıkış tarihini giriniz.</small>
        </div>
        <div class="form-check mb-3">
          <input class="form-check-input" name="aktif" value="1" type="checkbox" id="aktif_checkbox" checked>
          <label class="form-check-label" for="aktif_checkbox">Aktif (Misafir pansiyonda konaklıyor veya konaklayacak.)</label>
        </div>
        <div class="form-check mb-3">
          <input class="form-check-input" name="cocuk" value="1" type="checkbox" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">Çocuk (Yatak kullanmayacak.)</label>
        </div>
        <div class="form-group">
          <label for="aciklama">Açıklama</label>
          <input type="text" name="aciklama" class="form-control" id="aciklama" maxlength="100">
          <small class="form-text text-muted">Lütfen açıklama giriniz.</small>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Yeni Misafir Ekle</button>
      </form>
    </div>
  </div>
</body>

</html>