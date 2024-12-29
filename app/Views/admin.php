<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('styles.css'); ?>">
    <link rel="icon" type="image/x-icon" href="<?= base_url('saat.png'); ?>">
    <title>Yönetim Paneli</title>
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
</nav>

<div class="section__container">
    <h1 class="section__header">Yönetim Paneli</h1>

    <!-- Ürün Yönetimi -->
    <div class="mb-5">
        <h2 class="section__header">Ürün Yönetimi</h2>
        <table class="table table-bordered">
            <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Ürün Kodu</th>
                <th>Slug</th> <!-- Slug gösterimi eklendi -->
                <th>Fiyat</th>
                <th>İşlemler</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= (string) $product['_id']; ?></td>
                    <td><?= $product['product_code'] ?? 'Ürün Kodu Yok'; ?></td>
                    <td><a href="<?= base_url('products/' . $product['slug']); ?>"><?= $product['slug'] ?? 'Slug Yok'; ?></a></td> <!-- Slug gösterimi -->
                    <td>₺<?= number_format($product['price'] ?? 0, 2); ?></td>
                    <td>
                        <a href="<?= base_url('admin/products/edit/' . (string) $product['_id']); ?>" class="btn btn-warning btn-sm">Düzenle</a>
                        <a href="<?= base_url('admin/products/delete/' . (string) $product['_id']); ?>" class="btn btn-danger btn-sm btn-delete">Sil</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?= base_url('admin/products/add'); ?>" class="btn btn-primary">Yeni Ürün Ekle</a>
    </div>

    <!-- Kullanıcı Yönetimi -->
    <div>
        <h2 class="section__header">Kullanıcı Yönetimi</h2>
        <table class="table table-bordered">
            <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Ad Soyad</th>
                <th>Email</th>
                <th>Rol</th>
                <th>İşlemler</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= (string) $user['_id']; ?></td>
                    <td><?= $user['name'] ?? 'Ad Soyad Yok'; ?></td>
                    <td><?= $user['email'] ?? 'Email Yok'; ?></td>
                    <td><?= $user['role'] ?? 'Kullanıcı'; ?></td>
                    <td>
                        <a href="<?= base_url('admin/users/edit/' . (string) $user['_id']); ?>" class="btn btn-warning btn-sm">Düzenle</a>
                        <a href="<?= base_url('admin/users/delete/' . (string) $user['_id']); ?>" class="btn btn-danger btn-sm btn-delete">Sil</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<footer class="footer">
    <div class="footer__container">
        <div class="footer__col">
            <a href="<?= base_url('/admin'); ?>" class="logo">chronocraft</a>
            <p>Yönetim paneli üzerinden sisteminizi kolayca yönetin.</p>
        </div>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.btn-delete');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault(); // Varsayılan davranışı engelle
                const deleteUrl = this.getAttribute('href');

                if (confirm('Bu ürünü silmek istediğinize emin misiniz?')) {
                    fetch(deleteUrl, {
                        method: 'DELETE',
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert(data.message);
                                location.reload();
                            } else {
                                alert('Bir hata oluştu: ' + data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Hata:', error);
                            alert('Bir hata oluştu.');
                        });
                }
            });
        });
    });

</script>

<!-- Projeye özel CSS ve JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('main.js'); ?>"></script>
</body>
</html>
