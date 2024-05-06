<!DOCTYPE HTML>
<html>
<head>
    <title>Show Specific Club Announcements</title>
    <link rel="stylesheet" href="styles/make_announcements.css">
</head>
<body>
    <h1>ANNOUNCEMENTS</h1>
    <table>
        <tr>
            <th>Sr. No.</th>
            <th>Title</td>
            <th>Details</th>
            <th>Date</th>
            <th>Location</th>
            <th>Posted On</th>
            <th>Organized by</th>
        </tr>
        <?php
        // Include database connection
        require_once 'includes/dbh.inc.php';

        // Retrieve club_id from URL and validate it
        $club_id = isset($_GET['club_id']) ? (int)$_GET['club_id'] : 0;

        if ($club_id <= 0) {
            echo "<tr><td colspan='7'>Invalid club_id</td></tr>";
        } else {
            // Prepare a statement to fetch announcements
            $stmt = $pdo->prepare("
                SELECT a.AID, a.ATitle, a.ADetails,
                       DATE_FORMAT(a.dateofoccurence, '%D %M %Y') AS dateofoccurence,
                       a.ALocation, DATE_FORMAT(a.date_posted, '%D %M %Y') AS date_posted,
                       c.ClubName
                FROM announcements a
                JOIN clubs c ON a.Club_ID = c.Club_ID
                WHERE a.Club_ID = :club_id
            ");
            
            // Bind the club_id parameter
            $stmt->bindParam(':club_id', $club_id, PDO::PARAM_INT);

            // Execute the query
            $stmt->execute();

            // Fetch all results
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Check if there are any results
            if (count($results) > 0) {
                // Iterate through the results
                foreach ($results as $row) {
                    echo "<tr><td>" . htmlspecialchars($row["AID"]) . "</td><td>" . htmlspecialchars($row["ATitle"]) . "</td><td>" . htmlspecialchars($row["ADetails"]) . "</td><td>" . htmlspecialchars($row["dateofoccurence"]) . "</td><td>" . htmlspecialchars($row["ALocation"]) . "</td><td>" . htmlspecialchars($row["date_posted"]) . "</td><td>" . htmlspecialchars($row["ClubName"]) . "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No results found</td></tr>";
            }
            
            // Close the statement
            $stmt = null;
        }
        ?>
    </table>
</body>
</html>
