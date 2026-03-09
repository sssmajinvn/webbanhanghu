<!-- FILE: add.php - VIEW FORM THÊM SẢN PHẨM (có upload ảnh) -->

<?php include 'app/views/shares/header.php'; ?>

<h1>Thêm sản phẩm mới</h1>

<!-- Hiển thị lỗi validation -->
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<!-- enctype="multipart/form-data" BẮT BUỘC có để upload file -->
<form method="POST" action="/webbanhang/Product/save" enctype="multipart/form-data">

    <div class="form-group">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea id="description" name="description" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label for="price">Giá:</label>
        <input type="number" id="price" name="price" class="form-control" step="0.01" required>
    </div>

    <div class="form-group">
        <label for="category_id">Danh mục:</label>
        <select id="category_id" name="category_id" class="form-control" required>
            <option value="">-- Chọn danh mục --</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category->id; ?>"><?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Trường upload hình ảnh -->
    <div class="form-group">
        <label for="image">Hình ảnh sản phẩm:</label>
        <input type="file" id="image" name="image" class="form-control-file" accept="image/*">
        <small class="form-text text-muted">Chấp nhận: JPG, JPEG, PNG, GIF, WEBP. Tối đa 5MB.</small>
    </div>

    <!-- Xem trước ảnh khi chọn file -->
    <div class="form-group">
        <img id="imagePreview" src="#" alt="Xem trước" style="display:none; max-height: 200px; margin-top: 10px;" class="img-thumbnail">
    </div>

    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
</form>

<a href="/webbanhang/Product" class="btn btn-secondary mt-2">Quay lại danh sách</a>

<!-- Script xem trước ảnh -->
<script>
document.getElementById('image').addEventListener('change', function(e) {
    var preview = document.getElementById('imagePreview');
    var file = e.target.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        preview.style.display = 'none';
    }
});
</script>

<?php include 'app/views/shares/footer.php'; ?>
