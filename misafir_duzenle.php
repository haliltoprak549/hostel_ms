<div class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Misafir Düzenle</h2>
        <form id="form_duzenle" action="javascript:misafir_duzenle();" method="post">
            <input type="hidden" name="id" value=<?php echo $_POST['json_id']; ?>>
            <div class="form-group">
                <label for="oda_no">Oda No<font color="red">*</font></label>
                <select required name="oda_no" id="oda_no" class="form-control" value="<?php echo $_POST['json_oda_no'] ?>">
                    <option value="">Oda No Seçin</option> <!-- value = NULL? -->
                    <?php 
                    
                    include('functions/database_connection.php');

                    $query = "SELECT oda_no FROM odalar;";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <option <?php if ($row['oda_no'] == $_POST['json_oda_no'])
                            echo "selected"; ?>
                            name="<?php echo $row["oda_no"]; ?>" value="<?php echo $row["oda_no"]; ?>">
                            <?php echo $row["oda_no"]; ?>
                        </option>
                        
                    <?php } ?>
                </select>
                <small class="form-text text-muted">Lütfen misafirin oda numarasını giriniz.</small>
            </div>
            <div class="form-group">
                <label for="adi_soyadi">Adı Soyadı<font color="red">*</font></label>
                <input required type="text" name="adi_soyadi" class="form-control" id="adi_soyadi"
                    aria-describedby="bedCapacityHelp" oninput="this.value = this.value.toUpperCase()" maxlength="100"
                    value="<?php echo $_POST['json_adi_soyadi']; ?>">
                <small class="form-text text-muted">Lütfen misafirin ad ve soyadını giriniz.</small>
            </div>
            <div class="form-group">
                <label for="tc_no">T.C. Kimlik No</label>
                <input type="number" id="tc_no" name="tc_no" class="form-control" aria-describedby="availableBedsHelp"
                    maxlength="11"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    value="<?php echo $_POST['json_tc_no']; ?>">
                <small class="form-text text-muted">Lütfen misafirin T.C. kimlik numarası giriniz.</small>
            </div>
            <div class="form-group">
                <label for="geldigi_il">Geldiği İl</label>
                <input type="text" name="geldigi_il" class="form-control" id="geldigi_il"
                    aria-describedby="availableBedsHelp" oninput="this.value = this.value.toUpperCase()" maxlength="50"
                    value="<?php echo $_POST['json_geldigi_il']; ?>">
                <small class="form-text text-muted">Lütfen misafirin geldiği ili giriniz.</small>
            </div>
            <div class="form-group">
                <label for="gorevi">Görevi</label>
                <input type="text" name="gorevi" class="form-control" id="gorevi" aria-describedby="availableBedsHelp"
                    oninput="this.value = this.value.toUpperCase()" maxlength="50"
                    value="<?php echo $_POST['json_gorevi']; ?>">
                <small class="form-text text-muted">Lütfen misafirin görevini giriniz.</small>
            </div>
            <div class="form-group">
                <label for="tlf_no">Telefon Numarası</label>
                <input type="number" id="tlf_no" name="tlf_no" class="form-control" aria-describedby="availableBedsHelp"
                    maxlength="10"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                    value="<?php echo $_POST['json_tlf_no']; ?>">
                <small class="form-text text-muted">Lütfen misafirin telefon numarasını (505)1231212 formatında arada
                    boşluk bırakmadan giriniz.</small>
            </div>
            <div class="form-group">
                <label for="giris_tarihi">Giriş Tarihi</label>
                <input type="date" name="giris_tarihi" class="form-control" id="giris_tarihi"
                    aria-describedby="availableBedsHelp" value="<?php echo $_POST['json_giris_tarihi'] ?>">
                <small class="form-text text-muted">Lütfen misafirin giriş tarihini giriniz.</small>
            </div>
            <div class="form-group">
                <label for="cikis_tarihi">Çıkış Tarihi</label>
                <input type="date" name="cikis_tarihi" class="form-control" id="cikis_tarihi"
                    aria-describedby="availableBedsHelp" value="<?php echo $_POST['json_cikis_tarihi'] ?>">
                <small class="form-text text-muted">Lütfen misafirin çıkış tarihini giriniz.</small>
            </div>
            <div class="form-check mb-3">

                <input class="form-check-input" name="aktif" value="1" type="checkbox" id="aktif_checkbox" <?php
                if ($_POST['json_aktif'] == '1')
                    echo "checked";
                else
                    echo "unchecked"; ?>>
                <label class="form-check-label" for="aktif_checkbox">Aktif (Misafir pansiyonda konaklıyor veya
                    konaklayacak.)</label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" name="cocuk" value="1" type="checkbox" id="cocuk_checkbox" <?php
                if ($_POST['json_cocuk'] == '1')
                    echo "checked";
                else
                    echo "unchecked"; ?>>
                <label class="form-check-label" for="cocuk_checkbox">Çocuk (Yatak kullanmayacak.)</label>
            </div>
            <div class="form-group">
                <label for="aciklama">Açıklama</label>
                <input type="text" name="aciklama" class="form-control" id="aciklama"
                    aria-describedby="availableBedsHelp" maxlength="100" value="<?php echo $_POST['json_aciklama'] ?>">
                <small class="form-text text-muted">Lütfen açıklama giriniz.</small>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Misafiri Düzenle</button>
        </form>
    </div>
</div>