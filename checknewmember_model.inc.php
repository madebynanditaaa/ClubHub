<?php
declare (strict_types= 1);
function get_user(object $pdo, string $username): bool
{
    $query = "SELECT COUNT(*) as count FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['count'] > 0; //if count is 0 means no user found. //and it returns false  //if count is 1 means user is found. //it returns true
}

function get_user_id(object $pdo, string $username): ?int
{
    $query = "SELECT user_id FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // Return the user ID if it exists, otherwise return null
    return $result ? (int) $result['user_id'] : null;
}

function get_username($pdo, $user_id)//returns the username taking user_id as input
{
    $query = "SELECT username FROM users WHERE user_id = :user_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // Return the username if it exists, otherwise return null
    return $result ? (string) $result['username'] : null;
}

function insert_user(object $pdo, int $user_id, int $club_id, string $position): bool
{
    $query = "INSERT INTO clubmembers (user_id, club_id, position) VALUES (:user_id, :club_id, :position);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':club_id', $club_id);
    $stmt->bindParam(':position', $position);
    $result = $stmt->execute();
    return $result;
}

function duplicate_found(object $pdo, int $user_id, string $position)// check if user is already a part of that club
{
    $query = "SELECT COUNT(c.user_id) as co FROM clubmembers c where user_id = :user_id and c.position = :position;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':position', $position);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['co'] > 0;
    //if count is 0 means no user found. //and it returns false
    //if count is 1 means user is found. //it returns true
}

function update_user(object $pdo, int $user_id, int $club_id, string $position)
{
    $query = "UPDATE clubmembers SET position = :position WHERE user_id=:user_id and club_id = :club_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':club_id', $club_id);
    $stmt->bindParam(':position', $position);
    $result = $stmt->execute();
    return $result;
}