function redirectToLogin(userType) {
    if (userType === 'doctor') {
        window.location.href = 'doctor-login.html'; 
    } else if (userType === 'chef') {
        window.location.href = 'chef-login.html'; 
    } else if (userType === 'user') {
        window.location.href = 'user-login.html'; 
    }
}