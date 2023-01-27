$(document).ready(function () {

    const islem_url = "system/do.php";
    $(".gonder").hide();

    $("#giris_yap").on("submit", function (e) {
        e.preventDefault();
        $(".mySpinner").html('<div class="spinner-border spinner-border-sm text-light" role="status"><span class="visually-hidden"></span></div>');
        $(":button").prop("disabled", true);
        $(".messages").show();

        var email = $("input[name=email]").val();
        var password = $("input[name=password]").val();
        var islem = $("input[name=islem]").val();
        var token = $("input[name=token]").val();

        $.ajax({
            url: islem_url,
            type: "POST",
            dataType: "json",
            data: {
                'email': email,
                'password': password,
                'islem': islem,
                'token': token
            },
            success: function (result) {

                if (result.islem) {
                    $(".messages").html(result.bos);
                    setTimeout(function () {
                        $(":button").prop("disabled", false);
                        $(".mySpinner").html("");
                        $(".messages").html("");
                        $(".messages").hide();
                    }, 2000);
                }
                if (result.token) {
                    $(".messages").html(result.token);
                    setTimeout(function () {
                        $(":button").prop("disabled", false);
                        $(".mySpinner").html("");
                        $(".messages").html("");
                        $(".messages").hide();
                    }, 2000);
                }
                if (result.bos) {
                    $(".messages").html(result.bos);
                    setTimeout(function () {
                        $(":button").prop("disabled", false);
                        $(".mySpinner").html("");
                        $(".messages").html("");
                        $(".messages").hide();
                    }, 2000);
                }
                if (result.email) {
                    $(".messages").html(result.email);
                    setTimeout(function () {
                        $(":button").prop("disabled", false);
                        $(".mySpinner").html("");
                        $(".messages").html("");
                        $(".messages").hide();
                    }, 2000);
                }
                if (result.sifre_uzunluk) {
                    $(".messages").html(result.sifre_uzunluk);
                    setTimeout(function () {
                        $(":button").prop("disabled", false);
                        $(".mySpinner").html("");
                        $(".messages").html("");
                        $(".messages").hide();
                    }, 2000);
                }

                if (result.kullanici_var) {
                    $(".messages").html(result.kullanici_var);
                    setTimeout(function () {
                        $(":button").prop("disabled", false);
                        $(".mySpinner").html("");
                        $(".messages").html("");
                        $(".messages").hide();
                        window.location.reload()
                    }, 2000);
                }

                if (result.hata) {
                    $(".messages").html(result.hata);
                    setTimeout(function () {
                        $(":button").prop("disabled", false);
                        $(".mySpinner").html("");
                        $(".messages").html("");
                        $(".messages").hide();
                    }, 3000);
                }

            }
        });
    });

    $("#kayit_ol").on("submit", function (e) {
        e.preventDefault();
        $(".mySpinner").html('<div class="spinner-border spinner-border-sm text-light" role="status"><span class="visually-hidden"></span></div>');
        $(":button").prop("disabled", true);
        $(".messages").show();

        var email = $("input[name=email]").val();
        var ad = $("input[name=ad]").val();
        var password = $("input[name=password]").val();
        var password_conform = $("input[name=password_conform]").val();
        var islem = $("input[name=islem]").val();
        var token = $("input[name=token]").val();

        $.ajax({
            url: islem_url,
            type: "POST",
            dataType: "json",
            data: {
                'email': email,
                'ad': ad,
                'password': password,
                'password_conform': password_conform,
                'islem': islem,
                'token': token
            },
            success: function (result) {

                if (result.islem) {
                    $(".messages").html(result.bos);
                    setTimeout(function () {
                        $(":button").prop("disabled", false);
                        $(".mySpinner").html("");
                        $(".messages").html("");
                        $(".messages").hide();
                    }, 2000);
                }
                if (result.token) {
                    $(".messages").html(result.token);
                    setTimeout(function () {
                        $(":button").prop("disabled", false);
                        $(".mySpinner").html("");
                        $(".messages").html("");
                        $(".messages").hide();
                    }, 2000);
                }
                if (result.bos) {
                    $(".messages").html(result.bos);
                    setTimeout(function () {
                        $(":button").prop("disabled", false);
                        $(".mySpinner").html("");
                        $(".messages").html("");
                        $(".messages").hide();
                    }, 2000);
                }
                if (result.email) {
                    $(".messages").html(result.email);
                    setTimeout(function () {
                        $(":button").prop("disabled", false);
                        $(".mySpinner").html("");
                        $(".messages").html("");
                        $(".messages").hide();
                    }, 2000);
                }
                if (result.sifre_uzunluk) {
                    $(".messages").html(result.sifre_uzunluk);
                    setTimeout(function () {
                        $(":button").prop("disabled", false);
                        $(".mySpinner").html("");
                        $(".messages").html("");
                        $(".messages").hide();
                    }, 2000);
                }

                if (result.kullanici_var) {
                    $(".messages").html(result.kullanici_var);
                    setTimeout(function () {
                        $(":button").prop("disabled", false);
                        $(".mySpinner").html("");
                        $(".messages").html("");
                        $(".messages").hide();
                    }, 2000);
                }

                if (result.sifre_dogrulama) {
                    $(".messages").html(result.sifre_dogrulama);
                    setTimeout(function () {
                        $(":button").prop("disabled", false);
                        $(".mySpinner").html("");
                        $(".messages").html("");
                        $(".messages").hide();
                    }, 2000);
                }

                if (result.hata) {
                    $(".messages").html(result.hata);
                    setTimeout(function () {
                        $(":button").prop("disabled", false);
                        $(".mySpinner").html("");
                        $(".messages").html("");
                        $(".messages").hide();
                    }, 3000);
                }
                if (result.basarili) {
                    $(".messages").html(result.basarili);
                    setTimeout(function () {
                        $(":button").prop("disabled", false);
                        $(".mySpinner").html("");
                        $(".messages").html("");
                        $(".messages").hide();
                        window.location.reload()
                    }, 2000);
                }

            }
        });
    });
    var id;
    $(".kisiler").click(function () {
        $(".kisiler").removeClass("active");
        id = $(this).attr("id");
        $(this).addClass("active");
        $(".gonder").show();
        $.ajax({
            url: "system/mesaj_getir.php",
            type: "POST",
            data: {
                'id': id,
                'islem': "mesaj_getir"
            },
            success: function (result) {

                if (result) {
                    $(".messages").html(result);
                }
            }
        });
    });

    function Mesajlargetir(getir_id) {
        $(".messages").html("");
        $.ajax({
            url: "system/mesaj_getir.php",
            type: "POST",
            data: {
                'id': getir_id,
                'islem': "mesaj_getir"
            },
            success: function (result) {
                if (result) {
                    
                }
            }
        });
    }

    setInterval(Mesajlargetir(id), 1000);

    $(".gonder").on("submit", function (e) {
        e.preventDefault();
        var mesaj = $("input[name=mesaj]").val();
        var harf = $("input[name=harf]").val();
        var saat = $("input[name=saat]").val();
        var alan_id = id;
        var islem = $("input[name=islem]").val();
        var token = $("input[name=token]").val();

        var eklenecekMetin = '<li class="right"><div class="conversation-list"><div class="chat-avatar avatar-xs"><span class="avatar-title rounded-circle bg-soft-primary text-primary">' + harf + '</span></div><div class="user-chat-content"><div class="ctext-wrap"><div class="ctext-wrap-content"><p class="mb-0">' + mesaj + '</p><p class="chat-time mb-0"><i class="ri-time-line align-middle"></i> <span class="align-middle">' + saat + '<span><p></div></div><div class="conversation-name">Siz</div></div></div></li>';


        $.ajax({
            url: islem_url,
            type: "POST",
            dataType: "json",
            data: {
                'mesaj': mesaj,
                'alan_id': alan_id,
                'islem': islem,
                'token': token
            },
            success: function (result) {
                if (result.basarili) {
                    $(".mesajlistesi").append(eklenecekMetin);
                    $("input[name=mesaj]").val("");
                }

            }
        });


        /*
                $.ajax({
                    url: islem_url,
                    type: "POST",
                    dataType: "json",
                    data: {
                        'email': email,
                        'ad': ad,
                        'password': password,
                        'password_conform': password_conform,
                        'islem': islem,
                        'token': token
                    },
                    success: function (result) {
        
                        if (result.islem) {
                            $(".messages").html(result.bos);
                            setTimeout(function () {
                                $(":button").prop("disabled", false);
                                $(".mySpinner").html("");
                                $(".messages").html("");
                                $(".messages").hide();
                            }, 2000);
                        }
                        if (result.token) {
                            $(".messages").html(result.token);
                            setTimeout(function () {
                                $(":button").prop("disabled", false);
                                $(".mySpinner").html("");
                                $(".messages").html("");
                                $(".messages").hide();
                            }, 2000);
                        }
                        if (result.bos) {
                            $(".messages").html(result.bos);
                            setTimeout(function () {
                                $(":button").prop("disabled", false);
                                $(".mySpinner").html("");
                                $(".messages").html("");
                                $(".messages").hide();
                            }, 2000);
                        }
                        
                      
                        if (result.basarili) {
                            $(".messages").html(result.basarili);
                            setTimeout(function () {
                                $(":button").prop("disabled", false);
                                $(".mySpinner").html("");
                                $(".messages").html("");
                                $(".messages").hide();
                                window.location.reload()
                            }, 2000);
                        }
        
                    }
                });
        */


    });





});