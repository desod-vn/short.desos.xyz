<form method="POST" action="" autocomplete="off">
	<label for="lg-username">Tên người dùng: </label>
	<input type="text" name="lg-username" id="lg-username" placeholder="Nhập tên người dùng" />

	<label for="lg-password">Mật khẩu: </label>
	<input type="password" name="lg-password" id="lg-password" placeholder="Nhập mật khẩu" />
	
	<label>
		<input type="checkbox" name="lg-remember" id="lg-remember" />
		Nhớ tài khoản ?
	</label>
	<div style="visibility: hidden;">
	<label for="in-number">Mã bảo vệ: </label>
		<span class="color-dark-gray color-border-dark-gray pad-7 color-text-white" id="out-number">0000</span>
		<input type="text" name="in-number" id="in-number" maxlength="4"/>
	</div>
	<input type="submit" id="login" name="login" class="button color-teal panel-round-xxl pad-15" value="Đăng nhập" />
</form>