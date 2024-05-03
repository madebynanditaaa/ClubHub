<?php

if(($_SERVER['REQUEST_METHOD']) == 'POST'){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    try{
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';
        //error handlers
        $errors = [];
        if(is_input_empty($username, $pwd))
        {
            $errors["empty_input"] = "<p class = 'error-container'>" . "Fill in all fields!!" . "</p>";
        }

        $result = get_user($pdo,$username);

        if(is_username_wrong($result))
        {
            $errors["username_incorrect"] = '<p class = "error-container">' . 'Incorrect Login Info!' . '</p>';
        }

        if(!is_username_wrong($result) && is_password_wrong($pwd, $result['pwd']))
        {
            $errors["login_incorrect"] = '<p class = "error-container">' . 'Incorrect password!' . '</p>';
        }

        require_once 'config_session.inc.php'; //this is a safer way to start a session.(just linking a the required file here.)
       
        if($errors)
        {
           $_SESSION["errors_login"] = $errors;
           header("Location: ../index.php");
           die();
        }    
        $newSessionID = session_create_id(); //this will create an entirely new id instead of regenerating the previous id......which regenerate function does.
        $sessionID = $newSessionID . '_' . $result["id"];
        session_id($sessionID);
    
        $_SESSION['user_id'] = $result["id"];
        $_SESSION['user_username'] = htmlspecialchars($result["username"]);

        $_SESSION["last_regeneration"] = time();
        header("Location: ../dashboard.php?login=success");
        $pdo = null;
        $statement = null;
        die();
    }

    catch(PDOException $e)
    {
        die("Query failed: " . $e->getMessage());
    }
}
else
{
    header("Location: ../index.php");
    die();
}