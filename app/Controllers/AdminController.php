<?php
class AdminController extends CoreController
{
    public function dashboard()
    {
        $product = $this->loadModel('Product');
        $data['listProduct'] = $product->getAllProducts();
        $this->loadViewAdmin('admin_dashboard', $data);
    }
    public function product_add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product = $this->loadModel('Product');

            $name = htmlspecialchars($_POST['name']);
            $price = htmlspecialchars($_POST['price']);
            $quantity = htmlspecialchars($_POST['quantity']);
            $status = htmlspecialchars($_POST['status']);
            $result = $product->addNewProduct($name, $price, $quantity, $status);
            if (!$result) {
                showNoti("Thêm sản phẩm thành công", "success");
                header('Location: ' . APPURL . 'admin/dashboard');
                return;
            } else {
                showNoti("Thêm sản phẩm thất bại", "danger");
            }
        }
        $this->loadViewAdmin('admin_product_add');
    }
    public function delete_product($pd_id)
    {
        $product = $this->loadModel('Product');
        $result = $product->deleteProduct($pd_id);
        if ($result) {
            showNoti("Xóa sản phẩm thành công", "success");
        } else {
            showNoti("Xóa sản phẩm thất bại", "danger");
        }
        header('Location: ' . APPURL . 'admin/dashboard');
        exit();
    }
}
?>
<!--  -->