<!DOCTYPE HTML>
<html>
    <head>
        <title>Show Announcement</title>
        <link rel="stylesheet" href="styles/clubmembers1.css">
    </head>
    <body>
        <h1>ANNOUNCEMENTS</h1>
        <table>
            <tr>
                <th>Sr. No.</th>
                <th>Title</th>
                <th>Details</th>
                <th>Date</th>
                <th>Location</th>
                <th>Posted On</th>
                <th>Organized by</th>
            </tr>
        <?php
        // Establishing database connection
        $conn = new mysqli("localhost", "root", "", "clubs");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Modified SQL query to join announcements and clubs tables and fetch club name
        $sql = "SELECT a.AID, a.ATitle, a.ADetails, 
                DATE_FORMAT(a.dateofoccurence, '%D %M %Y') AS dateofoccurence, 
                a.ALocation, DATE_FORMAT(a.date_posted, '%D %M %Y') AS date_posted, 
                c.ClubName
                FROM announcements a
                JOIN clubs c ON a.Club_ID = c.Club_ID;";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . htmlspecialchars($row["AID"]) . "</td><td>" . htmlspecialchars($row["ATitle"]) . "</td><td>" . htmlspecialchars($row["ADetails"]) . "</td><td>" . htmlspecialchars($row["dateofoccurence"]) . "</td><td>" . htmlspecialchars($row["ALocation"]) . "</td><td>" . htmlspecialchars($row["date_posted"]) . "</td><td>" . htmlspecialchars($row["ClubName"]) . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No results found</td></tr>";
        }

        // Closing database connection
        $conn->close();
        ?>
        </table>
    </body>
</html>
