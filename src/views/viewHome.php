<?php
include("./templates/header.php");

foreach ($usersArray as $value) {
    echo $value->name."<br>";
}
include("./templates/footer.php");
