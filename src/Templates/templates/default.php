<?php $controller = $this->getController(); ?>
<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="<? $controller->getPrimaryColor() ?>" />
    <meta name="msapplication-TileColor" content="<? $controller->getPrimaryColor() ?>" />

    <title>
        <?= $controller->getTitle() ?>
    </title>
    <meta property="og:title" content="<?= $controller->getTitle() ?>" />
    <meta name="twitter:title" content="<?= $controller->getTitle() ?>" />
    <meta property="og:site_name" content="<?= $controller->getAppName() ?>" />
    <meta property="og:type" content="website" />

    <meta name="description" content="<?= $controller->getDescription() ?>">
    <meta property="og:description" content="<?= $controller->getDescription() ?>" />
    <meta name="twitter:description" content="<?= $controller->getDescription() ?>" />

    <meta name="author" content="<?= $controller->getAuthor() ?>" />
    <meta name="twitter:creator" content="@<?= $controller->getAuthor() ?>" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta property="og:image" content="<?= $controller->getBannerImage() ?>" />
    <meta name="twitter:image" content="<?= $controller->getBannerImage() ?>" />

    <link rel="canonical" href="https://www.devjobbers.com" />
    <meta property="og:url" content="https://www.devjobbers.com" />
    <meta name="twitter:site" content="https://www.devjobbers.com" />

    <meta name="keywords" content="<?= $controller->getKeywords() ?>">

    <link rel="shortcut icon" href="<?= $controller->getFavicon() ?>" type="image/x-icon">
    <link rel="icon" href="<?= $controller->getFavicon() ?>" type="image/x-icon">

    <link rel="sitemap" type="application/xml" title="Sitemap" href="/sitemap.xml" />

    <?php foreach ($controller->getStylesheets() as $css) { ?>
        <link rel="stylesheet" href="<?= $css ?>">
    <?php } ?>

    <?php foreach ($controller->getJavascripts() as $js) { ?>
        <script src="<?= $js ?>"></script>
    <?php } ?>

    <?php foreach ($controller->getDeferredJavascripts() as $js) { ?>
        <script defer src="<?= $js ?>"></script>
    <?php } ?>

    <!-- ROBOTS (INDEXING FOR ALL SEARCH ENGINES) -->
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow" />
    <!-- END OF ROBOTS -->

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            cookieBanner.init();
        });

        setInterval(() => {
            console.warn("Si tu vois ce message, c'est que tu es curieux. Viens donc nous rejoindre sur Discord : https://discord.gg/2DzqzP7Fgx")
        }, 10000);
    </script>
</head>

<body class="bg-white dark:bg-slate-800 text-black dark:text-white">

    <?php // Si le consentement a été donné, générez le code JavaScript pour Google Analytics
    if ($controller->hasAllowedCookies()) { ?>
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?= $controller->getGoogleAnalyticsId() ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() { dataLayer.push(arguments); }
            gtag('js', new Date());

            gtag('config', '<?= $controller->getGoogleAnalyticsId() ?>');
        </script>
    <?php } ?>

    <?php if ($controller->hasHeader()) {
        include("./src/Templates/layouts/header.php");
    } ?>

    <?= $content ?>

    <?php if ($controller->hasFooter()) {
        include("./src/Templates/layouts/footer.php");
    } ?>
</body>

</html>