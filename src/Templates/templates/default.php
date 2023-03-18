<?php 

$controller = $this->getController();

?>

<!DOCTYPE html>
<html lang="en" class="smooth-scroll <?= isset($_COOKIE['theme']) && $_COOKIE['theme'] == "dark" ? "dark" : "" ?>">
<head>
    <title><?= $controller->getTitle() ?></title>
    <meta name="description" content="<?= $controller->getDescription() ?>">
    <meta name="keywords" content="<?= $controller->getKeywords() ?>">

    <link rel="shortcut icon" href="<?= $controller->getFavicon() ?>" type="image/x-icon">

    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php foreach ($controller->getStylesheets() as $css) { ?>
        <link rel="stylesheet" href="<?= $css ?>">
    <?php } ?>

    <?php foreach ($controller->getJavascripts() as $js) { ?>
        <script src="<?= $js ?>" defer></script>
    <?php } ?>
</head>
<body class="bg-white dark:bg-slate-800 text-black dark:text-white">
    <?php if ($controller->hasHeader()) 
    {
        include("./src/Templates/layouts/header.php");
    } ?>

    <main class="min-h-screen bg-gradient-to-b from-white to-slate-200 dark:from-slate-800 dark:to-black py-14">
        <?= $content ?>
    </main>

    <?php if ($controller->hasFooter()) 
    {
        include("./src/Templates/layouts/footer.php");
    } ?>
</body>
</html>