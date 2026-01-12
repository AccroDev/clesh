<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title><?= isset($title) ? $title:'My website' ?> </title>
</head>
<body class="" >
    <header>
        <nav class="nav"> 
            <ul>
                <a href="/">Accueil</a>
                <?php if(isset($_SESSION['user']) && !empty($_SESSION["user"])): ?>
                    <a href="/admin">Admin</a>
                    <a href="/signin">Profil</a>
                    <a href="/admin/components/add">addComponent</a>
                    <a href="/logout">Deconnexion</a>
                <?php else: ?>
                        <a href="/signin">Inscription</a>
                        <a href="/login">Login</a>
                <?php endif ?>
            </ul>
        </nav>
    </header>
    <?= $content ?>
    <aside>
        <button class=" btn cursor-pointer edit_accrodev_page p-16" >Editer La Page</button>
        <visual-editor
            id="editor"
            name="editor"
            preview="http://localhost:3000/preview"
            iconsUrl="/assets/editor/[name].svg"
            value="[]"
            insertPosition="start"
        ></visual-editor>
    </aside>
    <footer>

    </footer>
    <script type="module" src="http://localhost:5173/script/app.js"></script> 
</body>
</html>