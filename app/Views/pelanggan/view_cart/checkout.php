<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="<?= base_url() ?>/css/app.css">
  <link rel="stylesheet" href="<?= base_url() ?>/bootstrap/css/bootstrap.min.css">

</head>


<body>





  </section>

  <section>
    <div class="container bg-slate-200 mt-5">
      <div class="row px-4 py-4">
        <div class="col-md-12 flex justify-center items-center">
          <table class="py-3 px-3 mb-20 table">
            <thead>
              <tr>
                <th class="pr-20">no</th>
                <th class="pr-20">produk</th>
                <th class="pr-20">harga</th>
                <th>subharga</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>x</td>
                <td>x</td>
                <td>x</td>
                <td>x</td>
              </tr>
            </tbody>
          </table>
        </div>

        <h3 class="text-xl font-bold text-slate-700">Alamat</h3>
        <form action="" method="post">
          <div class="row flex">
            <div class="col-md-3 pr-5">
              <div class="form-group">
                <label for="">Provinsi</label>
                <div>
                  <select name="nama_provinsi" class="form-control">
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-3 pr-5">
              <div class="form-group">
                <label for="">Distrik</label>
                <div>
                  <select name="nama_distrik" class="form-control">
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="">Expedisi</label>
                <div>
                  <select name="nama_ekspedisi" class="form-control">

                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="">Paket</label>
                <div>
                  <select name="nama_paket" class="form-control">

                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="">berat</label>
              <input type="text" name="total_berat" value="1200">
            </div>
            <div class="">
              <input class="mb-3" type="text" name="provinsi">
              <input class="mb-3" type="text" name="distrik">
              <input class="mb-3" type="text" name="tipe">
              <input class="mb-3" type="text" name="kodepos">
              <input class="mb-3" type="text" name="ekspedisi">
              <input class="mb-3" type="text" name="paket">
              <input class="mb-3 number" type="text" name="ongkir">
              <input class="mb-3" type="text" name="estimasi">

            </div>
          </div>
        </form>
      </div>
    </div>
  </section>





  <script src="<?= base_url('bootstrap') ?>/js/jquery.min.js"></script>
  <script src="<?= base_url('bootstrap') ?>/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function() {
      $.ajax({
        type: 'post',
        url: '/pelanggan/dataprov',
        success: function(hasil_prov) {
          $("select[name=nama_provinsi]").html(hasil_prov);
          // console.log(hasil);
        }
      });

      $("select[name=nama_provinsi]").on("change", function() {
        // ambil id_provinsi yang dipilih (dari atribut pribadi)
        var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
        // alert(id_provinsi_terpilih);
        $.ajax({
          type: 'post',
          url: '/pelanggan/datadistrik',
          data: 'id_provinsi=' + id_provinsi_terpilih,
          success: function(hasil_distrik) {
            // console.log(hasil_distrik);
            $("select[name=nama_distrik]").html(hasil_distrik);
          }
        });
      });

      $.ajax({
        type: 'post',
        url: '/pelanggan/dataekspedisi',
        success: function(hasil_ekspedisi) {
          // console.log(hasil_ekspedisi);
          $("select[name=nama_ekspedisi]").html(hasil_ekspedisi);
        }
      });
      $("select[name=nama_ekspedisi]").on("change", function() {
        // mendapatkan data ongkos kirim

        // mendapatkan ekspedisi yang dipilih
        var ekspedisi_terpilih = $("select[name=nama_ekspedisi").val();
        // alert(ekspedisi_terpilih);
        // mendapatkan id_distrik yang dipilih pengguna
        var distrik_terpilih = $("option:selected", "select[name=nama_distrik]").attr("id_distrik");
        // alert(distrik_terpilih);
        // mendapatkan total_berat dari inputan
        var total_berat = $("input[name=total_berat").val();
        $.ajax({
          type: 'post',
          url: '/pelanggan/datapaket',
          data: 'ekspedisi=' + ekspedisi_terpilih + '&distrik=' + distrik_terpilih + '&berat=' + total_berat,
          success: function(hasil_paket) {
            // console.log(hasil_paket);
            $("select[name=nama_paket]").html(hasil_paket);

            // letakan nama ekspedisi terpilih di input ekspedisi
            $("input[name=ekspedisi]").val(ekspedisi_terpilih);
          }
        })
      });

      $("select[name=nama_distrik]").on("change", function() {
        // ambil id_provinsi yang dipilih (dari atribut pribadi)
        var prov = $("option:selected", this).attr("nama_provinsi");
        var dist = $("option:selected", this).attr("nama_distrik");
        var tipe = $("option:selected", this).attr("tipe_distrik");
        var kodepos = $("option:selected", this).attr("kodepos");
        // alert(provinsi_terpilih);

        $("input[name=provinsi]").val(prov);
        $("input[name=distrik]").val(dist);
        $("input[name=tipe]").val(tipe);
        $("input[name=kodepos]").val(kodepos);
      });

      $("select[name=nama_paket]").on("change", function() {
        var paket = $("option:selected", this).attr("paket");
        var ongkir = $("option:selected", this).attr("ongkir");
        var etd = $("option:selected", this).attr("etd");
        $("input[name=paket]").val(paket);
        $("input[name=ongkir]").val(ongkir);
        $("input[name=estimasi]").val(etd);
      })
    });
  </script>
</body>

</html>