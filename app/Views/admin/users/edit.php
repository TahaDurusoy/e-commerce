<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcıyı Düzenle</title>
    <link rel="stylesheet" href="<?= base_url('styles.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center bg-primary text-white">
                    <h3>Kullanıcıyı Düzenle</h3>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/users/update/' . (string)$user['_id']); ?>" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Ad Soyad</label>
                            <input type="text" id="name" name="name" class="form-control" value="<?= $user['name']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="<?= $user['email']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Rol</label>
                            <select id="role" name="role" class="form-select" required>
                                <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>Kullanıcı</option>
                                <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Yönetici</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Kaydet</button>
                            <a href="<?= base_url('admin'); ?>" class="btn btn-secondary ms-3">İptal</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoYujGyTfIPc5e8UOhB9wPBOEjc0FKNlt2nkj7HtwE8fwiG" crossorigin="anonymous"></script>
</body>
</html>
