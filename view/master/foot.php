<?php
if(!isset($_SESSION['username'])){
?>
<section class="container">
    <div class="space-wrap">
        <div class="call-12">
            <div class="banner">
                Đăng ký tài khoản để
            </div>
        </div>
        <div class="call-4">
            <div class="menu">
                <img class="menu__img" src="view/style/img/date.png" />
                <p class="menu__p">Giới hạn</p>
            </div>
        </div>
        <div class="call-4">
            <div class="menu">
                <img class="menu__img" src="view/style/img/des.png" />
                <p class="menu__p">Mô tả</p>
            </div>
        </div>
        
        <div class="call-4">
            <div class="menu">
                <img class="menu__img" src="view/style/img/pass.png" />
                <p class="menu__p">Bảo mật</p>
            </div>
        </div>
    
        <div class="call-4">
            <div class="menu">
                <img class="menu__img" src="view/style/img/query.png" />
                <p class="menu__p">Tùy biến</p>
            </div>
        </div>

        <div class="call-4">
            <div class="menu">
                <img class="menu__img" src="view/style/img/statis.png" />
                <p class="menu__p">Quản lý</p>
            </div>
        </div>

        <div class="call-4">
            <div class="menu">
                <img class="menu__img" src="view/style/img/share.png" />
                <p class="menu__p">Chia sẻ</p>
            </div>
        </div>
    </div>
</section>

<?php 
$select = "SELECT * FROM user";
$query = mysqli_query($connect, $select);

$users = mysqli_num_rows($query);

$select = "SELECT * FROM short";
$query = mysqli_query($connect, $select);

$links = mysqli_num_rows($query);

$select = "SELECT * FROM short";
$query = mysqli_query($connect, $select);

$qty= 0;
while ($num = mysqli_fetch_assoc($query)) {
    $qty += $num['count'];
}
?>


<section class="container">
    <div class="wrap color-black">
        <div class="call-4">
            <div class="invod">
                Thống kê
                <div class="invod__p">
                    <?php echo $links; ?> liên kết.
                </div>
            </div>
        </div>
        <div class="call-4">
            <div class="invod">
                Đã phục vụ
                <div class="invod__p">
                    <?php echo $qty; ?> lần truy cập.
                </div>
            </div>
        </div>
        <div class="call-4">
            <div class="invod">
                Được tin cậy bởi
                <div class="invod__p">
                    <?php echo $users; ?> người dùng.
                </div>
            </div>
        </div>
    </div>
<?php } ?>
    <footer class="wrap color-blue pad-15">
        <div class="call-8">
            2020 © Desod.XYZ - Website <a class="a" href="https://link.desos.xyz" title="Rút gọn link miễn phí">rút gọn link</a> miễn phí.
        </div>
        <div class="call-4">
            <strong> Call me: (+84) 389 064 540</strong>
        </div>
    </footer>
</section>
</body>
</html>
