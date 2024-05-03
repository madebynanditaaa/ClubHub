<!DOCTYPE HTML>
<html>

    <head>
        <title>Show Announcement</title>
        <link rel="stylesheet" href="table_styles.css">
    </head>

    <body>
    <table>
    <tr>
        <th>Sr. No.</th>
        <th>Title</th>
        <th>Details</th>
        <th>Date</th>
        <th>Location</th>
        <th>Posted On</th>
        <th>Organized by</th>
    <tr>
    <?php
    
    $conn = mysqli_connect("localhost","root", "", "clubs");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT AID, ATitle, ADetails, DATE_FORMAT(dateofoccurence, '%D %M %Y') AS dateofoccurence, ALocation, DATE_FORMAT(date_posted, '%D %M %Y') AS date_posted, Club_ID FROM announcements;";
    
    $result = $conn->query($sql);
    if($result-> num_rows>0)
    {
        while($row = $result->fetch_assoc())
        {
            echo "<tr><td>" . htmlspecialchars($row["AID"]) . "</td><td>" . htmlspecialchars($row["ATitle"]) . "</td><td>" . htmlspecialchars($row["ADetails"]) . "</td><td>" . htmlspecialchars($row["dateofoccurence"]) . "</td><td>" . htmlspecialchars($row["ALocation"]) . "</td><td>" . htmlspecialchars($row["date_posted"]) . "</td><td>" . htmlspecialchars($row["Club_ID"]) . "</td></tr>";
        }
    }
    else
    {
        echo "<tr><td colspan='7'>0 results</td></tr>";
    }

    echo  "</table>";
    $conn->close();
    ?>
    
</body>
</html>


