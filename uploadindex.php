<?php
    require_once 'includes/config_session.inc.php';
    require_once 'includes/signup_view.inc.php';
    require_once 'includes/login_view.inc.php';
    
?>

<DOCTYPE html>
<html lang="en">
<head>

</head>

<body>
    <form action="upload.php" method = "POST" enctype = "multipart/form-data">
        <input type = "file" name = "file">
        <button type = "submit" name = "submit">Upload</button>
</body>
</html>