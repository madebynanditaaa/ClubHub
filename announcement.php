<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/announcement.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcement</title>
</head>

<body>
    <div>
        <br>
        <script>
            function getQueryParam(param) {
                const urlParams = new URLSearchParams(window.location.search);
                return urlParams.get(param);
            }
            
            // Retrieve the club_id from the URL
            const clubID = getQueryParam('club_id');
            
            if (clubID) {
                // Set the buttons' hrefs to include the club_id parameter
                document.querySelector('.button.make').href = `make_announcements.php?club_id=${clubID}`;
                document.querySelector('.button.show').href = `show_1club_announcement.php?club_id=${clubID}`;
            }
            console.log('Club ID:', clubID);

        </script>
        
        <button class="button make" onclick="window.location.href=`make_announcements.php?club_id=${clubID}`;">Make an Announcement</button>
        <br>
        <button class="button show" onclick="window.location.href=`show_1club_announcements.php?club_id=${clubID}`;">Show Announcements</button>
    </div>
</body>
</html>
