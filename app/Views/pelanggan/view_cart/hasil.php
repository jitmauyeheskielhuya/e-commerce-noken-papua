<div class="container">
  <div class="row">
    <div class="col">
      <h3>hasil</h3>
      <strong>pengiriman dari: </strong>
      <?= $kota->rajaongkir->origin_details->city_name ?>
      <?= $kota->rajaongkir->origin_details->province ?>
      <br>

      <strong>Tujuan Ke: </strong>
      <?= $hasil->rajaongkir->destination_details->city_name ?>
      <?= $hasil->rajaongkir->destination_details->province ?>
      <br>

      <strong>Menggunakan Jasa Kurir: </strong>
      <?= $hasil->rajaongkir->results[0]->name ?>
      <br>

      <strong>Berat Paket: </strong>
      <?= ($hasil->rajaongkir->query->weight / 100) ?>Kg
      <br>

      <strong>Biaya Pengiriman: </strong><br>
      <?php foreach ($hasil->rajaongkir->results[0]->costs as $biaya) : ?>
        <?= $biaya->service ?>: Rp. <?= number_format($biaya->cost[0]->value) ?> (<?= $biaya->cost[0]->etd ?> hari) <br>
      <?php endforeach; ?>
      <br>
    </div>
  </div>
</div>