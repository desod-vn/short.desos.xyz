<?php
    session_start();
    include "library/User.php";
    $user = new User();
    include "inc/db.php";
    include "inc/home.php";
    include "view/master/head.php";
?>
<div class="text-center">
      <div class="size-text-35 pad-10 mar-b-10 color-red color-text-white">
         <b>XÁC NHẬN</b>
      </div>
   </div>
         
   <div class="container">
      <div class="space-wrap">
        <div class="space-wrap">
            <div class="call-12">
<?php 
ob_start();
$email = $username = $password = '';
if(!isset($_SESSION['sure']))
   $_SESSION['sure'] = false;

if($_SESSION['sure']){
    $email = $_COOKIE["email"];
    $username = $_COOKIE["username"];
    $password = $_COOKIE["password"];
    $number = $_SESSION['number'];
}else
   header('Location: /');

    if(isset($_POST['go-submit']) && ($_SERVER['REQUEST_METHOD'] == 'POST'))
        if($_POST['number'] == $number){
            ?>
            <div class="color-light-blue panel-round-xl mar-t-10 mar-b-10 pad-15 size-text-18">
                <b>Email: </b><?php echo $email; ?>
                <br />
                <b>Tên người dùng: </b><?php echo $username; ?>
                <br />
                <b>Mật khẩu:</b><?php echo $password; ?>
            </div>
            <div class="color-pale-red pad-15 size-text-20">
                <span class="color-text-green">#</span>
                Xác nhận thành công vui lòng chờ tự động chuyển hướng sau 15 giây hoặc
                <a href="login.php">ấn vào đây</a> để chuyển hướng ngay.
                <br />
                <br />
                - Đây là những thông tin quan trọng dùng để đăng nhập,
                khôi phục lại mật khẩu hoặc nhận những thông báo mới từ chúng tôi.
                <br />
                <br />
                - Bạn hãy lưu những thông tin này lại và chắc chắn duy nhất mình bạn biết.
                Không cung cấp bất kỳ thông tin này cho ai khác kể cả admin.
                <br />
                <br />
                <span class="color-text-blue">***</span>
                Chúc bạn có một trải nghiệm sử dụng tuyệt vời. Cảm ơn bạn !!!
            </div>
            <?php
            $user->create($email, $username, $password);
            session_destroy();
            setcookie("email", "", 0);
            setcookie("username", "", 0);
            setcookie("password", "", 0);
            ?>
        
            <script type="text/javascript">setTimeout(() => {window.location="login.php"}, 15000);</script>
            <?php }else{ ?>
            <div class="color-light-blue panel-round-xl mar-t-10 mar-b-10 pad-15 size-text-18">
                Mã kích hoạt không chính xác, vui lòng kiểm tra lại.
            </div>
            <div class="color-pale-red pad-15 size-text-20">
                <form method="POST" action="" autocomplete="off">
                <label for="number">Nhập mã số gồm 6 số đã được gửi trong email: </label>
                <input type="text" name="number" id="number" placeholder="Mã 6 chữ số" maxlength="6" />
                <br />
                <input type="submit" id="submit" name="go-submit" class="button color-teal panel-round-xxl pad-15" value="Xác nhận" />
                </form>
                
                <span class="color-text-green">#</span>
                Nếu không nhận được email xin vui lòng <a href="">nhận lại mã</a> hoặc
                <a href="signup.php">trở về trang đăng ký</a> và tiến hành đăng ký lại.
            </div>
        <?php }else{echo $number;?>
       
         <div class="color-light-blue panel-round-xl mar-t-10 mar-b-10 pad-15 size-text-18">
         - Xin vui lòng kiểm tra địa chỉ email của bạn <b><?php echo $email; ?></b>
         và nhập mã 6 chữ số vào ô bên dưới để kích hoạt tài khoản trong vòng 60 phút.
         </div>
         
         <div class="color-pale-red pad-15 size-text-20">
            <form method="POST" action="" autocomplete="off">
            <label for="number">Nhập mã số gồm 6 số đã được gửi trong email: </label>
            <input type="text" name="number" id="number" placeholder="Mã 6 chữ số" maxlength="6" />
            <br />
            <input type="submit" id="submit" name="go-submit" class="button color-teal panel-round-xxl pad-15" value="Xác nhận" />
            </form>

            <span class="color-text-green">#</span>
            Nếu không nhận được email xin vui lòng <a href="">nhận lại mã</a> hoặc
            <a href="signup.php">trở về trang đăng ký</a> và tiến hành đăng ký lại.
         </div>
         <?php
        include 'inc/mail.php';
        } 
            ob_end_flush();	
        ?>
         </div>
      </div>
    </div>
   </div>
</body>
</html>