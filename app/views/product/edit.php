<!-- FILE: edit.php - VIEW FORM SỬA SẢN PHẨM (có upload ảnh) -->

<?php include 'app/views/shares/header.php'; ?>

<h1>Sửa sản phẩm</h1>

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

<!-- enctype="multipart/form-data" BẮT BUỘC để upload file -->
<form method="POST" action="/webbanhang/Product/update" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?php echo $product->id; ?>">

    <div class="form-group">
        <label for="name">Tên sản phẩm:</label>
        <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" required>
    </div>

    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea id="description" name="description" class="form-control" required><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div>

    <div class="form-group">
        <label for="price">Giá:</label>
        <input type="number" id="price" name="price" class="form-control" step="0.01" value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>" required>
    </div>

    <div class="form-group">
        <label for="category_id">Danh mục:</label>
        <select id="category_id" name="category_id" class="form-control" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category->id; ?>" <?php echo $category->id == $product->category_id ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Hiển thị ảnh hiện tại -->
    <div class="form-group">
        <label>Hình ảnh hiện tại:</label><br>
        <?php if (!empty($product->image)): ?>
            <img src="/webbanhang/public/uploads/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" 
                 alt="Ảnh hiện tại" class="img-thumbnail" style="max-height: 200px;">
        <?php else: ?>
            <p class="text-muted">Chưa có hình ảnh</p>
        <?php endif; ?>
    </div>

    <!-- Upload ảnh mới -->
    <div class="form-group">
        <label for="image">Thay đổi hình ảnh (để trống nếu giữ ảnh cũ):</label>
        <input type="file" id="image" name="image" class="form-control-file" accept="image/*">
        <small class="form-text text-muted">Chấp nhận: JPG, JPEG, PNG, GIF, WEBP. Tối đa 5MB.</small>
    </div>

    <!-- Xem trước ảnh mới -->
    <div class="form-group">
        <img id="imagePreview" src="#" alt="Xem trước" style="display:none; max-height: 200px; margin-top: 10px;" class="img-thumbnail">
    </div>

    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
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
