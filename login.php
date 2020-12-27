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
			<b>ĐĂNG NHẬP</b>
		</div>
	</div>


	<div class="container">
		<div class="center-wrap">
            <?php $user->login(); ?>
            <div id="hide"></div>
	    </div>
	    <div class="center-wrap">
            <?php include "view/user/login.php"; ?>
        </div>
    </div>
	<script type="text/javascript" src="view/ctrl/user-login.js"></script>
</body>
</html>