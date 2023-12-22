<?php
ob_start();
?>

<section class="container min-h-screen mx-auto px-4 text-gray-700 dark:text-gray-400 text-left py-4 mt-24">
    <h1 class="text-4xl font-bold mb-4">Mentions légales</h1>

    <p class="mb-4">Le site <a class="text-primary hover:underline" href="https://devjobbers.com">https://www.devjobbers.com</a> est édité par la future société
        Devjobbers, X au capital de X euros, dont le siège social est situé X, immatriculée au registre du commerce et des sociétés de Paris sous
        le numéro X, représentée par Monsieur Charlie Dallier-Wood en sa qualité de Président.</p>
    <p class="mb-4">Le directeur de la publication est Monsieur Charlie Dallier-Wood.</p>
    <p class="mb-4">Le site est hébergé par la société OVH, SAS au capital de 10 069 020 €, dont le siège social est situé 2 rue Kellermann, 59100
        Roubaix, immatriculée au registre du commerce et des sociétés de Lille Métropole sous le numéro 424 761 419 00045.</p>
    <p class="mb-4">Pour toute question ou demande d’information concernant le site, ou tout signalement de contenu ou d’activités illicites,
        l’utilisateur peut contacter l’éditeur à l’adresse e-mail suivante : <a class="text-primary hover:underline"
            href="mailto:contact@devjobbers.com">contact@devjobbers.com</a> ou adresser un courrier recommandé avec accusé de réception à :
        Devjobbers, X, X.</p>
</section>

<?php
$content = ob_get_clean();
require("./src/Templates/templates/default.php");
?>