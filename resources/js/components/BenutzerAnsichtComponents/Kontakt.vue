<template>
  <div class="kontaktcontentcontainer">
    <!-- Content Container von Willkommen (exklusive Navbar) bis exklusive Footer-->

    <div
      class="
        willkommen
        font-willkommen
        flex-shrink
        mt-2
        pr-2
        pl-2
        mb-4
        md:flex-grow
        md:mt-5
        text-center
      "
    >
      <!-- custom font konfiguriert in tailwind.config.js-->
      <div
        class="
          text-white
          sm:mb-5
          text-xl
          iphone6:text-3xl
          sm:text-3xl
          md:text-5xl
          lg:text-5xl
          font-s
        "
      >
        {{ titleMessage }}
        <div
          class="
            text-gray-100 text-base text-justify
            pt-4
            sssm:px-4
            sm:px-10
            sm:pb-0
            md:px-20
            md:text-xl
            lg:mt-8
            lg:px-40
            lg:text-2xl
            font-thin
            bg
          "
        >
          {{ contactDescription }}
        </div>
        <!-- end willkommenstexte -->
      </div>
    </div>
    <!-- end willkommen -->

    <ul
      id="kontaktinfo"
      class="
        text-white
        border-t border-b border-gray-800
        pb-1
        text-sm
        ssm:text-lg
        sm:text-2xl
        grid
        justify-center
        items-center
        gap-1
        content-evenly
        bg-gray-600 bg-gradient-to-bl
        from-green-900
        to-gray-700
      "
    >
      <li class="justify-self-center">Brunnenweg 5</li>
      <li class="justify-self-center">A-6425 Haiming</li>
      <li class="justify-self-center">
        E-Mail:
        <a href="mailto:info@haiminger-markttage.at" target="_newtab"
          >info@haiminger-markttage.at<img
            src="/images/icons/svgs/email.svg"
            class="resize-icon filter-white-icons mx-auto mt-2"
            alt="email"
        /></a>
      </li>
      <li class="justify-self-center">
        Website:
        <a href="http://www.haiminger-markttage.at/"
          >haiminger-markttage.at<img
            src="/images/icons/svgs/www.svg"
            class="resize-icon filter-white-icons mx-auto mt-2"
            alt="website"
        /></a>
      </li>
      <li class="justify-self-center">
        Zum Kontaktformular:<a href="http://www.haiminger-markttage.at/kontakt/"
          ><img
            src="/images/icons/svgs/contact-form.svg"
            class="resize-icon filter-white-icons mx-auto mt-2 mb-2"
            alt="website"
        /></a>
      </li>
    </ul>

    <div
      class="
        buttonContainer
        flex flex-col flex-shrink
        sm:pt-4
        md:flex-grow
        mt-2
        ssm:mt-4
      "
    >
      <!--Buttons mit Custom Props-->
      <router-link to="/app" exact>
        <Button
          svg-source="/../../images/icons/svgs/home.svg"
          button-inhalt="Home"
          button-color="bg-green-400"
          on-hover="hover:bg-white"
        ></Button>
      </router-link>
    </div>
    <!-- end buttoncontainer -->
  </div>
  <!-- end root element -->
</template>

<script>
import Button from "./Button";

export default {
  data() {
    return {
      name: "Kontakt",
      titleMessage: "Kontaktieren Sie uns gerne!",
      contactDescription:
        "Das Organisationskomitee der Haiminger Markttage steht Ihnen bei Fragen, Anregungen, Kritik oder sonstigen Anliegen gerne zur Verfügung. Schicken Sie uns einfach eine Email oder schreiben Sie uns – wir antworten gerne!",
      //nicht vergessen, Anreiseinfos entweder in DB abspeichern und von dort aus zB via Props zu laden, oder via API Call (Axios oder FetchAPI)..
    };
  },
  components: { Button },
};
</script>

<style>
#kontaktinfo {
  opacity: 80%;
}
</style>