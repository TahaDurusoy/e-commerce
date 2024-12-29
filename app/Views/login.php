<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href="<?= base_url('saat.png'); ?>">
    <link rel="stylesheet" href="<?= base_url('styles.css'); ?>">
    <title>Chronocraft - Giriş Yap</title>
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
    </ul>
    <div class="nav__search" id="nav-search">
        <input type="text" placeholder="Search" />
        <span><i class="ri-search-2-line"></i></span>
    </div>
</nav>

<section class="section__container client__container">
    <div class="client__content">
        <div class="imgcontainer">
            <h2 class="section__header">Zamana değer verenlere özel ayrıcalıklar</h2>
        </div>

        <div class="swiper">
            <form action="<?= base_url('login'); ?>" method="post">
            <h1 class="h3 mb-3 fw-normal">Chronocraft ile zaman serüvenine katıl!</h1>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <div class="form-floating">
                    <input
                            type="email"
                            class="form-control"
                            id="floatingInput"
                            name="email"
                            placeholder="Email"
                            required
                    />
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating mt-2">
                    <input
                            type="password"
                            class="form-control"
                            id="floatingPassword"
                            name="password"
                            placeholder="Password"
                            required
                    />
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="form-check text-start my-3">
                    <input
                            class="form-check-input"
                            type="checkbox"
                            value="remember-me"
                            id="flexCheckDefault"
                    />
                    <label class="form-check-label" for="flexCheckDefault">Beni hatırla</label>
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit">Giriş Yap!</button>
                <p class="mt-4 text-body-dark">
                    <a style="text-decoration: none; color: black" href="<?= base_url('register'); ?>">Kayıt olmak için tıkla!</a>
                </p>
            </form>
        </div>
    </div>
</section>

<footer class="footer" id="contact">
    <div class="section__container footer__container">
        <div class="footer__col">
            <div class="footer__logo">
                <a href="<?= base_url(); ?>" class="logo">chronocraft</a>
            </div>
            <p>
                Zarafeti ve fonksiyonelliği bir araya getiren saatlerle zamanınızı yeniden keşfedin.
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

<script src="https://unpkg.com/scrollreveal"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= base_url('main.js'); ?>"></script>
</body>
</html>
