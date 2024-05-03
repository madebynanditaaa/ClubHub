<?php
declare (strict_types= 1);

function check_error()
{
    if(isset($_SESSION["errorss"]))
    {
        $errors = $_SESSION["errorss"];
        echo "<br>";

        foreach($errors as $error)
        {
            echo '<p class = "form-error">'. $error ."</p>";
        }
        unset($_SESSION["errorss"]);
    }
    else if(isset($_GET["posting"]) && $_GET["posting"] === "success")
    {
        echo "<br>";
        echo '<p class = "form-success" > Posted! </p>';
    }
}