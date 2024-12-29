<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Yönetimi</title>
    <link rel="stylesheet" href="<?= base_url('styles.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h1>Kullanıcı Yönetimi</h1>
    <table class="table table-bordered">
        <thead class="table-light">
        <tr>
            <th>Ad</th>
            <th>Email</th>
            <th>Rol</th>
            <th>İşlemler</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['name']; ?></td>
                <td><?= $user['email']; ?></td>
                <td><?= $user['role']; ?></td>
                <td>
                    <a href="<?= base_url('admin/users/edit/' . (string)$user['_id']); ?>" class="btn btn-warning btn-sm">Düzenle</a>
                    <a href="<?= base_url('admin/users/delete/' . (string)$user['_id']); ?>" class="btn btn-danger btn-sm">Sil</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
