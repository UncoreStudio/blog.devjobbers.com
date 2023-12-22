<?php
ob_start();
?>

<section class="container min-h-screen mx-auto px-4 text-gray-700 dark:text-gray-400 text-left py-4 mt-24">
    <h1 class="text-4xl font-bold mb-4">Politique de confidentialité</h1>

    <p class="mb-4">
        Dernière mise à jour : 17/12/2023
    </p>

    <p class="mb-4">
        Bienvenue sur Devjobbers. Cette page vous informe
        de nos politiques concernant la collecte, l'utilisation et la
        divulgation des Informations personnelles que nous recevons des
        utilisateurs du Site.
    </p>

    <h2 class="text-2xl font-bold mb-2">
        Collecte et utilisation des informations
    </h2>

    <p class="mb-4">
        Devjobbers peut collecter et utiliser les informations
        personnelles de ses utilisateurs à diverses fins, notamment pour
        améliorer les services proposés sur le Site, personnaliser l'expérience
        utilisateur, et à d'autres fins décrites dans la présente Politique de
        confidentialité.
    </p>

    <h2 class="text-2xl font-bold mb-2">Cookies</h2>

    <p class="mb-4">
        Le Site utilise des cookies pour améliorer l'expérience utilisateur. En
        utilisant le Site, vous consentez à l'utilisation de cookies
        conformément à notre Politique de cookies.
    </p>

    <h2 class="text-2xl font-bold mb-2">Consentement</h2>

    <p class="mb-4">
        En utilisant notre Site, vous consentez à notre Politique de
        confidentialité et acceptez ses conditions.
    </p>

    <h2 class="text-2xl font-bold mb-2">
        Modifications de la politique de confidentialité
    </h2>

    <p class="mb-4">
        Devjobbers se réserve le droit de mettre à jour ou de modifier
        cette Politique de confidentialité à tout moment. Les modifications
        seront effectives dès leur publication sur le Site. Nous vous
        encourageons à consulter régulièrement cette page pour rester informé
        des éventuelles modifications.
    </p>

    <p class="mb-4">
        Si vous avez des questions ou des préoccupations concernant notre
        Politique de confidentialité, veuillez nous contacter à
        <a class="text-primary hover:underline" href="mailto:contact@devjobbers.com">contact@devjobbers.com</a>.
    </p>
</section>

<?php
$content = ob_get_clean();
require("./src/Templates/templates/default.php");
?>