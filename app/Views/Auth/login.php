<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<!-- <div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Halaman Login</h3>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="bg-login">
    <div class="container">
        <div class="row" id="pwd-container">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <section class="login-form">


                    <?= view('Myth\Auth\Views\_message_block') ?>
                    <form method="post" action="<?= url_to('login') ?>" role="login">

                        <?= csrf_field() ?>
                        <img src="/favicon.ico" class="img-responsive" alt="" />

                        <?php if ($config->validFields === ['email']) : ?>
                            <label for="login"><?= lang('Auth.email') ?> </label>
                            <input type="email" name="login" placeholder="<?= lang('Auth.email') ?>" required class="form-control input-lg <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" />
                            <div class="invalid-feedback">
                                <?= session('errors.login') ?>
                            </div>
                        <?php else : ?>
                            <label for="login"><?= lang('Auth.email') ?> </label>
                            <input type="email" name="login" placeholder="<?= lang('Auth.email') ?>" required class="form-control input-lg <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" />
                            <div class="invalid-feedback">
                                <?= session('errors.login') ?>
                            </div>
                        <?php endif; ?>

                        <label for="password"><?= lang('Auth.password') ?></label>
                        <input type="password" name="password" class="form-control input-lg <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="password" placeholder="<?= lang('Auth.password') ?>" required="" />

                        <?php if ($config->allowRemembering) : ?>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                    <?= lang('Auth.rememberMe') ?>
                                </label>
                            </div>
                        <?php endif; ?>



                        <button type="submit" name="go" class="btn btn-lg btn-primary btn-block"><?= lang('Auth.loginAction') ?></button>
                        <?php if ($config->allowRegistration) : ?>
                            <p><a href="<?= url_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>
                        <?php endif; ?>
                        <?php if ($config->activeResetter) : ?>
                            <p><a href="<?= url_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
                        <?php endif; ?>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>