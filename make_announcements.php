<?php 
require_once 'includes/config_session.inc.php';
require_once 'includes/make_announcement_view.inc.php';
?>
    
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="announcement.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make an Announcement in Announcements Tab</title>
</head>

<body>
    <h1>Make An Announcement!</h1>

    <form action="includes/make_announcement.inc.php" method="post">

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

        <label for="clubid">Club Name</label>
        <br>
        <select required type=int name="clubid" id="clubid">
            <option value="">-- Select Club --</option>
            <option value=1>Music Club</option>
            <option value=2>Dance Club</option>
            <option value=3>Drama Club</option>
            <option value=4>Varsity Club</option>
            <option value=5>TED Club</option>    
        </select>
        <br><br>
        <button type="submit">Post</button>
    </form>
<?php
check_error();
?>
</body>
</html>
