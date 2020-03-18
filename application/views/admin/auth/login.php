<body class="theme-blush">

<div class="authentication mt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <form method="post" action="<?=base_url()?>admin/auth/login" class="card mt-5 auth_form">
                    <div class="header">
                        <img class="logo" src="<?=base_url()?>assets/admin/images/logo.png" alt="">
                        <h5>LOGIN</h5>
                    </div>
                    <div class="body">
                        <?php echo $this->session->flashdata('pesan');?>
                        <div class="input-group mb-3">
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                            </div>
                        </div>
                        <?= form_error('username', '<div class="text-danger mt-n2 mb-1 text-center small">', '</div>')?>
                        <div class="input-group mb-3">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">                                
                                <span class="input-group-text"><i class="zmdi zmdi-lock"></i></a></span>
                            </div>                           
                        </div>
                        <?= form_error('password', '<div class="text-danger mt-n2 mb-1 text-center small">', '</div>')?> 
                        <!-- <div class="checkbox">
                            <input id="remember_me" type="checkbox">
                            <label for="remember_me">Remember Me</label>
                        </div> -->
                        <button type="submit" class="btn mb-3 btn-primary btn-block waves-effect waves-light">SIGN IN</button>                        
                        <!-- <div class="signin_with mt-3">
                            <p class="mb-0">or Sign Up using</p>
                            <button class="btn btn-primary btn-icon btn-icon-mini btn-round facebook"><i class="zmdi zmdi-facebook"></i></button>
                            <button class="btn btn-primary btn-icon btn-icon-mini btn-round twitter"><i class="zmdi zmdi-twitter"></i></button>
                            <button class="btn btn-primary btn-icon btn-icon-mini btn-round google"><i class="zmdi zmdi-google-plus"></i></button>
                        </div> -->
                    </div>
                </form>
                <!-- <div class="copyright text-center">
                    &copy;
                    <script>document.write(new Date().getFullYear())</script>,
                    <span>Designed by <a href="https://thememakker.com/" target="_blank">ThemeMakker</a></span>
                </div> -->
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <img src="<?=base_url()?>assets/admin/images/signin.svg" alt="Sign In"/>
                </div>
            </div>
        </div>
    </div>
</div>