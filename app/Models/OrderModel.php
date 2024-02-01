<?php
class OrderModel extends CoreModel
{
    // Phương thức lấy giỏ hàng bằng id tài khoản
    public function getCartByUser($ac_id)
    {
        return $this->db->pdo_query_one(
            "SELECT * 
            FROM ordercart 
            WHERE od_ac_id =? 
            AND od_status=?",
            $ac_id,
            'gio-hang'
        );
    }
    // Phương thức tạo giỏ hàng mới
    public function addCart($ac_id)
    {
        return $this->db->pdo_execute(
            "INSERT INTO ordercart(`od_ac_id`)
            VALUES(?)",
            $ac_id
        );
    }
    // Phương thức thêm sản phẩm vào giỏ hàng
    public function addProduct($dt_od_id, $dt_pd_id)
    {
        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        $kq = $this->hasCart($dt_od_id, $dt_pd_id);
        if ($kq) {
            // Nếu đã có, cập nhật số lượng sản phẩm
            return $this->db->pdo_execute(
                "UPDATE order_details 
                SET dt_quantity = dt_quantity+1
                WHERE dt_od_id=?
                AND dt_pd_id=?",
                $dt_od_id,
                $dt_pd_id
            );
        } else {
            // Nếu chưa có, thêm mới sản phẩm vào giỏ hàng
            return $this->db->pdo_execute(
                "INSERT INTO order_details (`dt_od_id`,`dt_pd_id`)
                VALUES (?,?)",
                $dt_od_id,
                $dt_pd_id
            );
        }
    }
    // Phương thức kiểm tra xem sản phẩm đã có trong đơn hàng chưa
    public function hasCart($dt_od_id, $dt_pd_id)
    {
        return $this->db->pdo_query_one(
            "SELECT * FROM order_details
            WHERE dt_od_id=?
            AND dt_pd_id=?",
            $dt_od_id,
            $dt_pd_id
        );
    }
    // Phương thức lấy tất cả sản phẩm đang có trong giỏ hàng
    public function getProductCart($ac_id)
    {
        return $this->db->pdo_query(
            "SELECT * FROM order_details dt
            INNER JOIN products pd
            ON dt.dt_pd_id = pd.pd_id"
        );
    }
}
?>
<!--  -->