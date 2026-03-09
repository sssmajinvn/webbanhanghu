<?php include 'app/views/shares/header_home.php'; ?>

<div class="row">

<?php foreach($products as $product): ?>

<div class="col-md-4 mb-4">

<div class="product-card">

<!-- IMAGE -->

<?php if(!empty($product->image)): ?>

<img src="/webbanhang/<?php echo $product->image ?>" class="product-img">

<?php else: ?>

<img src="https://via.placeholder.com/300x200" class="product-img">

<?php endif; ?>


<!-- NAME -->

<div class="product-title mt-2">
<?php echo $product->name ?>
</div>


<!-- PRICE -->

<div class="price">
<?php echo number_format($product->price) ?> VND
</div>


<!-- BUTTON -->

<div class="product-actions mt-2">

<a href="/webbanhang/Product/addToCart/<?php echo $product->id ?>" 
class="btn btn-primary btn-sm w-100 mb-1">
Thêm vào giỏ
</a>

<div class="d-flex gap-1">

<a href="/webbanhang/Product/edit/<?php echo $product->id ?>" 
class="btn btn-warning btn-sm w-50">
Sửa
</a>

<a href="/webbanhang/Product/delete/<?php echo $product->id ?>" 
class="btn btn-danger btn-sm w-50"
onclick="return confirm('Bạn có chắc muốn xoá?')">
Xoá
</a>

</div>

</div>

</div>

</div>

<?php endforeach; ?>

</div>

<?php include 'app/views/shares/footer.php'; ?>