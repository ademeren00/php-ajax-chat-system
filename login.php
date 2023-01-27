<?php require_once("system/db.php"); ?>
<?php
if (isset($_SESSION["ad"])) {
    header("Location:index.php");
}
?>
<?php require_once("include/header.php"); ?>

<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="text-center mb-4">
                    <a href="index.html" class="auth-logo mb-5 d-block">
                        <img src="assets/images/logo-dark.png" alt="" height="30" class="logo logo-dark">
                        <img src="assets/images/logo-light.png" alt="" height="30" class="logo logo-light">
                    </a>

                    <h4>Sign in</h4>
                    <p class="text-muted mb-4">Sign in to continue to Chatvia.</p>

                </div>

                <div class="card">
                    <div class="card-body p-4">
                        <div class="p-3">
                            <form action="" method="POST" id="giris_yap">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <div class="input-group mb-3 bg-soft-light rounded-3">
                                        <span class="input-group-text text-muted" id="basic-addon3">
                                            <i class="ri-user-2-line"></i>
                                        </span>
                                        <input type="text" name="email" class="form-control form-control-lg border-light bg-soft-light" placeholder="Email" aria-label="Enter Username" aria-describedby="basic-addon3">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <div class="float-end">
                                        <a href="auth-recoverpw.html" class="text-muted font-size-13">Parolanızı mı unuttunuz?</a>
                                    </div>
                                    <label class="form-label">Parola</label>
                                    <div class="input-group mb-3 bg-soft-light rounded-3">
                                        <span class="input-group-text text-muted" id="basic-addon4">
                                            <i class="ri-lock-2-line"></i>
                                        </span>
                                        <input type="password" name="password" class="form-control form-control-lg border-light bg-soft-light" placeholder="Parola" aria-label="Enter Password" aria-describedby="basic-addon4">

                                    </div>
                                </div>

                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="remember-check">
                                    <label class="form-check-label" for="remember-check">Beni Hatırla</label>
                                </div>
                                <input type="hidden" value="<?=$_SESSION["_token"]?>" name="token">
                                <input type="hidden" value="<?=Sifrele("giris_yap")?>" name="islem">
                                <div class="d-grid">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Giriş Yap <span class="mySpinner"></span></button>
                                </div>
                                
                                <div class="messages mt-1">
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="mt-5 text-center">
                    <p>Don't have an account ? <a href="register.php" class="fw-medium text-primary"> Signup now </a> </p>
                    <p>© <script>
                            document.write(new Date().getFullYear())
                        </script> Chatvia. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end account-pages -->


<?php require_once("include/footer.php"); ?>