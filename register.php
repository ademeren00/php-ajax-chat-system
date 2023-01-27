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

                    <h4>Sign up</h4>
                    <p class="text-muted mb-4">Get your Chatvia account now.</p>

                </div>

                <div class="card">
                    <div class="card-body p-4">
                        <div class="p-3">
                            <form action="" method="POST" id="kayit_ol">

                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <div class="input-group bg-soft-light rounded-3  mb-3">
                                        <span class="input-group-text text-muted" id="basic-addon5">
                                            <i class="ri-mail-line"></i>
                                        </span>
                                        <input type="email" name="email" class="form-control form-control-lg bg-soft-light border-light" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="basic-addon5">

                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Adınız</label>
                                    <div class="input-group bg-soft-light mb-3 rounded-3">
                                        <span class="input-group-text border-light text-muted" id="basic-addon6">
                                            <i class="ri-user-2-line"></i>
                                        </span>
                                        <input type="text" name="ad" class="form-control form-control-lg bg-soft-light border-light" placeholder="Adınız" aria-label="Enter Username" aria-describedby="basic-addon6">

                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Şifre</label>
                                    <div class="input-group bg-soft-light mb-3 rounded-3">
                                        <span class="input-group-text border-light text-muted" id="basic-addon7">
                                            <i class="ri-lock-2-line"></i>
                                        </span>
                                        <input type="password" name="password" class="form-control form-control-lg bg-soft-light border-light" placeholder="Şifre" aria-label="Enter Password" aria-describedby="basic-addon7">

                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Şifre Tekrar</label>
                                    <div class="input-group bg-soft-light mb-3 rounded-3">
                                        <span class="input-group-text border-light text-muted" id="basic-addon7">
                                            <i class="ri-lock-2-line"></i>
                                        </span>
                                        <input type="password" name="password_conform" class="form-control form-control-lg bg-soft-light border-light" placeholder="Şifre Tekrar" aria-label="Enter Password" aria-describedby="basic-addon7">

                                    </div>
                                </div>

                                <input type="hidden" value="<?= $_SESSION["_token"] ?>" name="token">
                                <input type="hidden" value="<?= Sifrele("kayit_ol") ?>" name="islem">
                                <div class="d-grid">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Kayıt Ol <span class="mySpinner"></span></button>
                                </div>

                                <div class="messages mt-1">
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="mt-5 text-center">
                    <p>Already have an account ? <a href="login.php" class="fw-medium text-primary"> Giriş Yap </a> </p>
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