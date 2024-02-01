<?php
class Core
{
    // Khai báo các thuộc tính mặc định cho Controller, method, và params
    protected $controller = "Page"; //Chứa tên của các controller 
    protected $method = "index";    //Chứa các method trong controller
    protected $params = [];         //Chứa các tham số trong URL

    public function __construct()
    {
        // Kiểm tra nếu có tham số 'url' được truyền qua phương thức GET
        if (isset($_GET['url'])) {
            // Tách chuỗi 'url' thành mảng bằng dấu '/'
            $url = explode('/', $_GET['url']);
            // Gán giá trị đầu tiên của mảng làm tên Controller
            $this->controller = $url[0];
            // Loại bỏ phần tử đã sử dụng từ mảng
            unset($url[0]);
            // Gán giá trị tiếp theo của mảng làm tên method
            $this->method = $url[1];
            // Loại bỏ phần tử đã sử dụng từ mảng
            unset($url[1]);
            // Gán các giá trị còn lại của mảng làm tham số
            $this->params = array_values($url);
        }
        // Đăng ký hàm autoloader để tự động nạp các file class khi cần
        spl_autoload_register(function ($class) {
            // Xây dựng đường dẫn tới file của Controller, Model, và Library
            $controllerPath = "../app/Controllers/" . $class . ".php";
            $modelPath = "../app/Models/" . $class . ".php";
            $libPath = "../app/Libraries/" . $class . ".php";
            // Nếu file Controller tồn tại, include_once nó
            if (file_exists($controllerPath)) {
                include_once $controllerPath;
            }
            // Nếu file Model tồn tại, include_once nó
            elseif (file_exists($modelPath)) {
                include_once $modelPath;
            }
            // Nếu file Library tồn tại, include_once nó
            elseif (file_exists($libPath)) {
                include_once $libPath;
            }
        });
        // Tạo đối tượng Controller và gọi phương thức với các tham số đã xác định
        $controller = $this->controller . "Controller";
        $ctrl = new $controller();
        call_user_func_array([$ctrl, $this->method], $this->params);
    }
}
?>
<!--  -->