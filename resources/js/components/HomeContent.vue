<template>
  <div class="homecontentcontainer">
    <!-- Content Container von Willkommen (exklusive Navbar) bis exklusive Footer-->

    <div class="titletext">
      <!-- custom font konfiguriert in tailwind.config.js-->
      <!-- Hier noch Background-Pic oder Video rein -->
      <div class="ueberschrift textshadow-markant">
        {{ titleMessage }}
        <div
          class="
            text-gray-300 text-sm
            ssmm:text-base
            ssm:text-lg
            mt-1
            lg:mt-8
            lg:text-2xl
            font-thin
            bg
          "
        >
          {{ smallDescription }}
        </div>
        <!-- end willkommenstexte -->
      </div>
    </div>
    <!-- end willkommen -->

    <div class="buttonContainer flex flex-col flex-shrink flex-grow">
      <!--Buttons mit Custom Props-->
      <router-link to="/app/produkte">
        <Button
          svg-source="/../../images/icons/svgs/apple1.svg"
          button-inhalt="Produkte"
          button-color="bg-green-900"
          on-hover="hover:bg-white"
        ></Button>
      </router-link>

      <router-link to="app/aussteller">
        <Button
          svg-source="/../../images/icons/svgs/aussteller.svg"
          button-inhalt="Aussteller"
          button-color="bg-green-900"
          on-hover="hover:bg-yellow-50"
        ></Button>
      </router-link>

      <a
        href="https://www.google.com/maps/d/u/0/edit?mid=13qNnDIQECR3-pZ3-vK39FNUhoY7M-qD1&usp=sharing"
      >
        <Button
          svg-source="/../../images/icons/svgs/map.svg"
          button-inhalt="Karte"
          button-color="bg-green-900"
          on-hover="hover:bg-yellow-100"
        ></Button
      ></a>
      <Button
        svg-source="/../../images/icons/svgs/locationpointer.svg"
        button-inhalt="Anreise"
        button-color="bg-green-900"
        on-hover="hover:bg-yellow-100"
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