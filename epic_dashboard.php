<!DOCTYPE HTML>
<html>

    <head>
        <title>Display</title>
        <link rel="stylesheet" href="table_styles.css">
    </head>

    <body>
    <table>
    <tr>
        <th>Username</th>
        <th>Position</th>
        <th>Club Name</th>
    <tr>
    <?php
    $conn = mysqli_connect("localhost","root", "", "clubs");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = 'SELECT u.username, cm.position, c.clubname from users u
    join clubmembers cm on u.User_id=cm.User_ID
    join clubs c on c.Club_ID=cm.Club_ID
    where c.clubname="Epic Club";';
    
    $result = $conn->query($sql);
    if($result-> num_rows>0)
    {
        while($row = $result->fetch_assoc())
        {
            echo "<tr><td>" . htmlspecialchars($row["username"]) . "</td><td>" . htmlspecialchars($row["position"]) . "</td><td>" . htmlspecialchars($row["clubname"]) . "  </td></tr>";
        }
    }
    else
    {
        echo "<tr><td colspan='3'>0 results</td></tr>";
    }

    echo  "</table>";
    $conn->close();
    ?>
    
</body>
</html>