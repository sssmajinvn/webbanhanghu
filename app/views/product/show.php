<!-- FILE: show.php - VIEW CHI TIẾT SẢN PHẨM -->

<?php include 'app/views/shares/header.php'; ?>

<div class="row">
    <!-- Cột ảnh -->
    <div class="col-md-5">
        <?php if (!empty($product->image)): ?>
            <img src="/webbanhang/public/uploads/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" 
                 alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>"
                 class="img-fluid img-thumbnail">
        <?php else: ?>
            <div class="bg-secondary d-flex align-items-center justify-content-center" style="height: 300px;">
                <span class="text-white h5">Không có ảnh</span>
            </div>
        <?php endif; ?>
    </div>

    <!-- Cột thông tin -->
    <div class="col-md-7">
        <h1><?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?></h1>
        <hr>
        <p><strong>Mô tả:</strong> <?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
        <p><strong>Giá:</strong> <span class="text-danger h4"><?php echo number_format($product->price, 0, ',', '.'); ?> VNĐ</span></p>
        <p><strong>Danh mục ID:</strong> <?php echo htmlspecialchars($product->category_id, ENT_QUOTES, 'UTF-8'); ?></p>

        <div class="mt-3">
            <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>" class="btn btn-warning">Sửa</a>
            <a href="/webbanhang/Product/delete/<?php echo $product->id; ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
            <a href="/webbanhang/Product" class="btn btn-secondary">Quay lại danh sách</a>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
