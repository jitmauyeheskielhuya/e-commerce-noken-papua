<?= $this->extend('template/layout_home'); ?>

<?= $this->Section('page-content'); ?>
<div class="page-wrapper">
  <div class="content container-fluid">
    <h4 class="text-emerald-400 pb-3">Halaman Edit Kriteria</h4>
    <div class="row">
      <div class="col-md-5 bg-emerald-100 py-3 px-3 rounded-md">
        <form action="<?= base_url('admin/update/' . $kriteria['id_kriteria']) ?>" method="post">
          <div class="mb-4">
            <label class="block text-emerald-400 font-medium text-base mb-2">Nama Kriteria</label>
            <input type="text" value="<?= $kriteria['nama_kriteria'] ?>" name="nama_kriteria" class="w-full border-gray-300 focus:border-indigo-500 rounded-md shadow-md py-2 px-2" required placeholder="Nama Kriteria">
          </div>
          <div class="mt-6">
            <button type="submit" class="inline-flex items-center px-4 py-2 hover:bg-emerald-400 bg-emerald-500 border border-transparent rounded-md font-semibold text-slate-900 focus:focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md">
              Update
            </button>
          </div>
          <div class="mt-6">
            <a href="<?= base_url('/kriteria') ?>" class="bg-emerald-500 px-2 py-2.5 rounded-md text hover:bg-emerald-400 text-slate-900 font-bold shadow-md hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><i class="fa fa-backward mr-1"></i>Kembali</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <footer class="bg-slate-400 mt-96 rounded-t-md">
    <p class="text-emerald-600">Copyright © <?= date('Y'); ?> Yeheskiel Jitmau</p>
  </footer>
</div>
<?= $this->endSection(); ?>