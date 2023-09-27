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
            <h1><?= lang('Auth.loginTitle') ?></h1>

            <?= view('Myth\Auth\Views\_message_block') ?>

            <h2>Sign in</h2>

            <form action="<?= url_to('login') ?>" method="post">
              <?= csrf_field() ?>

              <?php if ($config->validFields === ['email']) : ?>
                <div class="form-group">
                  <label><?= lang('Auth.email') ?> <span class="login-danger">*</span></label>
                  <input class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" type="email" name="login">
                  <div class="invalid-feedback">
                    <?= session('errors.login') ?>
                  </div>
                </div>
              <?php else : ?>
                <div class="form-group">
                  <label><?= lang('Auth.emailOrUsername') ?> <span class="login-danger">*</span></label>
                  <input class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" type="text" name="login">
                  <div class="invalid-feedback">
                    <?= session('errors.login') ?>
                  </div>
                </div>
              <?php endif; ?>

              <div class="form-group">
                <label><?= lang('Auth.password') ?> <span class="login-danger">*</span></label>
                <input class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?> pass-input" type="password" name="password">
                <div class="invalid-feedback">
                  <?= session('errors.password') ?>
                </div>
                <span class="profile-views feather-eye toggle-password"></span>
              </div>

              <?php if ($config->allowRemembering) : ?>
                <div class="forgotpass">
                  <div class="remember-me">
                    <label class="custom_check mr-2 mb-0 d-inline-flex remember-me"> <?= lang('Auth.rememberMe') ?>
                      <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
              <?php endif; ?>

              <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit"><?= lang('Auth.loginAction') ?></button>
              </div>
            </form>

            <hr>

            <?php if ($config->allowRegistration) : ?>
              <p><a href="<?= url_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>
            <?php endif; ?>
            <?php if ($config->activeResetter) : ?>
              <p><a href="<?= url_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
            <?php endif; ?>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>