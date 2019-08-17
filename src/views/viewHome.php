<?php

echo "Hello {$user['pseudo']}<br>";
?>

<?php
foreach ($usersArray as $value) {
    echo $value->name."<br>";
}
