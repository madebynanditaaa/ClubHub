<?php
declare(strict_types= 1);
function check_addmember_errors() {
    if (isset($_SESSION['errors_addmember']))
    {
        $errors = $_SESSION['errors_addmember'];
        echo "<br>";
        foreach ($errors as $error)
        {
            echo "<p class='error-container'>" . htmlspecialchars($error) . "</p>";
        }
        unset($_SESSION['errors_addmember']);
    }

    else if (isset($_GET["newmember"]) && $_GET["newmember"] === "success") {
        echo '<br>';
        echo '<p class="form-success">Member added successfully!</p>';
    }

    else if (isset($_GET["newmember"]) && $_GET["newmember"] === "added") {
        echo '<br>';
        echo '<p class="form-success">This member is already present in the club!</p>';
    }
    else if (isset($_GET["newmember"]) && $_GET["newmember"] === "updated") {
        echo '<br>';
        echo '<p class="form-success">Member Position updated in club!</p>';
    }
}

//delete member
//announcements: update/add/delete