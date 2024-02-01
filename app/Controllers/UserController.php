<?php
class UserController extends CoreController
{
    public function register()
    {
        // Kiểm tra nếu có yêu cầu POST từ form đăng ký
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $user = $this->loadModel('User');

            // Lấy và xử lý dữ liệu từ form
            $name = htmlspecialchars($_POST['name']);
            $phonenumber = htmlspecialchars($_POST['phonenumber']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['pass']);

            // Kiểm tra nếu email đã tồn tại thì thông báo mail đã tồn tại
            if ($user->checkMail($email)) {
                showNoti('Email đã tồn tại', 'warning');
            } else {
                // Kiểm tra không được để trống bất kì ô nào
                if (empty($name) || empty($phonenumber) || empty($email) || empty($password)) {
                    showNoti('Không được để trống bất kỳ ô nào', 'warning');
                } else {
                    // Nếu mail chưa tồn tại thì mã hoá pass và register()
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $user->register($name, $phonenumber, $email, $hashedPassword);
                    showNoti('Đăng ký thành công', 'success');
                    header("Location: " . APPURL . "user/login");
                }
            }
        }
        $this->loadView('user_register');
    }


    // Phương thức xử lý đăng nhập người dùng
    public function login()
    {
        // Kiểm tra nếu có yêu cầu POST từ form đăng nhập
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Tạo đối tượng User từ model
            $user = $this->loadModel('User');

            // Gọi phương thức login từ model để thực hiện đăng nhập
            $kq = $user->login($_POST['email'], $_POST['pass']);

            // Kiểm tra kết quả đăng nhập và thực hiện các hành động tương ứng
            if ($kq) {
                // Lưu session
                $_SESSION['user'] = $kq;
                // Chuyển trang 
                showNoti("Đăng nhập thành công", "success");
                header('Location:' . APPURL);
                return;
            } else {
                showNoti("Sai email hoặc mật khẩu", "danger");
            }
        }
        // Hiển thị view đăng nhập
        $this->loadView('user_login');
    }

    // Phương thức xử lý đăng xuất người dùng
    public function logout()
    {
        // Hủy session người dùng và chuyển hướng về trang chủ
        unset($_SESSION['user']);
        header("Location: " . APPURL);
    }

    // public function forgotPassword()
    // {
    //     $user = $this->loadModel("User");
    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         $kq = $user->checkMail($_POST['email']);
    //         if ($kq) {
    //             $senderName = "PCT1101";
    //             $senderEmail = "thupcps35120@fpt.edu.vn";
    //             $senderEmailPassword = "xrwn qrhi tuao jrkg";

    //             $OTP = $user->genOTP($_POST["email"]);

    //             $recieverEmail = $_POST['email'];
    //             $subject = "Thay đổi mật khẩu";
    //             $body = "Vui lòng sử dụng mã OTP được cung cấp sau đây để đặt lại mật khẩu.
    //                     Mã OTP của bạn là : <strong>" . $OTP . "</strong>.
    //                     Mã OTP có hiệu lực trong 5 phút";

    //             $mailer = new Mail($senderName, $senderEmail, $senderEmailPassword);
    //             $mailer->sendMail($recieverEmail, $subject, $body);

    //             header("Location: " . APPURL . "user/resetPassword");
    //         } else {
    //             showNoti("Email không tồn tại", "warning");
    //         }
    //     }

    //     $this->loadView("user_forgotPassword");
    // }

    public function forgotPassword()
    {
        $user = $this->loadModel("User");

        if (
            $_SERVER["REQUEST_METHOD"] == "POST"
        ) {
            $kq = $user->checkMail($_POST['email']);

            if ($kq) {
                $senderName = "PCT1101";
                $senderEmail = "thupcps35120@fpt.edu.vn";
                $senderEmailPassword = "xrwn qrhi tuao jrkg";

                $OTP = $user->genOTP($_POST["email"]);

                $recieverEmail = $_POST['email'];
                $subject = "Thay đổi mật khẩu";
                $body = "Vui lòng sử dụng mã OTP được cung cấp sau đây để đặt lại mật khẩu.
                        Mã OTP của bạn là : <strong>" . $OTP . "</strong>.
                        Mã OTP có hiệu lực trong 5 phút";

                $mailer = new Mail($senderName, $senderEmail, $senderEmailPassword);
                $mailer->sendMail($recieverEmail, $subject, $body);

                $data['ac_user'] = $user->getAccByEmail($_POST['email']);

                header("Location: " . APPURL . "user/resetPassword/{$data['ac_user']['ac_id']}");
                exit();
            } else {
                showNoti("Email không tồn tại", "warning");
            }
        }

        $this->loadView("user_forgotPassword");
    }


    // public function resetPassword()
    // {
    //     $user = $this->loadModel("User");
    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         if ($_POST['password'] != $_POST['confirmpassword']) {
    //             showNoti('Mật khẩu không khớp', 'warning');
    //         } else {
    //             $kq = $user->resetPassword($_POST['password'], $_POST['otp']);
    //             if ($kq) {
    //                 showNoti('Mật khẩu đã thay đổi thành công', 'success');
    //                 header("Location: " . APPURL . "user/login");
    //             } else {
    //                 showNoti("Mã OTP không đúng", "warning");
    //             }
    //         }
    //     }
    //     $this->loadView("user_resetPassword");
    // }
    public function resetPassword()
    {
        $user = $this->loadModel("User");
        $url = $_SERVER['REQUEST_URI'];
        $urlParts = explode('/', $url);
        $id_user = end($urlParts);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($_POST['password'] != $_POST['confirmpassword']) {
                showNoti('Mật khẩu không khớp', 'warning');
            } else {
                $kq = $user->resetPassword($_POST['password'], $_POST['otp'], $id_user);
                if ($kq) {
                    showNoti('Mật khẩu đã thay đổi thành công', 'success');
                    header("Location: " . APPURL . "user/login");
                } else {
                    showNoti("Mã OTP không đúng", "warning");
                }
            }
        }
        $this->loadView("user_resetPassword");
    }
}
?>
<!--  -->