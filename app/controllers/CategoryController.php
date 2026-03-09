<?php
// =============================================================
// FILE: CategoryController.php - CONTROLLER XỬ LÝ DANH MỤC
// =============================================================
// CRUD đầy đủ: index, add, save, edit, update, delete

require_once('app/config/database.php');
require_once('app/models/CategoryModel.php');

class CategoryController
{
    private $categoryModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->categoryModel = new CategoryModel($this->db);
    }

    // ACTION: index - Hiển thị danh sách danh mục
    public function index()
    {
        $categories = $this->categoryModel->getCategories();
        include 'app/views/category/list.php';
    }

    // ACTION: list - Alias cho index
    public function list()
    {
        $this->index();
    }

    // ACTION: add - Hiển thị form thêm danh mục
    public function add()
    {
        include 'app/views/category/add.php';
    }

    // ACTION: save - Xử lý lưu danh mục mới
    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';

            $result = $this->categoryModel->addCategory($name, $description);

            if (is_array($result)) {
                $errors = $result;
                include 'app/views/category/add.php';
            } else {
                header('Location: /webbanhang/Category');
            }
        }
    }

    // ACTION: edit - Hiển thị form sửa danh mục
    public function edit($id)
    {
        $category = $this->categoryModel->getCategoryById($id);
        if ($category) {
            include 'app/views/category/edit.php';
        } else {
            echo "Không thấy danh mục.";
        }
    }

    // ACTION: update - Xử lý cập nhật danh mục
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];

            $result = $this->categoryModel->updateCategory($id, $name, $description);

            if (is_array($result)) {
                $errors = $result;
                $category = $this->categoryModel->getCategoryById($id);
                include 'app/views/category/edit.php';
            } else {
                header('Location: /webbanhang/Category');
            }
        }
    }

    // ACTION: delete - Xóa danh mục
    public function delete($id)
    {
        if ($this->categoryModel->deleteCategory($id)) {
            header('Location: /webbanhang/Category');
        } else {
            echo "Đã xảy ra lỗi khi xóa danh mục. Có thể danh mục đang chứa sản phẩm.";
        }
    }
}
?>
