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
        <div class="nav-left">
            <a href="index.php" class="home-button"><?php echo TITLE; ?></a>
            <div class="dropdown">
                <button class="menu-button">menu</button>
                <div class="dropdown-content">
                    <a href="/imperalog/premium">premium</a>
                    <a href="/imperalog/communaute">communauté</a>
                    <a href="#">autre lien</a>
                </div>
            </div>
        </div>
        <div class="nav-right">
            <a href="#" class="disconnect-button">deconnexion( <?php echo $user['pseudo']; ?> )</a>
        </div>
    </nav>
