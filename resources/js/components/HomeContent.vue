<template>
  <div class="homecontentcontainer">
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
      <!-- Hier noch Background-Pic oder Video rein -->
      <div
        class="
          text-white
          mb-3
          text-2xl
          sm:text-3xl
          md:text-5xl
          lg:text-5xl
          font-s
        "
      >
        {{ titleMessage }}
        <div class="text-gray-300 text-base lg:mt-8 lg:text-2xl font-thin bg">
          {{ smallDescription }}
        </div>
        <!-- end willkommenstexte -->
      </div>
    </div>
    <!-- end willkommen -->

    <div class="buttonContainer flex flex-col flex-shrink md:flex-grow">
      <!--Buttons mit Custom Props-->
      <router-link to="/app/produkte">
        <Button
          svg-source="/../../images/icons/svgs/apple1.svg"
          button-inhalt="Produkte"
          button-color="bg-green-400"
          on-hover="hover:bg-white"
        ></Button>
      </router-link>

      <router-link to="app/aussteller">
        <Button
          svg-source="/../../images/icons/svgs/aussteller.svg"
          button-inhalt="Aussteller"
          button-color="bg-green-400"
          on-hover="hover:bg-yellow-50"
        ></Button>
      </router-link>

      <a
        href="https://www.google.com/maps/d/u/0/edit?mid=13qNnDIQECR3-pZ3-vK39FNUhoY7M-qD1&usp=sharing"
      >
        <Button
          svg-source="/../../images/icons/svgs/map.svg"
          button-inhalt="Karte"
          button-color="bg-green-400"
          on-hover="hover:bg-yellow-100"
        ></Button
      ></a>
      <Button
        svg-source="/../../images/icons/svgs/locationpointer.svg"
        button-inhalt="Anreise"
        button-color="bg-green-400"
        on-hover="hover:bg-yellow-200"
      ></Button>
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
      name: "HomeContent",
      titleMessage: "Willkommen bei den Haiminger Markttagen!",
      smallDescription: "Flanieren, Probieren und Genießen...",
      //nicht vergessen, Anreiseinfos entweder in DB abspeichern und von dort aus zB via Props zu laden, oder via API Call (Axios oder FetchAPI)..
    };
  },
  components: { Button },
};
</script>

<style>
</style>