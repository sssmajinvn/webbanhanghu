<?php include 'app/views/shares/header.php'; ?>

<h3 class="mb-4">Giỏ hàng</h3>

<?php if(!empty($cart)): ?>

<div class="row">

<!-- DANH SÁCH SẢN PHẨM -->

<div class="col-md-8">

<table class="table table-bordered bg-white">

<tr>
<th>Hình</th>
<th>Sản phẩm</th>
<th>Giá</th>
<th>Số lượng</th>
<th>Thành tiền</th>
<th>Xoá</th>
</tr>

<?php 
$total = 0;
foreach($cart as $id => $item): 

$subtotal = $item['price'] * $item['quantity'];
$total += $subtotal;
?>

<tr>

<td style="width:90px">
<img src="/webbanhang/<?php echo $item['image'] ?>" width="70">
</td>

<td class="text-start">
<?php echo $item['name'] ?>
</td>

<td>
<?php echo number_format($item['price']) ?>
</td>

<td>

<a href="/webbanhang/Product/decrease/<?php echo $id ?>" class="btn btn-sm btn-danger">-</a>

<span class="mx-2"><?php echo $item['quantity'] ?></span>

<a href="/webbanhang/Product/increase/<?php echo $id ?>" class="btn btn-sm btn-success">+</a>

</td>

<td>
<?php echo number_format($subtotal) ?>
</td>

<td>

<a href="/webbanhang/Product/remove/<?php echo $id ?>" 
class="btn btn-sm btn-outline-danger"
onclick="return confirm('Xoá sản phẩm này?')">

🗑

</a>

</td>

</tr>

<?php endforeach; ?>

</table>

<a href="/webbanhang/Product" class="btn btn-secondary">
← Tiếp tục mua
</a>

</div>


<!-- Ô THÀNH TIỀN -->

<div class="col-md-4">

<div class="card shadow-sm">

<div class="card-body">

<h5 class="mb-3">Thành tiền</h5>

<hr>

<h4 class="text-primary">

<?php echo number_format($total) ?> VND

</h4>

<hr>

<a href="/webbanhang/Product/checkout" 
class="btn btn-primary w-100">

Thanh toán

</a>

</div>

</div>

</div>

</div>

<?php else: ?>

<p>Giỏ hàng của bạn đang trống.</p>

<a href="/webbanhang/Product" class="btn btn-primary">
Tiếp tục mua sắm
</a>

<?php endif; ?>

<?php include 'app/views/shares/footer.php'; ?>