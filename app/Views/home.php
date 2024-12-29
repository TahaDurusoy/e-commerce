<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Remixicon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
    <!-- Projeye özel CSS -->
    <link rel="stylesheet" href="<?= base_url('styles.css'); ?>">
    <link rel="icon" type="image/x-icon" href="<?= base_url('saat.png'); ?>">

    <title>Chronocraft</title>
</head>
<body>
<nav>
    <div class="nav__header">
        <div class="nav__logo">
            <a href="<?= base_url('/'); ?>" class="logo">chronocraft</a>
        </div>
        <div class="nav__menu__btn" id="menu-btn">
            <i class="ri-menu-line"></i>
        </div>
    </div>
    <ul class="nav__links" id="nav-links">
        <li><a href="<?= base_url('/'); ?>">Anasayfa</a></li>
        <li><a href="<?= base_url('products'); ?>">Mağaza</a></li>
        <li><a href="<?= base_url('about'); ?>">Hakkımızda</a></li>
        <li><a href="#contact">İletişim</a></li>
        <?php if (session()->get('user')): ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Hoşgeldiniz, <?= session()->get('user')['name']; ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <?php if (session()->get('user')['role'] === 'admin'): ?>
                        <li><a class="dropdown-item" href="<?= base_url('admin'); ?>">Yönetim Paneli</a></li>

                    <?php endif; ?>


                    <li><a class="dropdown-item" href="<?= base_url('logout?redirect=' . current_url()); ?>">Çıkış Yap</a></li>

                </ul>
            </li>
        <?php else: ?>
            <li><a href="<?= base_url('login'); ?>">Giriş Yap</a></li>
        <?php endif; ?>
    </ul>
    <div class="nav__search" id="nav-search">
        <input type="text" placeholder="Search" />
        <span><i class="ri-search-2-line"></i></span>
    </div>
</nav>

<header class="section__container header__container" id="home">
    <div class="header__image">
        <img style="border-radius: 10px" src="<?= base_url('images/cover.jpg'); ?>" alt="header"/> <!-- Görsel yolu düzenlendi -->
    </div>
    <div class="header__content">
        <div style="border-radius: 10px">
            <h1>Saatlerinizle Tarzınızı Yansıtın</h1>
            <p>
                ChronoCraft ile zamanı estetik ve kusursuz işçilikle buluşturuyoruz.
                Hayatınızın anlarına değer katacak, tarzınızı yansıtacak
                saatlerimizi keşfedin.
            </p>
        </div>
    </div>
</header>

<footer class="footer" id="contact">
    <div class="section__container footer__container">
        <div class="footer__col">
            <div class="footer__logo">
                <a href="<?= base_url('/'); ?>" class="logo">chronocraft</a>
            </div>
            <p>
                Zarafeti ve fonksiyonelliği bir araya getiren saatlerle zamanınızı
                yeniden keşfedin.
            </p>
            <ul class="footer__socials">
                <li><a href="#"><i class="ri-facebook-fill"></i></a></li>
                <li><a href="#"><i class="ri-twitter-fill"></i></a></li>
                <li><a href="#"><i class="ri-linkedin-fill"></i></a></li>
                <li><a href="#"><i class="ri-pinterest-fill"></i></a></li>
            </ul>
        </div>
        <div class="footer__col">
            <h4>Servisler</h4>
            <ul class="footer__links">
                <li><a href="#">Bize Ulaşın</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Yardım Merkezi</a></li>
            </ul>
        </div>
        <div class="footer__col">
            <h4>Kaynaklar</h4>
            <ul class="footer__links">
                <li><a href="#">Fiyatlandırma</a></li>
                <li><a href="#">FAQs</a></li>
                <li><a href="#">Gizlilik Politikası</a></li>
                <li><a href="#">Şartlar</a></li>
            </ul>
        </div>
        <div class="footer__col">
            <h4>Destek</h4>
            <ul class="footer__links">
                <li><a href="#">İletişim</a></li>
                <li><a href="#">Ortaklar</a></li>
                <li><a href="#">İptal Politikamız</a></li>
                <li><a href="#">Güvenlik</a></li>
            </ul>
        </div>
    </div>
    <div class="footer__bar">
        Copyright © 2024 chronocraft. Tüm Haklarımız Saklıdır.
    </div>
</footer>

<!-- Projeye özel CSS ve JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= base_url('main.js'); ?>"></script>
</body>
</html>
