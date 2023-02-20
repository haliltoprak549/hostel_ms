function misafir_tpl_yukle() {
  $.ajax({
    type: "POST",
    url: "misafirler_tpl.php",
    data: {},
    success: function (data) {
      document.getElementById('tpl').innerHTML = data;
    },
    error: function (xhr, status, error) {
      console.error(xhr);
    }
  });
}

function misafir_tablo_yenile(query) {
  $.ajax({
    type: "POST",
    url: 'functions/misafir_listele.php',
    data: {
      data_query: query
    },
    success: function (returned_data) {
      document.getElementById('div_tablo').innerHTML = returned_data;
    },
    error: function (xhr, status, error) {
      console.error(xhr);
    }
  });
}

function misafir_sirala(query) {
  var query = "SELECT m.id, o.oda_no, m.adi_soyadi, m.adi_soyadi, m.tc_no, m.geldigi_il, m.gorevi, m.tlf_no, m.giris_tarihi, m.cikis_tarihi, m.aktif, m.aciklama, m.cocuk FROM misafirler AS m LEFT JOIN odalar AS o ON m.oda_id = o.id ";

  var sirala = document.getElementById('misafir_sirala').value;
  var oda_ara = document.getElementById('oda_ara').value;
  var isim_ara = document.getElementById('isim_ara').value;
  
  if (isim_ara !== '') query += "WHERE m.adi_soyadi LIKE \"%" + isim_ara + "%\" ";
  else if (oda_ara !== '') query += "WHERE o.oda_no LIKE \"%" + oda_ara + "%\" ";

  if (sirala == 'isme_gore') query += "ORDER BY m.adi_soyadi;";
  else if (sirala == 'tc_noya_gore') query += "ORDER BY m.tc_no;";
  else if (sirala == 'oda_noya_gore') query += "ORDER BY o.oda_no;";

  misafir_tablo_yenile(query);
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