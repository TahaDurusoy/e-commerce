<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Ürün Düzenle</title>
</head>
<body>
<div class="container my-5">
    <h1>Ürün Düzenle</h1>
    <form action="<?= base_url('admin/products/update/' . (string)$product['_id']); ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="product_code" class="form-label">Ürün Kodu</label>
            <input type="text" id="product_code" name="product_code" class="form-control" value="<?= $product['product_code'] ?? ''; ?>" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Fiyat</label>
            <input type="number" id="price" name="price" class="form-control" value="<?= $product['price'] ?? ''; ?>" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Resim</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Kaydet</button>
        <a href="<?= base_url('admin/products'); ?>" class="btn btn-secondary">İptal</a>
    </form>
</div>
</body>
</html>
