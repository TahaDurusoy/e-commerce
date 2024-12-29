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

    <style>
        input::placeholder,
        textarea::placeholder {
            color: black;
            opacity: 1;
        }
        input::-webkit-input-placeholder {
            color: black;
        }
        input:-moz-placeholder {
            color: black;
        }
        input::-moz-placeholder {
            color: black;
        }
        input:-ms-input-placeholder {
            color: black;
        }
    </style>

    <title>Chronocraft - Kayıt Ol</title>
</head>
<body>
<nav>
    <div class="nav__header">
        <div class="nav__logo">
            <a href="<?= base_url(); ?>" class="logo">chronocraft</a>
        </div>
        <div class="nav__menu__btn" id="menu-btn">
            <i class="ri-menu-line"></i>
        </div>
    </div>
    <ul class="nav__links" id="nav-links">
        <li><a href="<?= base_url(); ?>">Anasayfa</a></li>
        <li><a href="<?= base_url('products'); ?>">Mağaza</a></li>
        <li><a href="<?= base_url('about'); ?>">Hakkımızda</a></li>
        <li><a href="#contact">İletişim</a></li>
    </ul>
</nav>

<section class="section__container client__container">
    <div class="client__content">
        <div class="imgcontainer">
            <h2 class="section__header">Zamana değer verenlere özel ayrıcalıklar</h2>
        </div>

        <div class="swiper">
            <form action="<?= base_url('register'); ?>" method="post">
                <h1 class="h3 mb-3 fw-normal">Chronocraft ile zaman serüvenine katıl!</h1>

                <!-- Hata Mesajları -->
                <?php if (session()->has('errors')): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach (session('errors') as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- Başarı Mesajı -->
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <div class="form-floating">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Ad" required />
                    <label for="name">Ad</label>
                </div>
                <div class="form-floating mt-2">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required />
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mt-2">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
                    <label for="password">Şifre</label>
                </div>
                <div class="form-floating mt-2">
                    <input type="password" class="form-control" id="passwordConfirm" name="password_confirm" placeholder="Password Confirm" required />
                    <label for="passwordConfirm">Şifre Tekrar</label>
                </div>

                <button class="btn btn-primary mt-4 w-100 py-2" type="submit">Kayıt Ol!</button>
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
    <div class="footer__bar">Copyright © 2024 chronocraft. Tüm Haklarımız Saklıdır.</div>
</footer>

<script src="https://unpkg.com/scrollreveal"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= base_url('main.js'); ?>"></script>
</body>
</html>
