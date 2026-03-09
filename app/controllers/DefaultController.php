<?php
// =============================================================
// FILE: DefaultController.php - CONTROLLER MẶC ĐỊNH
// =============================================================
// Được gọi khi user truy cập URL gốc: /webbanhang/
// (không chỉ định controller cụ thể)
// Nhiệm vụ: Chuyển hướng đến trang chính (danh sách sản phẩm)
// =============================================================

class DefaultController
{
    /**
     * Action mặc định - được gọi khi truy cập /webbanhang/
     * Chuyển hướng (redirect) người dùng đến trang danh sách sản phẩm
     */
    public function index()
    {
        // header('Location: ...'): Gửi HTTP redirect (302) đến URL mới
        // Trình duyệt sẽ tự động chuyển đến /webbanhang/Product
        header('Location: /webbanhang/Product');
    }
}
?>
