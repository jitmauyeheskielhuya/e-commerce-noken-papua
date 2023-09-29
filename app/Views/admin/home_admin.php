<?= $this->extend('template/layout_home'); ?>

<?= $this->Section('page-content'); ?>
<div class="page-wrapper">
  <div class="content container-fluid">
    <h3 class="text-emerald-400 pb-6">Selamat Datang <span class="font-bold font-monospace uppercase text-emerald-700"><?= user()->username ?>🙏</span></h3>
    <div class="row">
      <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
          <a href="<?= base_url('/akun') ?>" class="">
            <div class="card-body bg-teal-200 hover:bg-teal-300 rounded-md shadow-md">
              <div class="db-widgets d-flex justify-content-between align-items-center">
                <div class="db-info">
                  <h6>Akun Baru</h6>
                  <h3><?= $akun_baru; ?></h3>
                </div>
                <div class="">
                  <h4><i class="fa fa-users text-5xl text-teal-400"></i></h4>
                  <!-- <img src="<?= base_url(); ?>/template1/assets/img/icons/lesson-icon-05.svg" alt="Dashboard Icon"> -->
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <footer class="bg-slate-400 mt-96 rounded-t-md">
    <p class="text-emerald-600">Copyright © <?= date('Y'); ?> Yeheskiel Jitmau</p>
  </footer>
</div>
<?= $this->endSection(); ?>