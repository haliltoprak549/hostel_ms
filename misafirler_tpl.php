<div class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-4">Misafirler</h2>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <select id="misafir_sirala" onchange="javascript:misafir_sirala();"
            class="form-control">
            <option value="">ID'ye göre sırala</option>
            <option value="isme_gore">İsme Göre Sırala</option>
            <option value="tc_noya_gore">T.C. Kimlik Numarasına Göre Sırala</option>
            <option value="oda_noya_gore">Oda Numarasına Göre Sırala</option>
          </select>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <select id="oda_ara" onchange="javascript:misafir_sirala();" class="form-control">
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
      </div>
      <div class="col-lg-4">
        <div class="input-group">
          <input id="isim_ara" type="text" name="isim_ara" placeholder="Misafir Ara..." class="form-control">
          <button type="button" onclick="javascript:misafir_sirala()"
            class="btn btn-primary">Misafir Ara</button>
        </div>
      </div>
    </div>
  </div>
</div>