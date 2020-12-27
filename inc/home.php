<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");

class Home{
	public function title($namePage){
		if($namePage == '/signup.php')
			return 'Đăng ký';
		elseif($namePage == '/signin.php')
			return 'Đăng nhập';
		elseif($namePage == '/done.php')
			return 'Xác nhận';
		else
			return 'Rút gọn link miễn phí - Web rút gọn liên kết - Free URL Shortener';
	}
}

$home = new Home();

$date = date("H:i - d/m/Y");
?>