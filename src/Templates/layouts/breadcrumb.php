<?php $pages = $this->getController()->getBreadcrumb(); ?>
<nav class="flex p-1 lg:p-2 font-medium text-gray-500" aria-label="Breadcrumb">
    <ol class="hidden lg:inline-flex items-center space-x-2">

        <?php for ($i = 0 ; $i < count($pages) ; $i++) { $page = $pages[$i]; ?>
            <li class="inline-flex items-center">
                <?php if ($i !== 0) { ?>
                    <svg class="w-5 h-5 mr-2 items-center" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"><path d="m9 6 6 6-6 6"></path></svg>
                <?php } ?>

                <?php if (!isset($page["page_link"])) { ?>
                    <span class="inline-flex items-center text-sm font-medium">
                        <?= $page["page_title"] ?>
                    </span>
                <?php } else { ?>
                    <a href="<?= $page["page_link"] ?>" class="inline-flex items-center text-sm font-medium hover:underline">
                        <?= $page["page_title"] ?>
                    </a>
                <?php } ?>
            </li>
        <?php } ?>
    </ol>
</nav>