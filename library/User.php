<?php

class User 
{
    public function create($email, $username, $password){
		global $connect;
		$insert = "INSERT INTO user(email, username, password)
			VALUES('$email', '$username', '$password');";
		$query = mysqli_query($connect, $insert);
	}
    public function check($input){
		$input = trim($input);
  		$input = stripslashes($input);
  		$input = htmlspecialchars($input);
 		return $input;
	}
	public function same($type, $data){
		global $connect;
		$check = "SELECT $type FROM user WHERE $type = '$data';";
		$query = mysqli_query($connect, $check);
		$exist = mysqli_num_rows($query);

		if($exist > 0)
			return 0;
		return 1;
	}
	public function confirm($email, $username, $password){
        $_SESSION['number'] = rand(100000,999999);
        $_SESSION['sure'] = true;
        setcookie("email", $email, time() + 3600);
        setcookie("username", $username, time() + 3600);
        setcookie("password", $password, time() + 3600);
        
		header('Location: done.php');
	}
	public function access($username, $password){
		global $connect;
		$login = "SELECT * FROM user WHERE username = '$username' and password = '$password';";
		$query = mysqli_query($connect, $login);
		$check = mysqli_num_rows($query);

		if($check == 0)
			return 0;
		else
			while($store = mysqli_fetch_array($query)){
				$_SESSION['id'] = $store['id'];
				$_SESSION['email'] = $store['email'];
				$_SESSION['username'] = $store['username'];
				$_SESSION['level'] = $store['level'];  
			}
		return 1;
    }
    
    public function signup () 
    {
        ob_start();
        if(isset($_SESSION['username']))
            header('Location: /');

        $email = $username = $password = '';

        if(isset($_POST['in-submit']) && ($_SERVER['REQUEST_METHOD'] == 'POST')){
            $email = $this->check($_POST['in-email']);
            $username = $this->check($_POST['in-username']);
            if($_POST['in-password'] == $_POST['re-password'])
                $password = $this->check($_POST['in-password']);
        }
        if(isset($_POST['in-submit']) && ($_SERVER['REQUEST_METHOD'] == 'POST'))
            if(!$this->same('email', $email))
                echo '<div class="color-light-blue panel-round-l mar-5 pad-10 size-text-20">
                        <h3>Ôi bạn ơi !</h3>
                        Địa chỉ email này đã được đăng ký vui lòng kiểm tra lại
                    </div>';	
            elseif(!$this->same('username', $username))
                echo '<div class="color-light-blue panel-round-l mar-5 pad-10 size-text-20">
                        <h3>Ôi bạn ơi !</h3>
                        Tên người dùng này đã tồn tại vui lòng đổi tên khác
                    </div>';
            else
                $this->confirm($email, $username, $password);        
        ob_end_flush();	
    }

    public function login ()
    {
        ob_start();
        if(isset($_SESSION['username']))
            header("Location: /");
        
        $username = $password = '';
        if(isset($_POST['login']) && ($_SERVER['REQUEST_METHOD'] == 'POST')){
            $username = $_POST['lg-username'];
            $password = $_POST['lg-password'];

            $username = $this->check($username);
            $password = $this->check($password);
        

            if(($username != '') && ($password != '')){
                $login = $this->access($username, $password);
                if($login)
                        header("Location: /");
                else
                    echo '<div class="color-pale-red mar-5 pad-10 size-text-20"><span class="color-text-red">*</span> Tài khoản hoặc mật khẩu không chính xác !</div>';
            }
        }
        ob_end_flush();		
    }

}