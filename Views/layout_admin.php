<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'My website' ?> </title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
</head>

<body class="bg-background-light font-display text-[#181411]">
    
    <?php 
    $success = $_GET['success'] ?? null;
    $error = $_GET['error'] ?? null;
    if ($success || $error): 
        $type = $success ? 'success' : 'error';
        $message = $success ? "Opération réussie !" : htmlspecialchars($error);
    ?>
    <div id="status-toast" 
         data-type="<?= $type ?>"
         class="fixed bottom-5 right-5 z-[100] flex items-center p-4 mb-4 w-full max-w-xs text-white rounded-xl shadow-lg transition-all duration-500 transform translate-y-10 opacity-0 <?= $type === 'success' ? 'bg-green-600' : 'bg-red-600' ?>" 
         role="alert">
        <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 rounded-lg bg-white/20">
            <span class="material-symbols-outlined text-sm">
                <?= $type === 'success' ? 'check_circle' : 'error' ?>
            </span>
        </div>
        <div class="ml-3 text-sm font-normal">
            <?= $message ?>
        </div>
        <button type="button" id="close-toast" class="ml-auto -mx-1.5 -my-1.5 p-1.5 inline-flex h-8 w-8 text-white/50 hover:text-white rounded-lg">
            <span class="material-symbols-outlined">close</span>
        </button>
    </div>
    <?php endif; ?>

    <?php require("./Views/template/admin/navbar-admin.php"); ?>
    
    <div class="ml-64 min-h-screen flex flex-col">
        <?php require("./Views/template/admin/header-admin.php"); ?>

        <main class="flex-grow p-6">
            <?= $content ?>
        </main>

        <?php require("./Views/template/components/footer.php"); ?>
    </div>

    <script type="module" src="http://localhost:5173/script/app.js"></script>
</body>
</html>