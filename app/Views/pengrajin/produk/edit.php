<?= $this->extend('template/layout_home'); ?>

<?= $this->Section('page-content'); ?>
<div class="page-wrapper">
  <div class="content container-fluid">
    <h4 class="text-emerald-400 pb-3">Halaman Tambah Produk</h4>
    <div class="row">
      <div class="bg-slate-100 col-5 p-4 rounded-md shadow-md">
        <h1 class="text-2xl font-bold mb-2 text-emerald-400">Form Input Noken</h1>

        <?php
        $inputs = session()->getFlashdata('inputs');
        $errors = session()->getFlashdata('errors');
        if (!empty($errors)) { ?>
          <div class="alert alert-danger">
            Ada Kesalahan :
            <ul>
              <?php foreach ($errors as $errors => $value) { ?>
                <li>
                  <?= esc($errors); ?>
                </li>
              <?php } ?>
            </ul>
          </div>
        <?php } ?>

        <?= form_open_multipart(base_url('pengrajin/update_produk/' . $produk['id_produk'])); ?>
        <div class="mb-4">
          <label for="harga" class="block font-medium mb-2 text-emerald-400">Harga Noken</label>
          <input type="text" value="<?= $produk['harga_noken'] ?>" name="harga_noken" class="border border-gray-300 px-4 py-2 w-full rounded-md shadow-md">
        </div>
        <div class="mb-4">
          <label for="pengrajin" class="block font-medium mb-2 text-emerald-400">Nama Pengrajin</label>
          <input type="text" value="<?= user()->username ?>" name="" class="border border-gray-300 px-4 py-2 w-full rounded-md shadow-md">
        </div>
        <div class="mb-4">
          <label for="lokasi" class="block font-medium mb-2 text-emerald-400">Lokasi Penjualan</label>
          <input type="text" value="<?= $produk['lokasi_penjualan'] ?>" name="lokasi_penjualan" class="border border-gray-300 px-4 py-2 w-full rounded-md shadow-md">
        </div>
        <div class="mb-4">
          <label for="gambar" class="block font-medium mb-2 text-emerald-400">Gambar Noken</label>
          <input type="file" value="" name="gambar_noken" class="border border-gray-300 px-4 py-2 w-full rounded-md shadow-md">
          <img src="/gambar_noken/<?= $produk['gambar_noken'] ?>" alt="" width="100" srcset="">
        </div>
        <div class="mb-4">
          <label for="tgl_daftar" class="block font-medium mb-2 text-emerald-400">Tanggal Daftar</label>
          <input type="date" value="<?= $produk['tgl_daftar'] ?>" name="tgl_daftar" class="border border-gray-300 px-4 py-2 w-full rounded-md shadow-md">
        </div>
        <div class="flex justify-start">
          <button type="submit" class="bg-emerald-500 hover:bg-emerald-400 text-white py-2 px-4 rounded-md shadow-md">Simpan</button>
        </div>
        <?= form_close(); ?>
      </div>
    </div>
    <footer class=" bg-slate-400 mt-96 rounded-t-md">
      <p class="text-emerald-600">Copyright © <?= date('Y'); ?> Yeheskiel Jitmau</p>
    </footer>
  </div>
  <?= $this->endSection(); ?>