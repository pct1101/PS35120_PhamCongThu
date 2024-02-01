<?php

class ProductModel extends CoreModel
{
    // Phương thức lấy tất cả sản phẩm trong cơ sở dữ liệu
    public function getAllProducts()
    {
        return $this->db->pdo_query("SELECT * FROM products");
    }
    // Phương thức lấy các sản phẩm có trạng thái "flashsale"
    public function getProductsFlashSale()
    {
        return $this->db->pdo_query("SELECT * FROM products WHERE pd_status = 'flashsale'");
    }
    // Phương thức thêm sản phẩm mới vào cơ sở dữ liệu
    public function addNewProduct($pd_name,  $pd_price, $pd_quantity, $pd_status)
    {
        return $this->db->pdo_execute(
            "INSERT INTO products(`pd_name`,`pd_price`,`pd_quantity`,`pd_status`)
            VALUE(?,?,?,?)",
            $pd_name,
            $pd_price,
            $pd_quantity,
            $pd_status
        );
    }
    // Phương thức xóa sản phẩm từ cơ sở dữ liệu
    public function deleteProduct($pd_id)
    {
        return $this->db->pdo_execute("DELETE FROM products WHERE pd_id=?", $pd_id);
    }
}
?>
<!--  -->