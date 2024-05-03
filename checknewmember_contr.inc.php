<?php
declare (strict_types= 1);
function is_input_empty(String $username, String $position)
{
    if(empty($username) || empty($position))
    {
        return true;
    }
    else
    {
        return false;
    }
}
function invalid_username(object $pdo, string $username)
{
    if(!get_user($pdo, $username))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function process_user_data(object $pdo, string $username, string $position): ?array 
{
    // Initialize an array to store result
    $result = [];
    
    // gets the user_id by using the username.
    $user_id = get_user_id($pdo, $username);
    
    if ($user_id !== null) {
        // Define the club ID (replace 1 with the actual club ID you want to use)
        $club_id = 1;  // Replace this with the appropriate club ID
        /*
        if (duplicate_found($pdo, $user_id, $position))
        {
            header("Location: ../addmember.php?newmember=added");
            //$query = update_user($pdo, $user_id, $club_id, $position);
            return null;
        }
        */
        // Insert the user into the club members table
       // else{
            $query = insert_user($pdo, $user_id, $club_id, $position);
        //}
        if ($query) {
            $result = [
                'id' => $user_id,
                'username' => $username,
                'position' => $position
            ];
        }
    }   
return $result;
}

function duplicate_found_incm(object $pdo, string $username, string $position)
{
    $user_id = get_user_id($pdo, $username);
    if (duplicate_found($pdo, $user_id, $position))
        {
        header("Location: ../addmember.php?newmember=added");
        return true;
    }
    else
    {
        return false;
    }
}

function user_invalid(object $pdo, string $username)
{
    if(!get_user($pdo, $username))
    {
        return true;
    }
    else
    {
        return false;
    }
}