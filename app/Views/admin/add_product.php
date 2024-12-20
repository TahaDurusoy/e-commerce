<h1>Yeni Ürün Ekle</h1>
<form method="post" action="/admin/products/add">
    <label>Adı:</label>
    <input type="text" name="name" required>
    <br>
    <label>Fiyatı:</label>
    <input type="text" name="price" required>
    <br>
    <label>Açıklama:</label>
    <textarea name="description" required></textarea>
    <br>
    <button type="submit">Ekle</button>
</form>
