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