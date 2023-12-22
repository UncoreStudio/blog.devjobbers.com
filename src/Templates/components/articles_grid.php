<?php // Include only if there are articles
if (count($articles) > 0) { ?>
    <div class="py-6">
        <h3 class="text-center lg:text-left mb-4 tracking-tight leading-none font-extrabold text-3xl">
            <?= isset($articlesTitle) ? $articlesTitle : "Articles" ?>
        </h3>

        <div draggable="false" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php foreach ($articles as $article) { ?>
                <a title="<?= $article->getTitle() ?>" href="<?= $article->getHref() ?>" data-article-id="<?= $article->getId() ?> "
                    class="group col-span-1 rounded-xl min-h-[12rem] hover:shadow-sm duration-300 border border-slate-300 hover:border-slate-500 dark:border-slate-600 dark:hover:border-slate-300 overflow-hidden relative">
                    <div class="absolute bottom-0 z-20 m-2">
                        <h4 class="font-bold text-lg lg:text-xl bg-white text-black dark:bg-black dark:text-white p-1">
                            <?= $article->getTitle() ?>
                        </h4>
                    </div>

                    <img draggable="false" src="<?= $article->getThumbnail() ?>"
                        class="h-full w-full blur-[1.5px] group-hover:blur-0 object-cover object-center scale-110 group-hover:scale-100 duration-300">
                </a>
            <?php } ?>
        </div>
    </div>
<?php } ?>