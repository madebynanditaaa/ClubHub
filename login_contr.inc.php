<?php
declare (strict_types= 1);

function is_input_empty(String $username, String $pwd)
{
    if(empty($username) || empty($pwd))
    {
        return true;
    }
    else
    {
        return false;
    }
}
function is_username_wrong(bool|array $results)
{
    if(!$results)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function is_password_wrong(string $pwd, string $hashedPwd): bool
{
    return !password_verify($pwd, $hashedPwd);
}
