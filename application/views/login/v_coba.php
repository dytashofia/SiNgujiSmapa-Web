<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Guru</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 text-center mt-5 mx-auto p-4">
                <h1 class="h2">Login Guru</h1>
                <p class="lead">Silahkan masuk ke Panel Guru</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-5 mx-auto mt-5">
                <form action="<?php echo base_url('login/login/aksi_login'); ?>" method="post"> 
                    <div class="form-group">
                        <label for="username">username</label>
                        <input type="text" class="form-control" name="username" placeholder="masukkan username" required />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="masukkan password" required />
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="rememberme" id="rememberme" />
                                <label class="custom-control-label" for="rememberme"> Ingat Saya</label>
                            <!-- </div> -->
                            <!-- <a href="<?= site_url('reset_password') ?>">Lupa Password?</a> -->
                        <!-- </div> -->
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success w-100" value="LOGIN" />
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>