<?php

use App\Models\ProdukModel;
?>
<?= $this->extend('template/layout_home'); ?>

<?= $this->Section('page-content'); ?>
<div class="page-wrapper">
  <div class="content container-fluid">
    <h4 class="text-emerald-400 pb-3">Halaman Laporan Data Produk</h4>
    <div class="row pt-4 pb-4 rounded-md bg-slate-200">
      <div class="col">
        <p class="text-lg font-bold pt-3">Tabel Data Produk</p>


        <table class="w-full border border-slate-900 text-center datatable table table-stripped ">
          <thead>
            <tr class="bg-emerald-200 text-center">
              <th class="py-2 px-3 border-b">No</th>
              <th class="py-2 px-3 border-b">Gambar</th>
              <th class="py-2 px-3 border-b">Harga</th>
              <th class="py-2 px-3 border-b">Ukuran</th>
              <th class="py-2 px-3 border-b">Motif</th>
              <th class="py-2 px-3 border-b">Jenis</th>
              <th class="py-2 px-3 border-b">Nama Pengrajin</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($produks as $key => $value) : ?>
              <tr class="bg-emerald-100 text-center">
                <td class="py-3 px-4 border-b"><?= $key + 1 ?></td>
                <td class="py-3 px-4 border-b flex justify-center"><img width="50" src="/gambar_noken/<?= $value->gambar_noken ?>"></td>
                <td class="py-3 px-4 border-b"><?= $value->harga_noken ?></td>
                <td class="py-3 px-4 border-b"><?= $value->ukuran_noken ?></td>
                <td class="py-3 px-4 border-b"><?= $value->motif_noken ?></td>
                <td class="py-3 px-4 border-b"><?= $value->jenis_noken ?></td>
                <td class="py-3 px-4 border-b"><?= $value->nama_depan ?></td>
              <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <footer class="bg-slate-400 mt-96 rounded-t-md">
    <p class="text-emerald-600">Copyright © <?= date('Y'); ?> Yeheskiel Jitmau</p>
  </footer>
</div>
<?= $this->endSection(); ?>