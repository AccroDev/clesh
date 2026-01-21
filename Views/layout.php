<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'My website' ?> </title> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" defer></script>
</head>

<body class="">
    <header>
        <nav class="nav">
            <ul>
                <a href="/">Accueil</a>
                <?php if (isset($_SESSION['user']) && !empty($_SESSION["user"])): ?>
                    <a href="/admin">Admin</a>
                    <a href="/signin">Profil</a>
                    <a href="/admin/components/add">addComponent</a>
                    <a href="/admin/pages/add">addPages</a>
                    <a href="/logout">Deconnexion</a>
                <?php else: ?>
                    <a href="/signin">Inscription</a>
                    <a href="/login">Login</a>
                <?php endif ?>
            </ul>
        </nav>
    </header>

    <?php if (isset($isPreview)): ?>
        <div id="ve-components">
            <?= $content ?>
        </div>
    <?php else: ?>
        <?= $content ?>
    <?php endif; ?>
    <?php if (isset($page_id) && !isset($isPreview)): ?>
        <aside id="edit_accrodev_page" class="fixed bottom-6 right-6 flex items-center gap-2 transition-all z-9999999999 px-6 py-3 rounded-full shadow-2xl duration-300 font-medium " data-page_id="<?= $page_id ?>">
            <i class="fa fa-pen btn-icon"></i>
            <span class="btn-text font-medium">Modifier la page</span> 
        </aside>
    <?php endif; ?>
    <script type="module" src="http://localhost:5173/script/app.js"></script>
</body>

</html>