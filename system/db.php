<?php
session_start();

try {
    $db = new PDO("mysql:host=localhost;dbname=chat;charset=utf8", "root", "");
} catch ( PDOException $e ){
     print $e->getMessage();
}

if (!isset($_POST["token"])) {
    $_SESSION["_token"] = sha1(time() . md5(rand(0,999999999)));
}

function ParolaHash($sifre){
    return sha1(md5(md5(sha1($sifre))).md5(md5(sha1($sifre))));
}

define('CIPHER','aes-128-cbc');
define('KEY','chat_yap_sonuca_ulas_xx954521uht');

function Sifrele($data){
    return @openssl_encrypt($data, CIPHER, KEY);
}

function Coz($data){
    return @openssl_decrypt($data, CIPHER, KEY);
}

function Guvenlik($data){
    return strip_tags($data);
}

function SEOLink($baslik){
    $metin_aranan = array("ş", "Ş", "ı", "ü", "Ü", "ö", "Ö", "ç", "Ç", "ş", "Ş", "ı", "ğ", "Ğ", "İ", "ö", "Ö", "Ç", "ç", "ü", "Ü");
    $metin_yerine_gelecek = array("s", "S", "i", "u", "U", "o", "O", "c", "C", "s", "S", "i", "g", "G", "I", "o", "O", "C", "c", "u", "U");
    $baslik = str_replace($metin_aranan, $metin_yerine_gelecek, $baslik);
    $baslik = preg_replace("@[^a-z0-9\-_şıüğçİŞĞÜÇ]+@i", "-", $baslik);
    $baslik = strtolower($baslik);
    $baslik = preg_replace('/&.+?;/', '', $baslik);
    $baslik = preg_replace('|-+|', '-', $baslik);
    $baslik = preg_replace('/#/', '', $baslik);
    $baslik = str_replace('.', '', $baslik);
    $baslik = trim($baslik, '-');
    return $baslik;
}

/*
$id = 1; 
$ayarlar = $db->query("SELECT * FROM ayarlar WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);

$title = $ayarlar["title"];
$meta_author = $ayarlar["meta_author"];
$meta_reply = $ayarlar["meta_reply"];
$meta_publisher = $ayarlar["meta_publisher"];
$meta_canonical = $ayarlar["meta_canonical"];
$meta_description = $ayarlar["meta_description"];
$meta_keywords = $ayarlar["meta_keywords"];
$google_analatik = $ayarlar["google_analatik"];
$site_url = $ayarlar["site_url"];
$logo = $ayarlar["logo"];
$icon = $ayarlar["icon"];
$instagram = $ayarlar["instagram"];
$facebook = $ayarlar["facebook"];
$youtube = $ayarlar["youtube"];
$telefon = $ayarlar["telefon"];
$mail = $ayarlar["mail"];
*/

?>