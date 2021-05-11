document.addEventListener("DOMContentLoaded", function (ev) {
    const commentForm = document.getElementById('comment__form');
    const name = commentForm.querySelector("input[name='name']");
    const email = commentForm.querySelector("input[name='email']");
    const comment = commentForm.querySelector("input[name='comment']");
    const errorElement = document.getElementById('error');
    const successElement = document.getElementById('success');

    commentForm.addEventListener('submit', function (ev) {
        ev.preventDefault();
        let errors = [];
        if (name.value === '' || name.value == null) {
            errors.push('Fill in name');
        }
        if (email.value === '' || email.value == null) {
            errors.push('Fill in email');
        }
        if (comment.value === '' || comment.value == null) {
            errors.push('Fill in comment');
        }
        if(errors.length > 0) {
            errorElement.innerText = errors.join(', ');
            errorElement.classList.add('active');
            if (successElement.classList.contains('active')) {
                successElement.classList.remove('active');
            }
            return;
        }

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    console.log('RESPONSE ', this.responseText.success);
                    commentForm.reset();
                    successElement.classList.add('active');
                    if (errorElement.classList.contains('active')) {
                        errorElement.classList.remove('active');
                    }
                    successElement.innerText = 'Success';
                } else {
                    console.log('Failed async call');
                }
            }
        };
        xmlhttp.open("POST", `?action=addComment&name=${name.value}&email=${email.value}&content=${comment.value}`, true);
        xmlhttp.send();
    });


    const loginForm = document.getElementById('login__form');
    const username = loginForm.querySelector("input[name='username']");
    const password = loginForm.querySelector("input[name='password']");
    const loginErrorElement = document.getElementById('login__error');
    const loginSuccessElement = document.getElementById('login__success');

    loginForm.addEventListener('submit', function (ev) {
        ev.preventDefault();
        let errors = [];
        if (username.value === '' || username.value == null) {
            errors.push('Fill in username');
        }
        if (password.value === '' || password.value == null) {
            errors.push('Fill in password');
        }

        if(errors.length > 0) {
            loginErrorElement.innerText = errors.join(', ');
            loginErrorElement.classList.add('active');
            if (loginSuccessElement.classList.contains('active')) {
                loginSuccessElement.classList.remove('active');
            }
            return;
        }

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    console.log('RESPONSE ', this.responseText.success);
                    loginForm.reset();
                    loginSuccessElement.classList.add('active');
                    if (loginErrorElement.classList.contains('active')) {
                        loginErrorElement.classList.remove('active');
                    }
                    loginSuccessElement.innerText = 'Success';
                } else {
                    console.log('Failed async call');
                }
            }
        };
        xmlhttp.open("POST", `?action=login&name=${username.value}&password=${password.value}`, true);
        xmlhttp.send();
    });

});