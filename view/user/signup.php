<form method="POST" action="" autocomplete="off">
	<label for="in-email">Địa chỉ email: </label>
	<input type="text" name="in-email" id="in-email" placeholder="Vui lòng nhập email hợp lệ" maxlength="255"/>
	
	<label for="in-username">Tên người dùng: </label>
	<input type="text" name="in-username" id="in-username" placeholder="Vui lòng nhập tên người dùng" maxlength="255"/>

	<label for="in-password">Mật khẩu: </label>
	<input type="password" name="in-password" id="in-password" placeholder="Nhập mật khẩu" maxlength="255"/>

	<label for="re-password">Xác nhận mật khẩu: </label>
	<input type="password" name="re-password" id="re-password" placeholder="Nhập lại mật khẩu" maxlength="255"/>
	
	<label for="in-number">Mã bảo vệ: </label>
	<span class="color-dark-gray color-border-dark-gray pad-7 color-text-white" id="out-number">0000</span>
	<input type="text" name="in-number" id="in-number" maxlength="4"/>
	
	<br />
	<input type="submit" id="in-submit" name="in-submit" class="button color-teal panel-round-xxl pad-15" value="Tạo tài khoản" />
</form>
