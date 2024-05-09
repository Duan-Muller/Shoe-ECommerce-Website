function updateNavbar(){
    let userFirstName = document?.cookie?.split(';').find(row => row.startsWith("firstname="))?.split('=')[1];
    debugger;
    console.log(userFirstName)
    if (userFirstName !== null && userFirstName !== undefined) {
        document.getElementById('register-link').innerHTML = 'Welcome ' + userFirstName;
        document.getElementById('register-link').setAttribute('href', 'profile.php');
    } else {
        document.getElementById('register-link').innerHTML = 'Register';
        document.getElementById('register-link').setAttribute('href', 'register.php');
    }

    return <div> Hello </div>
}

window.onload = updateNavbar;