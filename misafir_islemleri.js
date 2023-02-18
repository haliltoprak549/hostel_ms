function misafir_tablo_yenile() {
  $.ajax({
    type: "POST",
    url: 'functions/misafir_listele.php',
    data: {},
    success: function (returned_data) {
      document.getElementById('div_tablo').innerHTML = returned_data;
    },
    error: function (xhr, status, error) {
      console.error(xhr);
    }
  });
}

function misafir_sirala() {
  $.ajax({
    type: "POST",
    url: 'functions/misafir_listele.php',
    data: {
      sirala: document.getElementById('misafir_sirala').value,
      oda_ara: document.getElementById('oda_ara').value
    },
    success: function (returned_data) {
      document.getElementById('div_tablo').innerHTML = returned_data;
    },
    error: function (xhr, status, error) {
      console.error(xhr);
    }
  });
}

function misafir_duzenle_sayfasi(id, oda_no, adi_soyadi, tc_no, geldigi_il, gorevi, tlf_no, giris_tarihi, cikis_tarihi, aktif, aciklama, cocuk) {
  $.ajax({
    type: 'POST',
    url: 'misafir_duzenle.php',
    data: {
      json_id: id,
      json_oda_no: oda_no,
      json_adi_soyadi: adi_soyadi,
      json_tc_no: tc_no,
      json_geldigi_il: geldigi_il,
      json_gorevi: gorevi,
      json_tlf_no: tlf_no,
      json_giris_tarihi: giris_tarihi,
      json_cikis_tarihi: cikis_tarihi,
      json_aktif: aktif,
      json_aciklama: aciklama,
      json_cocuk: cocuk
    },
    success: function (returned_data) {
      console.log(returned_data);
      document.getElementById('body').innerHTML = '<span id="tpl"></span><span id="div_tablo"></span>';
      document.getElementById('body2').innerHTML = returned_data;
      window.scrollTo({ top: 0, behavior: 'smooth' });
    },
    error: function (xhr, status, error) {
      console.error(xhr);
    }
  });
}

function misafir_duzenle() {
  var params = {};
  $('#form_duzenle').serializeArray().map(function (x) { params[x.name] = x.value; });
  console.log(params);
  $.ajax({
    type: 'POST',
    url: 'functions/duzenle.php',
    data: {
      id: params['id'],
      oda_no: params['oda_no'],
      adi_soyadi: params['adi_soyadi'],
      tc_no: params['tc_no'],
      geldigi_il: params['geldigi_il'],
      gorevi: params['gorevi'],
      tlf_no: params['tlf_no'],
      giris_tarihi: params['giris_tarihi'],
      cikis_tarihi: params['cikis_tarihi'],
      aktif: params['aktif'],
      aciklama: params['aciklama'],
      cocuk: params['cocuk']
    },
    success: function (data) {
      document.getElementById('div_alert').innerHTML = data;
      misafir_tpl_yukle();
      misafir_tablo_yenile();
      document.getElementById('body2').innerHTML = "";
      window.scrollTo({ top: 0, behavior: 'smooth' });
    },
    error: function (xhr, status, error) {
      console.error(xhr);
    }
  });
}

function misafir_cikis_yap(id, cocuk) {
  if (confirm('Misafirin çıkışını yapmak istediğine emin misin?')) {
    $.ajax({
      type: "POST",
      url: 'functions/cikis_yap.php',
      data: {
        json_id: id,
        json_cocuk: cocuk
      },
      success: function (data) {
        document.getElementById('div_alert').innerHTML = data;
        misafir_tablo_yenile();
        window.scrollTo({ top: 0, behavior: 'smooth' });
      },
      error: function (xhr, status, error) {
        console.error(xhr);
      }
    });
  }
}
function misafir_sil(id, oda_no, cocuk) {
  if (confirm('Misafiri silmek istediğine emin misin?')) {
    $.ajax({
      type: "POST",
      url: 'functions/misafir_sil.php',
      data: {
        json_id: id,
        json_oda_no: oda_no,
        json_cocuk: cocuk
      },
      success: function (data) {
        document.getElementById('div_alert').innerHTML = data;
        misafir_tablo_yenile();
        window.scrollTo({ top: 0, behavior: 'smooth' });
      },
      error: function (xhr, status, error) {
        console.error(xhr);
      }
    });
  }
}

function misafir_tpl_yukle() {
  $.ajax({
    type: "POST",
    url: 'misafirler_tpl.php',
    data: {},
    success: function (data) {
      document.getElementById('tpl').innerHTML = data;
    },
    error: function (xhr, status, error) {
      console.error(xhr);
    }
  });
}