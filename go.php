<?php session_start(); ?>
<?php include_once "inc/db.php"; ?>
<?php include_once "inc/home.php"; ?>
<?php include "view/master/head.php"; ?>
<?php include "view/master/menu.php"; ?>
<?php
	$cross = substr($_SERVER["REQUEST_URI"], 1);
	$confirm = "SELECT * FROM `short` WHERE query = '$cross'";
	$query = mysqli_query($connect,$confirm);
	$exist = mysqli_num_rows($query);

	echo $cross;
	if(!$exist)
	echo 2;	
	//header("Location: /");
	else {
	$gets = mysqli_fetch_array($query);

	$incre = $gets['count'];
	$incre += 1;
	$insert = "UPDATE short SET count = '$incre' WHERE query = '$cross'";
	        mysqli_query($connect,$insert);
	$realUrl = $gets["link"];
	$url = strtolower($realUrl);

	if(($url[0] == "h") && ($url[1] == "t") && ($url[2] == "t")
		&& ($url[3] == "p") && ($url[4] == ":") && ($url[5] == "/") 
		&& ($url[6] == "/"))
			{
                $realUrl = substr($realUrl, 7,(strlen($realUrl) - 7));
			}
		else if(($url[0] == "h") && ($url[1] == "t") && ($url[2] == "t")
		&& ($url[3] == "p") && ($url[4] == "s") && ($url[5] == ":")
		&& ($url[6] == "/") && ($url[7] == "/"))
			{
                $realUrl = substr($realUrl, 8,(strlen($realUrl) - 8));
			}

if($gets["password"] != '')
		{

			?>
	<header class="container">
  		<div class="center-wrap">
  			  	<?php
  			if(isset(($_POST["links"])))
		{
			if($_POST["links"] == $gets["password"])
				header("Location: http://$realUrl");
			else
				echo '<div class="color-red mar-tb-5 pad-15 panel-round-l size-text-20">
				<span class="color-text-blue">*</span> Mật khẩu bạn nhập không đúng. Vui lòng thử lại.</div>';

		}
		?>
  			<div id="link-form">
  			<div class="size-text-20 mar-0">
				<b>
					Nhập mật khẩu để truy cập liên kết:
				</b>
				</div>
			<form action="" method="post">
            <input type="password" placeholder="Nhập mật khẩu" autocomplete="off" name="links" require>
			<input type="submit" id="link-copy" value="Truy cập">
            </form>
			</div>
		</div>
		
	</div>
  		</div>
  	</header>
	  	<?php
		}
		else
		{
			header("Location: http://$realUrl");
		}
		
	
		
		
		}

?>