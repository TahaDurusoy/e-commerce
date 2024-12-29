<!DOCTYPE html>
<html>
<head>
    <title>Kullanıcı Yönetimi</title>
</head>
<body>
<h1>Kullanıcı Yönetimi</h1>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Ad</th>
        <th>E-posta</th>
        <th>Rol</th>
        <th>İşlemler</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id']; ?></td>
            <td><?= $user['name']; ?></td>
            <td><?= $user['email']; ?></td>
            <td><?= $user['role']; ?></td>
            <td>
                <a href="<?= base_url('admin/users/delete/' . $user['id']); ?>">Sil</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
