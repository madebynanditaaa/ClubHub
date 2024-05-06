<?php
declare (strict_types= 1);

function is_input_empty(string $title, string $details, string $eventdate, string $location): bool
{
    return empty($title) || empty($details) || empty($eventdate) || empty($location);
}


function insert_into_database(object $pdo, string $title, string $details, string $eventdate, string $location, int $clubid) : bool
{
    try {
        insert_details($pdo, $title, $details, $eventdate, $location, $clubid);
        return true; // Returns true if insertion is successful
    } catch (PDOException $e) 
    {
        echo $e->getMessage();
        return false; 
    }
}

function duplicate_title(object $pdo, string $title)
{
    if(is_duplicate_atitle($pdo, $title))
    {
        return true;
    }
    else
    {
        return false;
    }
}