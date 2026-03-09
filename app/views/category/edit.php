<!-- FILE: edit.php - VIEW FORM SỬA DANH MỤC -->

<?php include 'app/views/shares/header.php'; ?>

<h1>Sửa danh mục</h1>

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

<form method="POST" action="/webbanhang/Category/update">
    <input type="hidden" name="id" value="<?php echo $category->id; ?>">

    <div class="form-group">
        <label for="name">Tên danh mục:</label>
        <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>" required>
    </div>

    <div class="form-group">
        <label for="description">Mô tả:</label>
        <textarea id="description" name="description" class="form-control"><?php echo htmlspecialchars($category->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
</form>

<a href="/webbanhang/Category" class="btn btn-secondary mt-2">Quay lại danh sách</a>

<?php include 'app/views/shares/footer.php'; ?>
