<?php
declare (strict_types= 1);

function insert_details(object $pdo, string $title, string $details, string $eventdate, string $locationn, int $clubid)
{
    $query = "INSERT INTO announcements (ATitle, ALocation, ADetails, dateofoccurence, Club_ID)VALUES(:title, :locationn, :details, :eventdate, :clubid);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":locationn", $locationn);
    $stmt->bindParam(":details", $details);
    $stmt->bindParam(":eventdate", $eventdate);
    $stmt->bindParam(":clubid", $clubid);
    $stmt->execute();
    return $stmt->execute();
}
function is_duplicate_atitle(object $pdo, string $title): bool
{
    $query = "SELECT COUNT(*) FROM announcements WHERE ATitle = :title";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    return $count > 0;//true if >0; that means duplicate exists.
}