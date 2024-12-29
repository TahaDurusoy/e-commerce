<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeni Ürün Ekle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Yeni Ürün Ekle</h2>
    <form action="<?= base_url('admin/products/add'); ?>" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Ürün Adı</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Fiyat</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Açıklama</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Resim (Dosya Adı)</label>
            <input type="text" class="form-control" id="image" name="image" placeholder="örneğin: urun1.jpg" required>
        </div>
        <button type="submit" class="btn btn-primary">Ürünü Ekle</button>
    </form>
</div>
</body>
</html>
