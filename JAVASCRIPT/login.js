function toggleForm(formId) {
    const loginTab = document.getElementById('loginTab');
    const signupTab = document.getElementById('signupTab');
    const loginForm = document.getElementById('loginForm');
    const signupForm = document.getElementById('signupForm');

    if (formId === 'loginForm') {
        loginTab.classList.add('active');
        signupTab.classList.remove('active');
        loginForm.style.display = 'block';
        signupForm.style.display = 'none';
    } else if (formId === 'signupForm') {
        loginTab.classList.remove('active');
        signupTab.classList.add('active');
        loginForm.style.display = 'none';
        signupForm.style.display = 'block';
    }
}

function validateLogin() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    if (username.trim() === '' || password.trim() === '') {
        alert('Please enter both username and password.');
        return false;
    }

    // Add any additional login validation logic here

    return true;
}

function validateSignup() {
    const firstName = document.getElementById('firstName').value;
    const lastName = document.getElementById('lastName').value;
    const email = document.getElementById('email').value;
    const newPassword = document.getElementById('newPassword').value;

    if (firstName.trim() === '' || lastName.trim() === '' || email.trim() === '' || newPassword.trim() === '') {
        alert('Please fill out all required fields.');
        return false;
    }

    // Add any additional signup validation logic here

    return true;
}
