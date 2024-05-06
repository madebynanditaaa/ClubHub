<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST["Title"];
    $details = $_POST["Details"];
    $eventdate = $_POST["EventDate"];
    $location = $_POST["Location"];
    
    // Retrieve club_id from POST data
    $club_id = isset($_POST['club_id']) ? (int)$_POST['club_id'] : null;

    // Check if club_id is valid
    if ($club_id === null) {
        die("Error: club_id is missing or invalid.");
    }
    
    $errors = [];

    try {
        require_once 'dbh.inc.php';
        require_once 'make_announcement_model.inc.php';
        require_once 'make_announcement_contr.inc.php';

        // Error handling
        if (is_input_empty($title, $details, $eventdate, $location, $club_id)) {
            $errors["empty_input"] = "Fill in all fields!!";
        }

        if (duplicate_title($pdo, $title)) {
            $errors["title_duplicate"] = "There is already an entry with this title. Please choose another title.";
        }

        require_once 'config_session.inc.php';
        if ($errors) {
            // Store errors in session and redirect back to form
            $_SESSION["errorss"] = $errors;
            header("Location: ../make_announcements.php?club_id=" . $club_id);
            die();
        } else {
            // Call insert_into_database with the provided parameters, including the integer club_id
            insert_into_database($pdo, $title, $details, $eventdate, $location, $club_id);
            
            // Redirect to make_announcements.php with success message and club_id as a query parameter
            header("Location: ../make_announcements.php?posting=success&club_id=" . $club_id);
            die();
        }
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    // If not a POST request, redirect back to make_announcements.php with club_id
    $club_id = isset($_GET['club_id']) ? (int)$_GET['club_id'] : null;
    header("Location: ../make_announcements.php?club_id=" . $club_id);
    die();
}
