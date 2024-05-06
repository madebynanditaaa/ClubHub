<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/clubhomepage.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <div class="button announcement">
            <p>Announcements</p>
        </div>
        <br>
        <div class="button members">
            <p>Members</p>
        </div>
        <br>
        <div class="button addmember">
            <p>Add member</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to get query parameter value
            function getQueryParam(param) {
                const urlParams = new URLSearchParams(window.location.search);
                return urlParams.get(param);
            }

            // Retrieve club_id from URL
            const clubID = getQueryParam('club_id');
            
            // Check if clubID exists
            if (clubID === null) {
                console.error('club_id parameter is missing in the URL.');
                return;
            }

            // Retrieve buttons
            const announcementButton = document.querySelector('.announcement');
            const membersButton = document.querySelector('.members');
            const addMemberButton = document.querySelector('.addmember');

            // Set up event listeners for each button
            announcementButton.addEventListener('click', function() {
                window.location.href = `announcement.php?club_id=${clubID}`;
            });

            membersButton.addEventListener('click', function() {
                window.location.href = `music_members.php?club_id=${clubID}`;
            });

            addMemberButton.addEventListener('click', function() {
                window.location.href = `addmember.php?club_id=${clubID}`;
            });
        });
    </script>
</body>

</html>
