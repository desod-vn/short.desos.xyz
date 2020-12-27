<?php
    session_start();
    include "library/User.php";
    $user = new User();
    include "inc/db.php";
    include "inc/home.php";
    include "view/master/head.php";
?>
    <div class="text-center">
    	<div class="size-text-35 pad-10 mar-b-10 color-blue color-text-white">
    		<b>ĐĂNG KÝ</b>
    	</div>
    </div>
    		
    <div class="container">
    	<div class="center-wrap">
        <?php $user->signup(); ?>
        <?php include "view/user/signup.php"; ?>
        </div>
	</div>

	<div class="place-overlay" id="hide">
		<div class="container">
			<div class="center-wrap">
				<div class="panel color-green pad-15">
					<div class="place-top-right" id="fly-off">
						<span class="button color-red">X</span>
					</div>
					<h3 class="color-text-white">Xin lỗi !!!</h3>
					<div id="fly-alert" class="size-text-20 color-text-white">
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script type="text/javascript" src="view/ctrl/user-signup.js"></script>
</body>
</html>