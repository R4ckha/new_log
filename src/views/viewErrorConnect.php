<?php
echo $user["error"]."<br>";

if ($user["errorNo"] == 2) {
    echo "Connecter vous au <a href='http://imperacube.fr/forum/index.php'>Forum</a> puis revenez ici";
} else {
    echo "<a href='http://imperacube.fr/forum/index.php'>Retour au Forum</a>";
}
