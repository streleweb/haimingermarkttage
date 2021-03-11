<template>
  <div class="willkommen font-willkommen">
    <!-- custom font konfiguriert in tailwind.config.js-->
    <!-- Hier noch Background-Pic oder Video rein -->
    <div class="text-white mb-20 mt-10 text-center text-5xl font-s">
      {{ titleMessage }}
      <div class="text-gray-300 text-center mt-8 text-2xl font-thin bg">
        {{ smallDescription }}
      </div>
      <!-- end willkommenstexte -->
    </div>
    <!-- end willkommen -->

    <!--Buttons mit Custom Props-->
    <router-link to="/app/produkte">
      <Button
        button-inhalt="Produkte"
        button-color="bg-green-400"
        on-hover="hover:bg-white"
      ></Button>
    </router-link>
    <Button
      button-inhalt="Aussteller"
      button-color="bg-green-400"
      on-hover="hover:bg-yellow-50"
    ></Button>
    <Button
      button-inhalt="Karte"
      button-color="bg-green-400"
      on-hover="hover:bg-yellow-100"
    ></Button>
    <Button
      button-inhalt="Anreise"
      button-color="bg-green-400"
      on-hover="hover:bg-yellow-200"
    ></Button>
    <!-- end buttoncontainer -->
  </div>
  <!-- end main -->
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