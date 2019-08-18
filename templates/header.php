<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./public/css/main.css">
    <title><?php echo TITLE; ?></title>
</head>
<body>
    <nav>
        <a href="#" class="home-button"><?php echo TITLE; ?></a>
        <a href="#" class="disconnect-button">deconnexion( <?php echo $user['pseudo']; ?> )</a>
    </nav>
