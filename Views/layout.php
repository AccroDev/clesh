<!DOCTYPE html>
<html lang="en" class="light" >

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'My website' ?> </title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
</head>

<body class="bg-background-light   font-display text-[#181411]  ">
    <?php require("./Views/template/components/header.php");  ?>

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
    <?php require("./Views/template/components/footer.php");  ?>
    <script type="module" src="http://localhost:5173/script/app.js"></script>
</body>

</html>