<?php
if(($_SERVER['REQUEST_METHOD']) == 'POST'){
    $title = $_POST["Title"];
    $details = $_POST["Details"];
    $eventdate = $_POST["EventDate"];
    $location = $_POST["Location"];
    $clubid = $_POST["clubid"];
    $errors = [];

    try{
        require_once 'dbh.inc.php';
        require_once 'make_announcement_model.inc.php';
        require_once 'make_announcement_contr.inc.php';

        //error handlers
        if(is_input_empty($title, $details, $eventdate, $location, $clubid))
        {
            $errors["empty_input"] = "Fill in all fields!!";
        }

        if(duplicate_title($pdo, $title))
        {
            $errors["title_duplicate"] = "There is already an entry with this title. Please choose another title.";
        }

        require_once 'config_session.inc.php'; //this is a safer way to start a session.(just linking a the required file here.)
        if($errors)
        {
        header("Location: ../make_announcements.php");
        $_SESSION["errorss"] = $errors;
        die();
        }
        else
        {
        insert_into_database($pdo, $title, $details, $eventdate, $location, $clubid);
        header("Location: ../make_announcements.php?posting=success");
        $pdo = null;
        $stmt = null;
        die();
        }
    }

    catch(PDOException $e)
    {
        die("Query failed: " . $e->getMessage());
    }
}
else
{
    header("Location: ../make_announcements.php");
    die();
}