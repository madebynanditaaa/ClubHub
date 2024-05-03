<!DOCTYPE HTML>
<html>

    <head>
        <title>dissplayy</title>
        <link rel="stylesheet" href="table_styles.css">
    </head>

    <body>
    <table>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>E-mail</th>
    <tr>
    <?php
    $conn = mysqli_connect("localhost","root", "", "clubs");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "SELECT user_id,username,email from users";
    $result = $conn->query($sql);
    if($result-> num_rows>0)
    {
        while($row = $result->fetch_assoc())
        {
            echo "<tr><td>" . $row["user_id"] . "   </td><td>\t" . $row["username"] . " </td><td>" . $row["email"] . "  </td></tr>";
        }
        echo "</table>";
    }
    else{
        echo "0 result";
    }

    $conn->close();

    ?>
    </table>
    
</body>
</html>