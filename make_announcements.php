<?php 
require_once 'includes/config_session.inc.php';
require_once 'includes/make_announcement_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles/make_announcement.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make an Announcement in Announcements Tab</title>
</head>

<body>
    <h1>Make An Announcement!</h1>

    <form id="announcement-form" action="includes/make_announcement.inc.php" method="post">
        <label for="Title">Event Title</label>
        <br>
        <input required type="text" name="Title" id="Title" placeholder="Title">
        <br><br>
        
        <label for="Details">Details of event</label>
        <br>
        <input required type="text" name="Details" id="Details" placeholder="Details">
        <br><br>

        <label for="EventDate">Date of Event</label>
        <br>
        <input required type="date" name="EventDate" id="EventDate" placeholder="EventDate">
        <br><br>

        <label for="Location">Location of Event</label>
        <br>
        <input required type="text" name="Location" id="Location" placeholder="Location">
        <br><br>

        <button type="submit" class="button make" onclick="window.location.href=`includes/make_announcements.inc.php?club_id=${clubID}`;">POST</button>
    </form>

    <?php
    // Check for errors and success messages
    require_once 'includes/make_announcement_view.inc.php';
    check_error();
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('announcement-form');
            
            // Function to get query parameter value
            function getQueryParam(param) {
                const urlParams = new URLSearchParams(window.location.search);
                return urlParams.get(param);
            }

            // Retrieve club_id from URL
            const clubID = getQueryParam('club_id');
            
            // Before form submission, add club_id as a hidden input if it exists
            form.addEventListener('submit', function(event) {
                if (clubID) {
                    // Create a hidden input element
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'club_id';
                    hiddenInput.value = clubID;

                    // Append the hidden input element to the form
                    form.appendChild(hiddenInput);
                } else {
                    console.error('club_id parameter is missing in the URL.');
                }
            });
        });
    </script>
</body>
</html>