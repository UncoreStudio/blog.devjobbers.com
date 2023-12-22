<?php
ob_start();

$rows = $this->getController()->getRows();
?>

<section class="mx-auto container lg:px-4 mt-24 gap-2">
    <?php include("./src/Templates/layouts/breadcrumb.php"); ?>

    <?php foreach ($rows as $row) {
        $articlesTitle = $row["row_title"];
        $articles = $row["row_articles"];

        include("./src/Templates/components/articles_grid.php");
    } ?>
</section>


<?php
$content = ob_get_clean();
require("./src/Templates/templates/default.php");
?>