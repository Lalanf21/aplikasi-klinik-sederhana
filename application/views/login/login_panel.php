<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/all.css') ?>">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/components.css') ?>">

    <style>
        body {
            background-image: url('<?= base_url("assets/img/bg_log.png") ?>');
        }
    </style>
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class=" col-sm-8 offset-sm-2 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-4 offset-xl-4">
                        <!-- <div class="login-brand">
                            <img src="" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div> -->

                        <div class="card bg-transparent">
                            <div class="card-header text-center">
                                <h2 class="text-center text-uppercase">Form Login</h2>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12 col-sm-12 col-lg-12">
                                    <?= $this->session->flashdata('alert') ?>
                                </div>
                                <?= form_open('login/process/login') ?>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input id="username" type="text" class="form-control" name="username" autofocus autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="Password" class="form-control" name="password" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                Login !
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="simple-footer">
                    Copyright &copy; Dea 2019
                </div>
            </div>
    </div>
    </div>
    </section>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url('assets/js/jquery.js') ?>"></script>

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

    <script src="<?= base_url('assets/js/stisla.js') ?>"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="<?= base_url('assets/js/scripts.js') ?>"></script>
    <script src="<?= base_url('assets/js/custom.js') ?>"></script>

    <!-- Page Specific JS File -->
</body>

</html>