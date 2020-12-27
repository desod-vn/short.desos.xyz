<div class="navbar">
  <span class="navbar--logo">
  </span>
  <ul class="navbar__ul">
<?php
if(isset($_SESSION['username'])){
?>
<li class="navbar__ul__li">
  <span class="navbar__ul__li--active" href="#">
    Xin chào, <?php echo $_SESSION['username']; ?>
  </span>
<li class="navbar__ul__li">
  <a class="navbar__ul__li__a" href="/board.php">Quản lý</a>
</li>
<li class="navbar__ul__li">
  <a class="navbar__ul__li__a" href="/logout.php">Đăng xuất</a>
</li>
<?php
}
else{
?>
<li class="navbar__ul__li">
  <a class="navbar__ul__li--active" href="#">Trang chủ</a>
</li>
<li class="navbar__ul__li">
  <a class="navbar__ul__li__a" href="/login.php">Đăng nhập</a>
</li>
<li class="navbar__ul__li">
  <a class="navbar__ul__li__a" href="/signup.php">Đăng ký</a>
</li>
<?php } ?>
  </ul>
</div>
