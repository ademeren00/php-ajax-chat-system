<?php

require_once "db.php";


$islem = Guvenlik($_POST["islem"]);
if ($islem == "mesaj_getir") {
    $id = Coz(Guvenlik($_POST["id"]));
    $uye = $db->query("SELECT * FROM kullanicilar WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC);
    if ($uye) {

?>

    
                <div class="p-3 p-lg-4 border-bottom user-chat-topbar">
                    <div class="row align-items-center">
                        <div class="col-sm-4 col-8">
                            <div class="d-flex align-items-center">
                                <div class="d-block d-lg-none me-2 ms-0">
                                    <a href="javascript: void(0);" class="user-chat-remove text-muted font-size-16 p-2"><i class="ri-arrow-left-s-line"></i></a>
                                </div>
                                <div class="me-3 ms-0 avatar-xs">
                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                        <?= substr($uye["ad"], 0, 1); ?>
                                    </span>
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-0 text-truncate"><a href="#" class="text-reset user-profile-show"><?= $uye["ad"] ?> <?= $uye["soyad"] ?></a></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8 col-4">
                            <ul class="list-inline user-chat-nav text-end mb-0">
                                <li class="list-inline-item">
                                    <div class="dropdown">
                                        <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ri-search-line"></i>
                                        </button>
                                        <div class="dropdown-menu p-0 dropdown-menu-end dropdown-menu-md">
                                            <div class="search-box p-2">
                                                <input type="text" class="form-control bg-light border-0" placeholder="Search..">
                                            </div>
                                        </div>
                                    </div>
                                </li>




                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end chat user head -->

                <!-- start chat conversation -->
                <div class="chat-conversation p-3 p-lg-4" data-simplebar="init">
                    <ul class="list-unstyled mb-0 mesajlistesi">

                        <?php
                        $mesajlar = $db->query("SELECT * FROM mesajlar ORDER BY id ASC", PDO::FETCH_ASSOC);
                        if ($mesajlar->rowCount()) {
                            foreach ($mesajlar as $row) {

                                if (($row["gonderen_id"] == $_SESSION['id']) && ($row["alan_id"] == $id)) {
                        ?>
                                    <li class="right">
                                        <div class="conversation-list">
                                            <div class="chat-avatar avatar-xs">
                                                <span class="avatar-title rounded-circle bg-soft-primary text-primary"><?= substr($_SESSION["ad"], 0, 1); ?></span>
                                            </div>

                                            <div class="user-chat-content">
                                                <div class="ctext-wrap">
                                                    <div class="ctext-wrap-content">
                                                        <p class="mb-0">
                                                            <?= $row["mesaj"] ?>
                                                        </p>
                                                        <p class="chat-time mb-0"><i class="ri-time-line align-middle"></i> <span class="align-middle"><?= $row["tarih"] ?></span></p>
                                                    </div>
                                                </div>
                                                <div class="conversation-name">Siz</div>
                                            </div>
                                        </div>
                                    </li>
                                <?php
                                } elseif (($row["gonderen_id"] == $id) && ($row["alan_id"] == $_SESSION['id'])) {
                                ?>
                                    <li>
                                        <div class="conversation-list">
                                            <div class="chat-avatar avatar-xs">
                                                <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                    <?= substr($uye["ad"], 0, 1); ?>
                                                </span>
                                            </div>

                                            <div class="user-chat-content">
                                                <div class="ctext-wrap">
                                                    <div class="ctext-wrap-content">
                                                        <p class="mb-0">
                                                            <?= $row["mesaj"] ?>
                                                        </p>
                                                        <p class="chat-time mb-0"><i class="ri-time-line align-middle"></i> <span class="align-middle"><?= $row["tarih"] ?></span></p>
                                                    </div>


                                                </div>
                                                <div class="conversation-name"><?= $uye["ad"] ?> <?= $uye["soyad"] ?></div>
                                            </div>
                                        </div>
                                    </li>
                        <?php
                                }
                            }
                        }
                        ?>



                    </ul>
                </div>
                <!-- end chat conversation end -->

                




<?php

    }
}

$db = null;
?>