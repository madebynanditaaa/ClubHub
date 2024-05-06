<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles/clubdashboard.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <div class="music card" data-value="1" onclick="window.location.href = `club_dashboard.php?club_id=${this.dataset.value}`;">
            <h3>Music Club</h3>
            <p>Explore melodies!</p>
        </div>

        <div class="dance card" data-value="2" onclick="window.location.href = `club_dashboard.php?club_id=${this.dataset.value}`;">
            <h3>Dance Club</h3>
            <p>Move with rhythm!</p>
        </div>

        <div class="drama card" data-value="3" onclick="window.location.href = `club_dashboard.php?club_id=${this.dataset.value}`;">
            <h3>Drama Club</h3>
            <p>Express your art!</p>
        </div>

        <div class="varsity card" data-value="4" onclick="window.location.href = `club_dashboard.php?club_id=${this.dataset.value}`;">
            <h3>Varsity Club</h3>
            <p>Share and Care:)</p>
        </div>

        <div class="ted card" data-value="5" onclick="window.location.href = `club_dashboard.php?club_id=${this.dataset.value}`;">
            <h3>TED Club</h3>
            <p>Share great ideas!</p>
        </div>

        <div class="epic card" data-value="6" onclick="window.location.href = `club_dashboard.php?club_id=${this.dataset.value}`;">
            <h3>EPIC Club</h3>
            <p>Plan big events!</p>
        </div>

        <div class="announcements card" onclick="window.location.href = 'show_announcement.php';">
            <h3>Show Announcements</h3>
            <p>See latest announcements made by all clubs!</p>
        </div>
    </div>
</body>
</html>

