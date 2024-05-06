<?php
    require_once 'includes/config_session.inc.php';
    require_once 'includes/signup_view.inc.php';
    require_once 'includes/login_view.inc.php';   
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
    <link rel="stylesheet" href="styles/loginsignup.css">
    <link rel="stylesheet" href="styles/inputsuccess.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
    <h1>Login</h1>
        <form action="includes/login.inc.php" method="post" id="form">
            <input required type="text" name="username" id="username" placeholder="Username">
            <br><br>
            <input required type="text" name="pwd" placeholder="Password">
            <br><br>
            <button class="login">Login</button>
        </form>
        <script>
    const form = document.getElementById('form');
    const username = document.getElementById('username');
    form.addEventListener('submit', function(e){
    const userNameValue = username.value;
    localStorage.setItem('user-name', userNameValue);
    window.location.href = "includes/login.inc.php";
})
</script>

<?php
    check_login_error();
?>

    <h1>Signup</h1>
        <form action="includes/signup.inc.php" method="post">
            <input required type="text" name="username" placeholder="Username">
            <br><br>
            <input required type="text" name="pwd" placeholder="Password">
            <br><br>
            <input required type="text" name="email" placeholder="E-mail">
            <br><br>
            <button class="signup">Signup</button>
        </form>

<?php
    check_signup_error();
?>
    </body>
</html>