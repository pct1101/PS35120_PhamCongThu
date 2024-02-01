<div class="container-login p-t-5 p-b-5">
    <div class="login">
        <form method="POST" action="">
            <div class="top">
                <h2>Đăng nhập</h2>
                <h4>Đăng nhập đi bạn ơi!</h4>
            </div>
            <div class="input">
                <input type="text" id="email" name="email" placeholder="Email" />
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="input">
                <input type="password" id="pass" name="pass" placeholder="Password">
                <i class="fa-solid fa-eye"></i>
            </div>
            <div class="forget">
                <a href="<?= APPURL ?>user/forgotPassword">Quên mật khẩu?</a>
            </div>
            <div>
                <button type="submit" class="btn-f-login">Đăng nhập</button>
            </div>
            <div class="or">
                <p>Or</p>
            </div>
            <div class="icon">
                <a href="<?= APPURL ?>user/register"><i class="fa-solid fa-user-plus"></i>Đăng ký</a>
            </div>
        </form>
    </div>
</div>