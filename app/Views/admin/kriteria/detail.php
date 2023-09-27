<?= $this->extend('template/layout_home'); ?>

<?= $this->Section('page-content'); ?>
<div class="page-wrapper">
  <div class="content container-fluid">
    <h4 class="text-emerald-400 pb-3">Halaman Deatail Kriteria</h4>
    <div class="card" style="width: 18rem;">
      <div class="card-body bg-slate-200 shadow-md rounded-md">
        <h5 class="card-title pb-3">Nama Kriteria : <?= $kriteria['nama_kriteria']; ?></h5>
        <h5 class="card-title pb-4">Bobot Kriteria : <?= $kriteria['bobot_kriteria']; ?></h5>
        <a href="<?= base_url('/kriteria') ?>" class="bg-emerald-500 px-2 py-2.5 rounded-md text hover:bg-emerald-400 text-slate-900 font-bold shadow-md hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><i class="fa fa-backward mr-1"></i>Kembali</a>
      </div>
    </div>
  </div>
  <footer class="bg-slate-400 mt-96 rounded-t-md">
    <p class="text-emerald-600">Copyright © <?= date('Y'); ?> Yeheskiel Jitmau</p>
  </footer>
</div>
<?= $this->endSection(); ?>