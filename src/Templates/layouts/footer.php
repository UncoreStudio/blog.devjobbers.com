<?php

use AsaP\Main;

?>

<section id="newsletter" class="flex p-2 py-10" data-aos="fade-up" data-aos-offset="100" data-aos-duration="500" data-aos-easing="ease-in-out"
  data-aos-once="true">
  <div class="flex w-full bg-primary text-white mx-auto rounded-lg py-20 px-2 lg:px-4 container flex-col justify-center items-center">
    <h2 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-center md:text-5xl lg:text-6xl">
      Rejoignez-nous !
    </h2>

    <div class="flex flex-col justify-center items-center text-center gap-4">
      <p class="text-lg font-semibold text-gray-100">
        Notre projet est actuellement en cours de développement. Inscrivez-vous à la newsletter pour ne rien manquer !
      </p>
      <form id="newsletter_form" action="" method="post" class="w-full">
        <div class="flex gap-2 flex-col md:flex-row list-none sm:justify-center items-center">
          <input class="w-full md:w-72 py-3 px-5 text-base text-gray-900 placeholder-gray-500 border border-gray-300 rounded-full focus:outline-none"
            placeholder="exemple@devjobbers.com" name="email_address" aria-label="Votre adresse email" type="email" required />
          <button
            class="inline-flex justify-center items-center py-3 px-5 w-full md:w-48 font-semibold text-center bg-black text-white rounded-full active:scale-95 duration-500"
            type="submit" id="newsletter_submit_button">
            S'inscrire
          </button>
        </div>
      </form>
    </div>
  </div>
</section>

<script>
  const newsletter_form = document.getElementById("newsletter_form");
  const newsletter_submit_button = document.getElementById("newsletter_submit_button");

  newsletter_form.addEventListener("submit", (e) => {
    e.preventDefault();

    newsletter_submit_button.disabled = true;
    newsletter_submit_button.classList.add("opacity-50");
    newsletter_submit_button.innerHTML = "Inscription..";

    const email = e.target.email_address.value;

    formData = new FormData();
    formData.append("email", email);

    if (email) {
      fetch("https://api.devjobbers.com/newsletters/", {
        method: "POST",
        body: formData,
      })
        .then((res) => res.json())
        .then((data) => {
          if (data.success) {
            gtag('event', 'newsletter_signup');

            newsletter_form.reset();
            newsletter_submit_button.innerHTML = "Inscrit !";
          } else {
            if (data.error === "already_subscribed") {
              newsletter_submit_button.innerHTML = "Déjà inscrit !";
            } else {
              newsletter_submit_button.innerHTML = "Erreur..";
            }
          }

          setTimeout(() => {
            newsletter_submit_button.innerHTML = "S'inscrire";
            newsletter_submit_button.classList.remove("opacity-50");
            newsletter_submit_button.disabled = false;
          }, 10000);
        });
    }
  });
</script>

<footer id="footer" class="flex flex-col md:flex-row gap-4 justify-between items-center container p-4 mx-auto rounded-lg border-t">
  <div>
    <a class="flex flex-row items-center" href="<?= Main::getInstance()->getRootUrl() ?>/#">
      <img src="<?= Main::getInstance()->getRootUrl() ?>/assets/img/full_logo_icon.png" alt="Devjobbers" class="h-8 w-auto" />
    </a>
  </div>

  <div class="flex flex-col md:flex-row gap-2 text-center">
    <a href="<?= Main::getInstance()->getRootUrl() ?>/legal-mentions"
      class="text-sm font-normal text-gray-500 hover:text-gray-600 dark:text-gray-400 dark:hover:text-gray-300 hover:underline">
      Mentions légales
    </a>
    <a href="<?= Main::getInstance()->getRootUrl() ?>/privacy-policy"
      class="text-sm font-normal text-gray-500 hover:text-gray-600 dark:text-gray-400 dark:hover:text-gray-300 hover:underline">
      Politique de confidentialité
    </a>
    <a href="mailto:contact@devjobbers.com" class="text-sm font-normal text-gray-500 hover:text-gray-600 dark:text-gray-400 dark:hover:text-gray-300 hover:underline">
      Contact
    </a>
  </div>

  <div class="flex flex-row gap-2 text-sm font-medium text-gray-500 dark:text-gray-400">
    ©
    <?= date('Y') ?> Devjobbers
  </div>


</footer>