<main class="min-h-screen" >
    <h2>Inscription</h2>
    <form action="/api/signin" method="post">

        <div style="margin: 12px;" >
            <input type="text" style="padding: 10px;" name="nom" placeholder="nom" >
        </div>
        <div style="margin: 12px;" >
            <input type="text" style="padding: 10px;" name="email" placeholder="email" >
        </div>
        <div class="" style="margin: 12px;" >
            <input type="text" style="padding: 10px;"name="password" placeholder="password" >
        </div>
        <?php if(isset($_GET["Error"])): ?>
            <p style="color: red;" >Error survenue</p>
        <?php endif; ?>
        <button>Envoyer</button>
    </form>
</main>