<?php
class CoreModel
{
    // Thuộc tính chứa đối tượng Database để thực hiện các thao tác với cơ sở dữ liệu
    protected $db;
    // Phương thức khởi tạo
    public function __construct()
    {
        // Khởi tạo đối tượng Database
        $this->db = new Database();
    }
    // Phương thức hủy
    public function __destruct()
    {
        // Hủy đối tượng Database khi không cần thiết nữa
        unset($this->db);
    }
}
?>
<!--  -->