<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Web Bán Hàng</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:#f5f5f5;
}

.shop-header{
background:#0d6efd;
padding:15px;
color:white;
}

.logo{
font-size:24px;
font-weight:bold;
}

/* sidebar */

.sidebar{
background:white;
padding:20px;
border-radius:5px;
}

.sidebar a{
display:block;
padding:8px;
text-decoration:none;
color:black;
}

.sidebar a:hover{
background:#f1f1f1;
}

/* product */

.product-card{
background:white;
border-radius:5px;
padding:10px;
transition:0.2s;
}

.product-card:hover{
box-shadow:0 0 10px rgba(0,0,0,0.15);
transform:translateY(-3px);
}

.product-img{
height:200px;
object-fit:cover;
}

.price{
color:#0d6efd;
font-weight:bold;
font-size:18px;
}


.product-card{
background:white;
border-radius:6px;
padding:10px;
height:100%;
display:flex;
flex-direction:column;
justify-content:space-between;
}

.product-img{
width:100%;
height:200px;
object-fit:cover;
background:#eee;
}

.product-title{
min-height:50px;
font-weight:500;
}

.price{
color:#0d6efd;
font-weight:bold;
}

.product-actions{
margin-top:auto;
}

</style>

</head>

<body>

<div class="shop-header">
<div class="container">

<div class="row align-items-center">

<div class="col-md-4 logo">
Web Bán Hàng
</div>

<div class="col-md-8 text-end">

<a href="/webbanhang/Product" class="btn btn-light me-2">
Sản phẩm
</a>

<a href="/webbanhang/Product/add" class="btn btn-light me-2">
Thêm sản phẩm
</a>

<a href="/webbanhang/Product/cart" class="btn btn-warning">
🛒 Giỏ hàng
</a>

</div>

</div>
</div>
</div>

<div class="container mt-4">

<div class="row">

<!-- SIDEBAR -->
<div class="col-md-3">
<div class="sidebar">

<h5>Danh mục</h5>

<a href="/webbanhang/Product">Tất cả</a>

<?php
require_once 'app/models/CategoryModel.php';
$db = (new Database())->getConnection();
$categoryModel = new CategoryModel($db);
$categories = $categoryModel->getCategories();

foreach($categories as $cat){
echo '<a href="/webbanhang/Product/category/'.$cat->id.'">'.$cat->name.'</a>';
}
?>

</div>
</div>

<!-- PRODUCT AREA -->
<div class="col-md-9">