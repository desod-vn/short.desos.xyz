/*-----
**@Set global var
**-Desod
**-22/08/2020
-----*/
	//vars in alert box
	const hideInfo = document.getElementById('hide');
	const alertInfo = document.getElementById('fly-alert');
	const userSubmit = document.getElementById('in-submit');
	const userClose = document.getElementById('fly-off');
	//var check information from user's input
	const checkEmail = document.getElementById('in-email');
	const checkName = document.getElementById('in-username');
	//Password
	const checkPass = document.getElementById('in-password');
	const checkRePass = document.getElementById('re-password');
	//Check code number
	const setNumber = document.getElementById('in-number');
	const getNumber = document.getElementById('out-number');

//Creat 4 random numbers
const codeNumber = () => {
	let randomNumber = '';
	for(let i = 0; i < 4; i++)
		randomNumber += Math.round(Math.random() * 9);
	getNumber.innerHTML = randomNumber;
}

//Close alert when click
const closeAlert = () => {
	hideInfo.style.display = 'none';
	hideInfo.style.overflow = 'auto';
};

//Check validate of user
const checkValid = () => {
	let totalFailt = 0;
//Check Number
	if(setNumber.value.length < 4){
		totalFailt++;
		alertInfo.innerHTML = 'Bạn vui lòng nhập 4 chữ số vào ô kiểm tra';
	}else if(setNumber.value != getNumber.innerHTML){
		totalFailt++;
		alertInfo.innerHTML = 'Mã số bạn nhập không chính xác';
	}	
//Check Pass
	if(checkPass.value == ''){
		totalFailt++;
		alertInfo.innerHTML = 'Bạn vui lòng nhập vào ô mật khẩu';
	}else if(checkRePass.value == ''){
		totalFailt++;
		alertInfo.innerHTML = 'Bạn vui lòng nhập vào ô xác nhận mật khẩu';
	}
	else if(checkPass.value != checkRePass.value){
		totalFailt++;
		alertInfo.innerHTML = 'Bạn vui lòng nhập 2 ô mật khẩu giống nhau';
	}
//Check Name
	if(checkName.value == ''){
		totalFailt++;
		alertInfo.innerHTML = 'Bạn vui lòng nhập tên người dùng đầy đủ';
	}
	else if(checkName.value.length < 6){
		totalFailt++;
		alertInfo.innerHTML = 'Bạn vui lòng nhập tên người dùng tổi thiểu 6 ký tự';
	}else{
		for(let i = 0; i < checkName.value.length; i++)
				if(((checkName.value.charCodeAt(i)) >= 97 && (checkName.value.charCodeAt(i) <= 122))
				||	((checkName.value.charCodeAt(i)) >= 65 && (checkName.value.charCodeAt(i) <= 90))
				||	((checkName.value.charCodeAt(i)) >= 48 && (checkName.value.charCodeAt(i) <= 57))
				|| 	(checkName.value.charCodeAt(i)) == 45 || (checkName.value.charCodeAt(i) == 95))
				{}else{
					totalFailt++;
					alertInfo.innerHTML = `Username không hợp lệ vui lòng nhập lại<br />
					Bao gồm chữ thường, chữ hoa, số, dấu "-" và dấu "_"`;
				}
	}	
//Check Email
	if(checkEmail.value == ''){
		totalFailt++;
		alertInfo.innerHTML = 'Bạn vui lòng nhập email đầy đủ';
	}else{
		let missWhat = 0;
		for(let i = 0; i < checkEmail.value.length; i++){
			if(checkEmail.value[i] == ' '){
				missWhat = 1;
				break;
			}
			if(checkEmail.value[i] == '@'){
				missWhat = 2;
				for(let j = i + 1; j < checkEmail.value.length; j++)
					if(checkEmail.value[j] == '.')
						missWhat = 10;
				if((checkEmail.value[i - 1] == '') || (checkEmail.value[i - 1] == '.') || i == 0)
					missWhat = 3;
				if(checkEmail.value[i + 1] == '.')
					missWhat = 4;
				
			}
		}
		if(checkEmail.value[checkEmail.value.length - 1] == '@')
			missWhat = 5;
		if(checkEmail.value[checkEmail.value.length - 1] == '.')
			missWhat = 6;


		switch(missWhat){
			case 0:
				alertInfo.innerHTML = 'Vui lòng nhập lại. Thiếu dấu "@" trong địa chỉ email của bạn';
				break;
			case 1:
				alertInfo.innerHTML = 'Vui lòng nhập lại. Địa chỉ email của bạn xuất hiện dấu cách';
				break;
			case 2:
				alertInfo.innerHTML = 'Vui lòng nhập lại. Thiếu dấu "." trong địa chỉ email của bạn';
				break;
			case 3:
				alertInfo.innerHTML = 'Vui lòng kiểm tra lại phần trước dấu "@" trong địa chỉ email của bạn';
				break;
			case 4:
				alertInfo.innerHTML = 'Vui lòng kiểm tra lại phần trước dấu "." trong địa chỉ email của bạn';
				break;
			case 5:
				alertInfo.innerHTML = 'Vui lòng kiểm tra lại phần sau dấu "@" trong địa chỉ email của bạn';
				break;
			case 6:
				alertInfo.innerHTML = 'Vui lòng kiểm tra lại phần sau dấu "." trong địa chỉ email của bạn';
				break;
		}
		if(missWhat != 10)	totalFailt++;
	}

	if(totalFailt != 0)	hideInfo.style.display = 'block';
}


codeNumber();

userSubmit.addEventListener('mousedown', checkValid);
userClose.addEventListener('click', closeAlert);
