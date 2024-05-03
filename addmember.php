<?php 
require_once 'includes/config_session.inc.php';
require_once 'includes/checknewmember_view.inc.php';
?>
    
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="inputsuccess.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Member in Clubmembers</title>
</head>

<body>
    <h1>Add New Member</h1>

    <form action="includes/checknewmember.inc.php" method="post">
        <label for="username">Username:</label>
        <input required type="text" name="username" id="username" placeholder="Username">
        <br><br>

        <label for="position">Position:</label>
        <select required name="position" id="position">
            <option value="">-- Select Position --</option>
            <option value="Head">Head</option>
            <option value="Co-head">Co-head</option>
            <option value="Member">Member</option>
        </select>
        <br><br>
        <button type="submit">Add member</button>
    </form>
<?php 
check_addmember_errors();
?>
</body>
</html>
