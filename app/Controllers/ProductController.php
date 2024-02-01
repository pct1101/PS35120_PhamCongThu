<?php

class ProductController extends CoreController
{
    public function addToCart($pd_id)
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (isset($_SESSION['user'])) {
            $ac_id = $_SESSION['user']['ac_id'];
            $order = $this->loadModel('Order');
            // Lấy thông tin giỏ hàng của người dùng
            $cart = $order->getCartByUser($ac_id);
            // Nếu chưa có giỏ hàng, tạo giỏ hàng mới
            if (!$cart) {
                $order->addCart($ac_id);
                $cart = $order->getCartByUser($ac_id);
            }
            // Thêm sản phẩm vào giỏ hàng
            $order->addProduct($cart['od_id'], $pd_id);
        } else {
            // Người dùng chưa đăng nhập -> Sử dụng giỏ hàng trên session
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }
            $scanproduct = false;
            $i = 0;
            // Duyệt qua giỏ hàng trên session để kiểm tra và thêm sản phẩm
            foreach ($_SESSION['cart'] as $pd) {
                if ($pd['dt_pd_id'] == $pd_id) {
                    $_SESSION['cart'][$i]['dt_quantity']++;
                    $scanproduct = true;
                    break;
                }
                $i++;
            }
            // Nếu sản phẩm không tồn tại trong giỏ hàng, thêm mới vào giỏ
            if (!$scanproduct) {
                array_push($_SESSION['cart'], [
                    "dt_pd_id" => $pd_id,
                    "dt_quantity" => 1,
                ]);
            }
        }
        header('Location: ' . APPURL);
    }
    // Hiện giỏ hàng
    public function cart()
    {
        $order = $this->loadModel('Order');
        if ($_SESSION['user']) {
            $cart = $order->getProductCart($_SESSION['user']['ac_id']);
        }
        $data['cart'] = $cart;
        $this->loadView('product_cart', $data);
    }
}
?>
<!--  -->