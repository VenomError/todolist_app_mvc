<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="text-center mt-sm-5 mb-4 text-white-50">
                <div>
                    <a href="/" class="d-inline-block auth-logo">
                        <img src="assets/images/logo-light.png" alt="" height="20">
                    </a>
                </div>
                <p class="mt-3 fs-15 fw-medium">Praktikum Web Native - Todo List Application</p>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">

                <div class="card-body p-4">
                    <div class="text-center mt-2">
                        <h5 class="text-primary">Welcome Back !</h5>
                        <p class="text-muted">Sign up to continue.</p>

                        <?php if (error('register')) {
                            ?>
                            <div class="alert alert-danger alert-dismissible shadow fade show" role="alert">
                                <strong>
                                    <?= errorMessage('register') ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                            </div>
                            <?php
                        } ?>

                    </div>
                    <div class="p-2 mt-4">
                        <form action="/register" method="post">

                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Full Name"
                                    name="name">
                                <?php
                                if (error('name')) {
                                    ?>
                                    <small class="text-danger"><?= errorMessage('name') ?></small>
                                    <?php
                                } ?>

                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter Email"
                                    name="email">
                                <?php
                                if (error('name')) {
                                    ?>
                                    <small class="text-danger"><?= errorMessage('name') ?></small>
                                    <?php
                                } ?>

                            </div>



                            <div class="mb-3">
                                <label class="form-label" for="password-input">Password</label>
                                <div class="position-relative auth-pass-inputgroup ">
                                    <input type="password" class="form-control pe-5 password-input"
                                        placeholder="Enter password" id="password-input" name="password" required>
                                    <button
                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted shadow-none password-addon"
                                        type="button" id="password-addon"><i
                                            class="ri-eye-fill align-middle"></i></button>
                                </div>
                                <?php
                                if (error('password')) {
                                    ?>
                                    <small class="text-danger"><?= errorMessage('password') ?></small>
                                    <?php
                                } ?>
                            </div>

                            <div class="mt-4">
                                <button class="btn btn-success w-100" type="submit">Register</button>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="mt-4 text-center">
                <p class="mb-0">sudah punya akun ? <a href="login"
                        class="fw-semibold text-primary text-decoration-underline"> Login </a> </p>
            </div>

        </div>
    </div>
    <!-- end row -->
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script>
        const notyf = new Notyf();
        <?php
        if (success('register')) {
            ?>
            notyf.success('<?= successMessage('register') ?>');
        <?php } ?>
        <?php
        if (error('register')) {
            ?>
            notyf.error('<?= errorMessage('register') ?>');
        <?php } ?>
    </script>
</div>