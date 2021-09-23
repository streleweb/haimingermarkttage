<template>
  <div class="homecontentcontainer">
    <!-- Content Container von Willkommen (exklusive Navbar) bis exklusive Footer-->

    <div class="titletext">
      <!-- custom font konfiguriert in tailwind.config.js-->
      <!-- Hier noch Background-Pic oder Video rein -->
      <div class="ueberschrift textshadow-markant">
        {{ titleMessage }}
        <div class="descriptiontext">
          {{ smallDescription }}
        </div>
        <!-- end willkommenstexte -->
        <!-- ********** AKTUELLES HM DATUM HIER EINGEBEN *********** -->
        <div id="hmdate" class="mt-2 descriptiontext text-white">
          9. und 16. Oktober 2021 | 9 - 17 Uhr bei jeder Witterung!
        </div>
        <!-- ********** AKTUELLES HM DATUM HIER EINGEBEN ENDE ******-->
      </div>
    </div>
    <!-- end willkommen -->

    <div class="buttonContainer flex flex-col flex-shrink flex-grow">
      <!--Buttons mit Custom Props-->
      <router-link to="/produktreiter">
        <Button
          svg-source="/../../images/icons/svgs/apple1.svg"
          button-inhalt="Produkte"
          button-color="bg-green-900"
          on-hover="hover:bg-yellow-50"
        ></Button>
      </router-link>

      <router-link to="/aussteller">
        <Button
          svg-source="/../../images/icons/svgs/aussteller.svg"
          button-inhalt="Aussteller"
          button-color="bg-green-900"
          on-hover="hover:bg-yellow-200"
        ></Button>
      </router-link>

      <!-- <a
        href="https://www.google.com/maps/d/u/0/edit?mid=13qNnDIQECR3-pZ3-vK39FNUhoY7M-qD1&usp=sharing"
      >-->
      <router-link to="/karte"
        ><Button
          svg-source="/../../images/icons/svgs/map.svg"
          button-inhalt="Karte"
          button-color="bg-green-900"
          on-hover="hover:bg-yellow-300"
        ></Button
      ></router-link>
      <router-link to="/anreise">
        <Button
          svg-source="/../../images/icons/svgs/locationpointer.svg"
          button-inhalt="Anreise"
          button-color="bg-green-900"
          on-hover="hover:bg-yellow-400"
        ></Button
      ></router-link>
    </div>
    <!-- end buttoncontainer -->
  </div>
  <!-- end root element -->
</template>

<script>
import Button from "./Button";
import Swal from "sweetalert2";

export default {
  data() {
    return {
      name: "HomeContent",
      titleMessage: "Willkommen bei den Haiminger Markttagen!",
      smallDescription: "Flanieren, Probieren und Genießen...",
      //nicht vergessen, Anreiseinfos entweder in DB abspeichern und von dort aus zB via Props zu laden, oder via API Call (Axios oder FetchAPI)..
    };
  },

  beforeCreate() {
    if (!localStorage.getItem("cookieOkClicked")) {
      Swal.fire({
        title: "Cookie Notice",
        heightAuto: false,
        text: "Wir verwenden Cookies, um unsere Webseite möglichst benutzerfreundlich zu gestalten. Durch die Nutzung unserer Webapp erklären Sie sich mit der Verwendung von Cookies einverstanden. Details dazu finden Sie in der Datenschutzerklärung. (Siehe Footer)",
        confirmButtonText: "ok",
        confirmButtonColor: "#3cb371",
      }).then(() => this.cookieOkClicked());
    }
  },
  components: { Button },
  methods: {
    cookieOkClicked() {
      localStorage.setItem("cookieOkClicked", "true");
    },
  },
};
</script>

<style scoped>
</style>
