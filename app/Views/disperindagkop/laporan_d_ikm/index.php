<?= $this->extend('template/layout_home'); ?>

<?= $this->Section('page-content'); ?>
<div class="page-wrapper">
  <div class="content container-fluid">
    <h4 class="text-emerald-400 pb-3">Laporan Data IKM</h4>
    <div class="row pt-4 pb-4 rounded-md bg-slate-200">
      <div class="col">
        <p class="text-lg font-bold">Tabel Laporan Data IKM</p>
        <table class="w-full border border-slate-900 mt-4 text-center">
          <thead>
            <tr class="bg-emerald-200">
              <th class="py-2 px-4 border-b">Gambar</th>
              <th class="py-2 px-4 border-b">Nama Pengrajin</th>
              <th class="py-2 px-4 border-b">Jenis Noken</th>
              <th class="py-2 px-4 border-b">Lokasi Penjualan Produk</th>
              <th class="py-2 px-4 border-b">Stok Produk</th>
              <th class="py-2 px-4 border-b">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr class="bg-emerald-100">
              <td class="py-3 px-4 border-b">huya</td>
              <td class="py-3 px-4 border-b">Produk A</td>
              <td class="py-3 px-4 border-b">Rp 100.000</td>
              <td class="py-3 px-4 border-b">Rp 100.000</td>
              <td class="py-3 px-4 border-b">Rp 100.000</td>
              <td class="py-3 px-4 border-b">
                <a href="" class="bg-emerald-600 hover:bg-emerald-500 rounded p-2 text-white"><i class="fa fa-eye"></i></a>
              </td>
            </tr>
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