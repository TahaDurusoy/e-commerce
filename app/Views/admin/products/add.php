<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeni Ürün Ekle</title>
    <link rel="stylesheet" href="<?= base_url('styles.css'); ?>">
</head>
<body>
<div class="container">
    <h1 class="section__header">Yeni Ürün Ekle</h1>
    <form action="<?= base_url('admin/products/add'); ?>" method="post" enctype="multipart/form-data" class="form__container">
        <div class="form__group">
            <label for="product_code">Ürün Kodu</label>
            <input type="text" id="product_code" name="product_code" placeholder="Ürün Kodu" required>
        </div>
        <div class="form__group">
            <label for="price">Fiyat</label>
            <input type="number" id="price" name="price" step="0.01" placeholder="Fiyat (₺)" required>
        </div>
        <div class="form__group">
            <label for="image">Ürün Resmi</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Ürünü Ekle</button>
    </form>
</div>

<style>
    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        background-color: #f9f9f9;
    }

    .section__header {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
        font-size: 1.8rem;
    }

    .form__container {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .form__group label {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form__group input {
        padding: 10px;
        font-size: 1rem;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .btn {
        padding: 10px;
        font-size: 1rem;
        color: #fff;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
    }

    .btn:hover {
        background-color: #0056b3;
    }
</style>
</body>
</html>
