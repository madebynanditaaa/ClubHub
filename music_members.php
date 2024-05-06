<!DOCTYPE HTML>
<html>
<head>
    <title>Display Members</title>
    <link rel="stylesheet" href="styles/clubmember.css">
</head>
<body>
    <table>
        <tr>
            <th>Username</th>
            <th>Position</th>
            <th>Club Name</th>
        </tr>
        <?php
        require_once 'includes/dbh.inc.php';  // Database connection

        // Retrieve club_id from URL and validate it
        $club_id = isset($_GET['club_id']) ? (int)$_GET['club_id'] : 0;

        if ($club_id <= 0) {
            echo "<tr><td colspan='3'>Invalid club_id</td></tr>";
            return;
        }

        // Function to get the club name from the database
        function get_clubname(PDO $pdo, int $club_id): ?string {
            $query = "SELECT clubname FROM clubs WHERE club_id = :club_id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':club_id', $club_id, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['clubname'] ?? null;  // Use null coalescing operator
        }

        // Retrieve the club name using the club_id
        $clubName = get_clubname($pdo, $club_id);

        if (!$clubName) {
            echo "<tr><td colspan='3'>Club not found</td></tr>";
            return;
        }

        // Prepare and execute the SQL query
        $sql = 'SELECT u.username, cm.position, c.clubname FROM users u
                JOIN clubmembers cm ON u.User_ID = cm.User_ID
                JOIN clubs c ON c.Club_ID = cm.Club_ID
                WHERE c.clubname = :clubname';

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':clubname', $clubName, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Display the results
        if (!empty($result)) {
            foreach ($result as $row) {
                echo "<tr><td>" . htmlspecialchars($row['username']) . "</td><td>" . htmlspecialchars($row['position']) . "</td><td>" . htmlspecialchars($row['clubname']) . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No results found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
