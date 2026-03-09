<?php
// =============================================================
// FILE: database.php - CẤU HÌNH KẾT NỐI CƠ SỞ DỮ LIỆU
// =============================================================
// Sử dụng PDO (PHP Data Objects) để kết nối MySQL.
// PDO hỗ trợ Prepared Statements chống SQL Injection
// và có thể chuyển đổi giữa các loại CSDL dễ dàng.
// =============================================================

class Database {
    // Thuộc tính private: chỉ truy cập được bên trong class
    private $host = "localhost";      // Địa chỉ server MySQL (localhost = cùng máy)
    private $db_name = "my_store";    // Tên cơ sở dữ liệu
    private $username = "root";       // Tài khoản MySQL (mặc định Laragon)
    private $password = "";           // Mật khẩu MySQL (mặc định Laragon: rỗng)
    
    // Thuộc tính public: cho phép truy cập từ bên ngoài class
    public $conn;                     // Biến lưu trữ kết nối PDO

    /**
     * Phương thức tạo và trả về kết nối PDO đến MySQL
     * 
     * @return PDO|null Trả về đối tượng PDO nếu thành công, null nếu thất bại
     */
    public function getConnection() {
        // Đặt giá trị ban đầu là null (chưa kết nối)
        $this->conn = null;

        try {
            // Tạo kết nối PDO mới
            // Tham số 1 (DSN - Data Source Name): Loại CSDL, host, tên database
            // Tham số 2: Username đăng nhập MySQL
            // Tham số 3: Password đăng nhập MySQL
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );

            // Thiết lập charset UTF-8 để hỗ trợ tiếng Việt
            // Nếu không có dòng này, dữ liệu tiếng Việt có thể bị lỗi font
            $this->conn->exec("set names utf8");

        } catch(PDOException $exception) {
            // Bắt lỗi kết nối (sai host, sai tên DB, sai mật khẩu...)
            // Hiển thị thông báo lỗi thay vì crash ứng dụng
            echo "Connection error: " . $exception->getMessage();
        }

        // Trả về đối tượng kết nối PDO (hoặc null nếu lỗi)
        return $this->conn;
    }
}
