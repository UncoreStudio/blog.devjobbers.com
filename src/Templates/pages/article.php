<?php
use \AsaP\Main;
use AsaP\Utils\DateUtils;

$article = $this->getController()->getArticle();

ob_start();
?>

<section class="mx-auto container lg:px-4 mt-24 gap-2 min-h-screen">
    <?php include("./src/Templates/layouts/breadcrumb.php"); ?>

    <header class="flex flex-col gap-2.5 px-1 lg:px-0 py-4">
        <p class="inline-flex text-sm text-gray-400 items-center gap-4">
            <span class="inline-flex gap-2 items-center justify-center font-semibold text-gray-600 text-lg">
                <img draggable="false" src="<?= $article->getAuthor()["author_avatar"] ?>" alt="<?= $article->getAuthor()["author_firstname"] ?>"
                    class="w-8 h-8 rounded-full">
                <?= $article->getAuthor()["author_firstname"] ?>
            </span>
            <?= DateUtils::getHowMuchTimeSince($article->getDate("d/m/Y")) ?>
        </p>
        <h1 class="tracking-tight text-4xl font-extrabold md:text-5xl lg:text-6xl items-center">
            <?= $article->getTitle() ?>
        </h1>
        <div class="flex flex-row flex-wrap gap-2 lg:pt-1 items-center">
            <a href="<?= Main::getInstance()->getRootUrl() . "/categories/" . $article->getCategorySlug() ?>"
                class="inline-flex items-center px-3 py-1 text-sm font-medium text-green-700 bg-primary/25 rounded-full hover:underline">
                <?= $article->getCategoryName() ?>
            </a>
        </div>
    </header>

    <div class="flex flex-col mt-2 gap-2 rounded">
        <img draggable="false" src="<?= $article->getThumbnail() ?>" alt="<?= $article->getTitle() ?>"
            class="w-full flex h-80 object-cover object-center rounded-t">

        <div class="flex flex-col gap-2 py-1">
            <?php foreach ($article->getContent() as $section) { ?>
                <section class="flex flex-col gap-1.5 p-2">
                    <h2 class="font-bold text-3xl">
                        <?= $section->title ?>
                    </h2>
                    <p class="text-lg">
                        <?= $section->text ?>
                    </p>
                </section>
            <?php } ?>
        </div>
    </div>

    <div id="articles" class="flex flex-col h-full container py-10 px-2 mx-auto rounded-lg" data-aos="fade-up" data-aos-offset="200"
        data-aos-duration="500" data-aos-easing="ease-in-out" data-aos-once="true">

        <?php
        $articlesTitle = "Articles similaires";
        $articles = $this->getController()->getArticles();
        include("./src/Templates/components/articles_grid.php");
        ?>

    </div>

</section>

<?php
$content = ob_get_clean();
require("./src/Templates/templates/default.php");
?>