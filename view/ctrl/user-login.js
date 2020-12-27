const user = document.getElementById('lg-username');
const pass = document.getElementById('lg-password');
const remember = document.getElementById('lg-remember');
const login = document.getElementById('login');

const checkStore = () => {
    if(localStorage.getItem('user')){
        user.value = localStorage.getItem('user');
        pass.value = localStorage.getItem('pass');
    }
    else{
        localStorage.setItem('user', '');
        localStorage.setItem('pass', '');
    }
}
const warning_missing = empty => {
    const warning = document.getElementById('hide');
      warning.setAttribute('class', 'color-blue color-text-sand text-left panel-round-l mar-5 pad-10 size-text-20');
      warning.innerHTML = 'Xin lỗi !!! Bạn vui lòng nhập ' + empty;
    login.type = 'button';
}
const checkUser = () => {
    if(user.value == '')
            warning_missing('tên người dùng');
    else if(pass.value == '')
            warning_missing('mật khẩu');

    if(remember.checked == true){
        localStorage.setItem('user', user.value);
        localStorage.setItem('pass', pass.value);
    }else{
        localStorage.setItem('user', '');
        localStorage.setItem('pass', '');
    }

    if((user.value != '') && (pass.value != ''))
        login.type = 'submit';
}

checkStore();

login.addEventListener('mousedown', checkUser);
