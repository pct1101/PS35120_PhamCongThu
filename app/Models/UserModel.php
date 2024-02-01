<?php
class UserModel extends CoreModel
{

    // private $userData = array(
    //     'ac_id' => '',
    //     'ac_name' => '',
    //     'ac_phonenumber' => '',
    //     'ac_address' => '',
    //     'ac_role' => '',
    //     'ac_email' => '',
    //     'ac_password' => '',
    //     'ac_otp' => '',
    //     'ac_date_otp' => ''
    // );

    // Phương thức đăng nhập
    public function login($email, $pass)
    {
        // Truy vấn để lấy thông tin người dùng từ cơ sở dữ liệu
        $userData = $this->db->pdo_query_one(
            "SELECT * FROM account WHERE ac_email=?",
            $email
        );

        if ($userData) {
            // Mật khẩu trong cơ sở dữ liệu
            $storedPassword = $userData['ac_password'];

            // So sánh mật khẩu đã nhập với mật khẩu đã hash trong cơ sở dữ liệu
            if (password_verify($pass, $storedPassword)) {
                // Mật khẩu khớp, trả về thông tin người dùng
                return $userData;
            }
        }

        // Sai email hoặc mật khẩu
        return false;
    }

    // Phương thức đăng ký
    public function register($ac_name, $ac_phonenumber, $ac_email, $ac_password)
    {
        return $this->db->pdo_execute(
            "INSERT INTO account(`ac_name`,`ac_phonenumber`,`ac_email`,`ac_password`)
            VALUE(?,?,?,?)",
            $ac_name,
            $ac_phonenumber,
            $ac_email,
            $ac_password
        );
    }


    // quên mật khẩu
    public function checkMail($email)
    {
        return $this->db->pdo_query_one(
            "SELECT ac_email FROM account
            WHERE ac_email=?",
            $email
        );
    }
    public function genOTP($email)
    {
        $OTP = rand(100000, 999999);
        $now = new DateTime();
        $now->add(new DateInterval("PT5M"));
        $date_OTP = $now->format("Y-m-d H:i:s");

        $this->db->pdo_execute(
            "UPDATE account
            SET ac_otp=?,
                ac_date_otp=?
            WHERE ac_email=?",
            $OTP,
            $date_OTP,
            $email
        );
        return $OTP;
    }

    // public function resetPassword($newPassword, $otp)
    // {
    //     $now = new DateTime();
    //     $currentDateTime = $now->format("Y-m-d H:i:s");

    //     $result = $this->db->pdo_query_one(
    //         "SELECT * FROM account
    //     WHERE ac_otp = ? AND ac_date_otp >= ?",
    //         $otp,
    //         $currentDateTime
    //     );

    //     if ($result) {
    //         $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    //         $this->db->pdo_execute(
    //             "UPDATE account
    //         SET ac_password = ?,
    //             ac_otp = NULL,
    //             ac_date_otp = NULL
    //         WHERE ac_email = ?",
    //             $hashedPassword,
    //             $result['ac_email']
    //         );

    //         return true;
    //     } else {
    //         return false;
    //     }
    // }


    public function resetPassword($newPassword, $otp, $id)
    {
        $now = new DateTime();
        $currentDateTime = $now->format("Y-m-d H:i:s");

        $result = $this->db->pdo_query_one(
            "SELECT ac_email FROM account
            WHERE ac_otp = ? 
            AND ac_date_otp >= ? 
            AND ac_id =?",
            $otp,
            $currentDateTime,
            $id
        );

        if ($result) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $this->db->pdo_execute(
                "UPDATE account
            SET ac_password = ?,
                ac_otp = NULL,
                ac_date_otp = NULL
            WHERE ac_email = ?",
                $hashedPassword,
                $result['ac_email']
            );

            return true;
        } else {
            return false;
        }
    }


    public function getAccByEmail($email)
    {
        return $this->db->pdo_query_one(
            "SELECT * FROM account WHERE ac_email=?",
            $email
        );
    }
}
?>
<!--  -->