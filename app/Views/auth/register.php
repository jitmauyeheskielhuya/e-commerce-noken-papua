<?= $this->extend('auth/template'); ?>

<?= $this->section('content'); ?>
<div class="main-wrapper login-body">
  <div class="login-wrapper">
    <div class="container">
      <div class="loginbox">
        <div class="login-left">
          <img class="img-fluid pb-14" src="<?= base_url(); ?>/template1/assets/img/k2.png" alt="Logo">
        </div>
        <div class="login-right">
          <div class="login-right-wrap">
            <h1><?= lang('Auth.register') ?></h1>
            <p class="account-subtitle">Enter details to create your account</p>

            <?= view('Myth\Auth\Views\_message_block') ?>

            <form action="<?= url_to('register') ?>" method="post" class="user">
              <?= csrf_field() ?>

              <div class="form-group">
                <label>Nama Depan<span class="login-danger">*</span></label>
                <input class="form-control <?php if (session('errors.nama_depan')) : ?>is-invalid<?php endif ?>" required type="text" name="nama_depan" value="<?= old('nama_depan') ?>">
              </div>
              <div class="form-group">
                <label>Nama Belakang<span class="login-danger">*</span></label>
                <input class="form-control <?php if (session('errors.nama_belakang')) : ?>is-invalid<?php endif ?>" required type="text" name="nama_belakang" value="<?= old('nama_belakang') ?>">
              </div>
              <div class="form-group">
                <label>No Hp<span class="login-danger">*</span></label>
                <input class="form-control <?php if (session('errors.no_hp')) : ?>is-invalid<?php endif ?>" type="text" required name="no_hp" value="<?= old('no_hp') ?>">
              </div>
              <div class="form-group">
                <label>Alamat<spn class="login-danger">*</span></label>
                <input class="form-control <?php if (session('errors.alamat')) : ?>is-invalid<?php endif ?>" type="text" required name="alamat" value="<?= old('alamat') ?>">
              </div>
              <div class="form-group">
                <label>Hak Akses/Role<spn class="login-danger">*</span></label>
                <select id="harga-noke" name="harga_noke" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                  <!-- azsbcdhsa -->
                  <option value=""><label for="">--pilih Hak Akses--</label></option>
                  <option value="pengrajin">pengrajin</option>
                  <option value="pelanggan">pelanggan</option>
                </select>
              </div>
              <div class="form-group">
                <label><?= lang('Auth.email') ?> <span class="login-danger">*</span></label>
                <input class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" type="email" name="email" value="<?= old('email') ?>">
                <!-- <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small> -->
              </div>
              <div class="form-group">
                <label><?= lang('Auth.username') ?> <span class="login-danger">*</span></label>
                <input class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" type="text" name="username" value="<?= old('username') ?>">
              </div>
              <div class="form-group">
                <label><?= lang('Auth.password') ?> <span class="login-danger">*</span></label>
                <input class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?> pass-input" type="password" name="password" autocomplete="off">
                <span class="profile-views feather-eye toggle-password"></span>
              </div>
              <div class="form-group">
                <label><?= lang('Auth.repeatPassword') ?> <span class="login-danger">*</span></label>
                <input class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?> pass-confirm" type="password" name="pass_confirm" autocomplete="off">
                <span class="profile-views feather-eye reg-toggle-password"></span>
              </div>
              <div class=" dont-have"><?= lang('Auth.alreadyRegistered') ?> <a href="<?= url_to('login') ?>"><?= lang('Auth.signIn') ?></a></div>
              <div class="form-group mb-0">
                <button class="btn btn-primary btn-block" type="submit"><?= lang('Auth.register') ?></button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>