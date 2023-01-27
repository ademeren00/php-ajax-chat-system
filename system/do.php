<?php
require_once "db.php";

$message = array();

if (!isset($_POST["token"])) {
    $message["token"] = '<div class="alert alert-danger" role="alert">Token bulunamadı.</div>';
    echo json_encode($message);
    die();
}
/*
if ($_SESSION["_token"] != $_POST["token"]) {
    $message["token"] = '<div class="alert alert-danger" role="alert">Token kontrol hatası.</div>';
    echo json_encode($message);
    die();
}
*/
if (!isset($_POST["islem"])) {
    $message["islem"] = '<div class="alert alert-danger" role="alert">İşlem hatası.</div>';
    echo json_encode($message);
    die();
}
$islem = Coz($_POST["islem"]);

if ($islem == "giris_yap") {

    $email = Guvenlik(trim($_POST["email"]));
    $password = Guvenlik(trim($_POST["password"]));

    if (empty($email) || empty($password)) {
        $message["bos"] = '<div class="alert alert-warning" role="alert">lütfen boş bırakmayınız.</div>';
    } else {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (strlen($password) >= 6) {
                $password_has = ParolaHash($password);
                $query = $db->query("SELECT * FROM kullanicilar WHERE email = '{$email}' and sifre = '{$password_has}'")->fetch(PDO::FETCH_ASSOC);
                if ($query) {
                    $message["kullanici_var"] = '<div class="alert alert-success" role="alert">Başarılı bir şekilde giriş yaptınız. Yönlendiriliyosunuz lütfen bekleyin.</div>';
                    $_SESSION["id"]         = $query["id"];
                    $_SESSION["ad"]         = $query["ad"];
                    $_SESSION["soyad"]      = $query["soyad"];
                    $_SESSION["resim"]      = $query["resim"];
                    $_SESSION["email"]      = $query["email"];
                    $_SESSION["aciklama"]   = $query["aciklama"];
                } else {
                    $message["hata"] = '<div class="alert alert-danger" role="alert">Böyle bir kullanıcı yok.</div>';
                }
            } else {
                $message["sifre_uzunluk"] = '<div class="alert alert-warning" role="alert">Girdiğiniz şifre en az 6 karakter olmak zorunda.</div>';
            }
        } else {
            $message["email"] = '<div class="alert alert-warning" role="alert">lütfen gecerli bir email adresi giriniz.</div>';
        }
    }
} elseif ($islem == "kayit_ol") {
    $ad = Guvenlik(trim($_POST["ad"]));
    $email = Guvenlik(trim($_POST["email"]));
    $password = Guvenlik(trim($_POST["password"]));
    $password_conform = Guvenlik(trim($_POST["password_conform"]));


    if (empty($email) || empty($ad) || empty($password) || empty($password_conform)) {
        $message["bos"] = '<div class="alert alert-warning" role="alert">lütfen boş bırakmayınız.</div>';
    } else {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (strlen($password) >= 6) {
                if ($password == $password_conform) {
                    $query = $db->query("SELECT * FROM kullanicilar WHERE email = '{$email}'")->fetch(PDO::FETCH_ASSOC);
                    if ($query) {
                        $message["kullanici_var"] = '<div class="alert alert-warning" role="alert">Böyle bir kullanıcı var lütfen farklı bir email adresi giriniz.</div>';
                    } else {
                        $query = $db->prepare("INSERT INTO kullanicilar SET
                        ad = :ad,
                        email = :email,
                        sifre = :sifre");
                        $insert = $query->execute(array(
                            "ad" => $ad,
                            "email" => $email,
                            "sifre" => ParolaHash($password),
                        ));
                        if ($insert) {
                            $message["basarili"] = '<div class="alert alert-success" role="alert">Başarılı bir şekilde kayıt oldunuz.</div>';
                        } else {
                            $message["hata"] = '<div class="alert alert-danger" role="alert">Kayıt olurken bir hata oluştu! Lütfen daha sonra tekrar deneyin.</div>';
                        }
                    }
                } else {
                    $message["sifre_dogrulama"] = '<div class="alert alert-warning" role="alert">Lütfen şifrenizi doğrulayın.</div>';
                }
            } else {
                $message["sifre_uzunluk"] = '<div class="alert alert-warning" role="alert">Girdiğiniz şifre en az 6 karakter olmak zorunda.</div>';
            }
        } else {
            $message["email"] = '<div class="alert alert-warning" role="alert">lütfen gecerli bir email adresi giriniz.</div>';
        }
    }
}elseif ($islem == "mesaj_gonder") {

    $mesaj = Guvenlik(trim($_POST["mesaj"]));
    $alan_id = Coz(Guvenlik(trim($_POST["alan_id"])));

    $query = $db->prepare("INSERT INTO mesajlar SET
    mesaj = :mesaj,
    alan_id = :alan_id,
    gonderen_id = :gonderen_id");
    $insert = $query->execute(array(
        "mesaj" => $mesaj,
        "alan_id" => $alan_id,
        "gonderen_id" => $_SESSION["id"],
    ));
    if ( $insert ){
        $message["basarili"] = "gonderildi";
    }
}



else {

}

/*
if ($islem == "kayit_ol") {


    if (!isset($_POST["token"])) {
        $message["token"] = '<div class="alert alert-danger" role="alert">Sistemsel bir sorun oluştu lütfen daha sonra tekrar deneyiniz.</div>';
        echo json_encode($message);
        die();
    }
    if ($_SESSION["_token"] != $_POST["token"]) {
        $message["token"] = '<div class="alert alert-danger" role="alert">Sistemsel bir sorun oluştu lütfen daha sonra tekrar deneyiniz.</div>';
        echo json_encode($message);
        die();
    }


    $name = Guvenlik(trim($_POST["name"]));
    $surname = Guvenlik(trim($_POST["surname"]));
    $email = Guvenlik(trim($_POST["email"]));
    $password = Guvenlik(trim($_POST["password"]));
    $password_conform = Guvenlik(trim($_POST["password_conform"]));


    if (empty($surname) || empty($email) || empty($name) || empty($password) || empty($password_conform)) {
        $message["bos"] = '<div class="alert alert-warning" role="alert">lütfen boş bırakmayınız.</div>';
    } else {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (strlen($password) >= 6) {
                if ($password == $password_conform) {
                    $query = $db->query("SELECT * FROM users WHERE email = '{$email}'")->fetch(PDO::FETCH_ASSOC);
                    if ($query) {
                        $message["kullanici_var"] = '<div class="alert alert-warning" role="alert">Böyle bir kullanıcı var lütfen farklı bir email adresi giriniz.</div>';
                    } else {
                        $query = $db->prepare("INSERT INTO users SET
                        name = :name,
                        surname = :surname,
                        email = :email,
                        password = :password");
                        $insert = $query->execute(array(
                            "name" => $name,
                            "surname" => $surname,
                            "email" => $email,
                            "password" => ParolaHash($password),
                        ));
                        if ($insert) {
                            $message["basarili"] = '<div class="alert alert-success" role="alert">Başarılı bir şekilde kayıt oldunuz.</div>';
                        } else {
                            $message["hata"] = '<div class="alert alert-danger" role="alert">Kayıt olurken bir hata oluştu! Lütfen daha sonra tekrar deneyin.</div>';
                        }
                    }
                } else {
                    $message["sifre_dogrulama"] = '<div class="alert alert-warning" role="alert">Lütfen şifrenizi doğrulayın.</div>';
                }
            } else {
                $message["sifre_uzunluk"] = '<div class="alert alert-warning" role="alert">Girdiğiniz şifre en az 6 karakter olmak zorunda.</div>';
            }
        } else {
            $message["email"] = '<div class="alert alert-warning" role="alert">lütfen gecerli bir email adresi giriniz.</div>';
        }
    }
} elseif ($islem == "mail_adresi_ekle") {

    if (isset($_POST["emaillist"])) {
        $email = Guvenlik(trim($_POST["emaillist"]));

        if (empty($email)) {
            $message["bos"] = '<div class="alert alert-warning" role="alert">lütfen boş bırakmayınız.</div>';
        } else {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $query = $db->query("SELECT * FROM email_address WHERE email = '{$email}'")->fetch(PDO::FETCH_ASSOC);
                if ($query) {
                    $message["email_var"] = '<div class="alert alert-warning" role="alert">Böyle bir email var lütfen farklı bir email adresi giriniz.</div>';
                } else {
                    $query = $db->prepare("INSERT INTO email_address SET
                            email = :email");
                    $insert = $query->execute(array(
                        "email" => $email,
                    ));
                    if ($insert) {
                        $message["basarili"] = '<div class="alert alert-success" role="alert">Başarılı bir şekilde kayıt oldunuz.</div>';
                    } else {
                        $message["hata"] = '<div class="alert alert-danger" role="alert">Kayıt olurken bir hata oluştu! Lütfen daha sonra tekrar deneyin.</div>';
                    }
                }
            } else {
                $message["email"] = '<div class="alert alert-warning" role="alert">lütfen gecerli bir email adresi giriniz.</div>';
            }
        }
    } else {
        $message["hata"] = '<div class="alert alert-danger" role="alert">Bir email adresi bulamadım! Lütfen daha sonra deneyin.</div>';
    }
} elseif ($islem == "giris_yap") {


    if (!isset($_POST["token"])) {
        $message["token"] = '<div class="alert alert-danger" role="alert">Sistemsel bir sorun oluştu lütfen daha sonra tekrar deneyiniz.</div>';
        echo json_encode($message);
        die();
    }
    if ($_SESSION["_token"] != $_POST["token"]) {
        $message["token"] = '<div class="alert alert-danger" role="alert">Sistemsel bir sorun oluştu lütfen daha sonra tekrar deneyiniz.</div>';
        echo json_encode($message);
        die();
    }

    $email = Guvenlik(trim($_POST["email"]));
    $password = Guvenlik(trim($_POST["password"]));


    if (empty($email) || empty($password)) {
        $message["bos"] = '<div class="alert alert-warning" role="alert">lütfen boş bırakmayınız.</div>';
    } else {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if (strlen($password) >= 6) {
                $password_has = ParolaHash($password);
                $query = $db->query("SELECT * FROM users WHERE email = '{$email}' and password = '{$password_has}'")->fetch(PDO::FETCH_ASSOC);
                if ($query) {
                    $message["kullanici_var"] = '<div class="alert alert-success" role="alert">Başarılı bir şekilde giriş yaptınız. Yönlendiriliyosunuz lütfen bekleyin.</div>';
                    $_SESSION["id"] = $query["id"];
                    $_SESSION["name"] = $query["name"];
                    $_SESSION["surname"] = $query["surname"];
                    $_SESSION["authority"] = $query["authority"];
                } else {
                    $message["hata"] = '<div class="alert alert-danger" role="alert">Böyle bir kullanıcı yok.</div>';
                }
            } else {
                $message["sifre_uzunluk"] = '<div class="alert alert-warning" role="alert">Girdiğiniz şifre en az 6 karakter olmak zorunda.</div>';
            }
        } else {
            $message["email"] = '<div class="alert alert-warning" role="alert">lütfen gecerli bir email adresi giriniz.</div>';
        }
    }
} elseif ($islem == "cikis_yap") {

    if (isset($_SESSION["id"])) {
        unset($_SESSION['name']);
        unset($_SESSION['surname']);
        unset($_SESSION['authority']);
    }
} elseif ($islem == "kategori_ekle") {
    if (!isset($_POST["token"])) {
        $message["token"] = '<div class="alert alert-danger" role="alert">Sistemsel bir sorun oluştu lütfen daha sonra tekrar deneyiniz.</div>';
        echo json_encode($message);
        die();
    }
    if ($_SESSION["_token"] != $_POST["token"]) {
        $message["token"] = '<div class="alert alert-danger" role="alert">Sistemsel bir sorun oluştu lütfen daha sonra tekrar deneyiniz.</div>';
        echo json_encode($message);
        die();
    }

    $kullanici_adi = Guvenlik(trim($_POST["kullanici_adi"]));
    $kullanici_adi_seo = SEOLink($kullanici_adi);

    if (empty($kullanici_adi)) {
        $message["bos"] = '<div class="alert alert-warning" role="alert">lütfen boş bırakmayınız.</div>';
    } else {
        if (!empty($_FILES["formFile"]["name"])) {
            $fileName = $_FILES["formFile"]["name"];
            $fileTemp = $_FILES["formFile"]["tmp_name"];
            $extension = pathinfo($fileName, PATHINFO_EXTENSION);
            $newName = rand() . '_' . time() . '.' . $extension;
            $myPath = '../assets/images/kategori/' . $newName;
            if (move_uploaded_file($fileTemp, $myPath)) {

                $message["success"] = '<div class="alert alert-success mt-3" role="alert">
            Dosyanızı başarılı bir şekilde yüklediniz.
          </div>';



                $query = $db->prepare("INSERT INTO task_category SET
                title = :title,
                title_seo = :title_seo,
                image = :image");
                $insert = $query->execute(array(
                    "title" => $kullanici_adi,
                    "title_seo" => $kullanici_adi_seo,
                    "image" => $newName,
                ));
                if ($insert) {
                    $message["success"] = '<div class="alert alert-success mt-3" role="alert">
            Dosyanızı başarılı bir şekilde yüklediniz.
          </div>';
                } else {
                    $message["danger"] = '<div class="alert alert-danger mt-3" role="alert">
            Sistemde beklenmeyen bir hata oluştu.
          </div>';
                }
            } else {
                $message["danger"] = '<div class="alert alert-danger mt-3" role="alert">
            Sistemde beklenmeyen bir hata oluştu.
          </div>';
            }
        } else {
            $message["warning"] = '<div class="alert alert-warning mt-3" role="alert">
            Lütfen bir dosya seçin.
          </div>';
        }
    }
} elseif ($islem == "gorev_ekle") {



    if (!isset($_POST["token"])) {
        $message["token"] = '<div class="alert alert-danger" role="alert">Sistemsel bir sorun oluştu lütfen daha sonra tekrar deneyiniz.</div>';
        echo json_encode($message);
        die();
    }
    if ($_SESSION["_token"] != $_POST["token"]) {
        $message["token"] = '<div class="alert alert-danger" role="alert">Sistemsel bir sorun oluştu lütfen daha sonra tekrar deneyiniz.</div>';
        echo json_encode($message);
        die();
    }

    $gorev_baslik = Guvenlik(trim($_POST["gorev_baslik"]));
    $gorev_kazanc = Guvenlik(trim($_POST["gorev_kazanc"]));
    $gorev_kontejan = Guvenlik(trim($_POST["gorev_kontejan"]));
    $gorev_buton_linki = Guvenlik(trim($_POST["gorev_buton_linki"]));
    $gorev_buton_yazisi = Guvenlik(trim($_POST["gorev_buton_yazisi"]));
    $gorev_kategori_id = Guvenlik(trim(Coz($_POST["gorev_kategori_id"])));
    $gorev_aciklama = $_POST["gorev_aciklama"];


    if (empty($gorev_baslik) || empty($gorev_kazanc) || empty($gorev_kontejan) || empty($gorev_buton_linki) || empty($gorev_buton_yazisi) || empty($gorev_kategori_id) || empty($gorev_aciklama)) {
        $message["bos"] = '<div class="alert alert-warning" role="alert">Lütfen boş bırakmayınız.</div>';
    } else {
        $query = $db->prepare("INSERT INTO gorevler SET
        gorev_baslik = :gorev_baslik,
        gorev_kazanc = :gorev_kazanc,
        gorev_kontejan = :gorev_kontejan,
        gorev_buton_linki = :gorev_buton_linki,
        gorev_buton_yazisi = :gorev_buton_yazisi,
        gorev_kategori_id = :gorev_kategori_id,
        gorev_paylasan_id = :gorev_paylasan_id,
        gorev_aciklama = :gorev_aciklama");
        $insert = $query->execute(array(
            "gorev_baslik" => $gorev_baslik,
            "gorev_kazanc" => $gorev_kazanc,
            "gorev_kontejan" => $gorev_kontejan,
            "gorev_buton_linki" => $gorev_buton_linki,
            "gorev_buton_yazisi" => $gorev_buton_yazisi,
            "gorev_kategori_id" => $gorev_kategori_id,
            "gorev_paylasan_id" => $_SESSION["id"],
            "gorev_aciklama" => $gorev_aciklama,
        ));
        if ($insert) {
            $message["basarili"] = '<div class="alert alert-success" role="alert">Başarılı bir şekilde kayıt yaptınız.</div>';
        } else {
            $message["hata"] = '<div class="alert alert-danger" role="alert">Sistemsel bir hata oluştu.</div>';
        }
    }
} elseif ($islem == "gorev_sil") {

    $id = $islem = Coz($_POST["id"]);
    if (!isset($id)) {
        header("Location:../gorevler.php");
    }
    if (!isset($_POST["token"])) {
        header("Location:../gorevler.php");
    }
    if ($_SESSION["_token"] != $_POST["token"]) {
        header("Location:../gorevler.php");
    }
    $query = $db->query("SELECT * FROM gorevler WHERE gorev_id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
    if ($query) {
        $query = $db->prepare("DELETE FROM gorevler WHERE gorev_id = :id");
        $delete = $query->execute(array('id' => $id));
        header("Location:../gorevler.php");
    } else {
        header("Location:../gorevler.php");
    }
}
*/
echo json_encode($message);
$db = null;
?>