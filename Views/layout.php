<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title><?= isset($title) ? $title:'My website' ?> </title>
</head>
<body>
    <header>
        <nav class="nav"> 
            <ul>
                <a href="/">Accueil</a>
                <?php if(isset($_SESSION['nom']) && isset($_SESSION["accreditation"])): ?>
                    <a href="/admin">Admin</a>
                    <a href="/signin">Profil</a>
                <?php else: ?>
                        <a href="/signin">Inscription</a>
                        <a href="/login">Login</a>
                <?php endif ?>
            </ul>
        </nav>
    </header>
    <?= $content ?>
    <footer>

    </footer>
    <script src="Views/script/apps.js"></script>
</body>
</html>