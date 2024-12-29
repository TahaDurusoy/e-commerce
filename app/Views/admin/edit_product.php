<h1>Ürün Düzenle</h1>
<form method="post" action="/admin/products/edit/<?= $product['_id'] ?>">
    <label>Adı:</label>
    <input type="text" name="name" value="<?= $product['name'] ?>" required>
    <br>
    <label>Fiyatı:</label>
    <input type="text" name="price" value="<?= $product['price'] ?>" required>
    <br>
    <label>Açıklama:</label>
    <textarea name="description" required><?= $product['description'] ?></textarea>
    <br>
    <button type="submit">Kaydet</button>
</form>
