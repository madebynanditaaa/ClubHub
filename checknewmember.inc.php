<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from POST request
    $username = $_POST["username"];
    $position = $_POST["position"];
    $errors = [];
    try {
        require_once 'dbh.inc.php';
        require_once 'checknewmember_model.inc.php';
        require_once 'checknewmember_contr.inc.php';

        // Validate inputs
        if (is_input_empty($username, $position)) {
            $errors['empty_input'] = "Fill in all fields!";
        }

        if(user_invalid($pdo, $username))
        {
            $_SESSION["errors_addmember"] = ["ERROR. Invalid Username. This user does not exist."];
            echo "<p class='error-container'>" . htmlspecialchars($_SESSION["errors_addmember"][0]) . "</p>";
            exit();
        }

        // Checking for invalid positions
        $allowed_positions = ['Head', 'Co-head', 'Member'];
        if (!in_array($position, $allowed_positions))
        {
            $errors['invalid_position'] = "Invalid position value!";
        }
  
        if(duplicate_found_incm($pdo, $username, $position))//checks if member is already a part of that club.
        {
            $errors['username_already_member'] = "A member with the specified user name and club already exists.";
        }

       
        require_once 'config_session.inc.php';
        if($errors)
        {
            $_SESSION["errors_addmember"] = $errors;
            header("Location: ../addmember.php");
            exit; 
        }   
        else
        {
        process_user_data($pdo, $username, $position);//inserts data into clubmembers.
        header("Location: ../addmember.php?newmember=success");
        $pdo = null;
        $stmt = null;
        exit;
        }
    }        
    catch (PDOException $e) {
        require_once 'config_session.inc.php';
        $_SESSION['errors_addmember'] = ["Query failed: ".htmlspecialchars($e->getMessage())];
        echo "<br>";
        header("Location: ../addmember.php");            
    
    }
} 
else {
    header("Location: ../dashboard.php");
    exit;
}
