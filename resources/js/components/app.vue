<template>
  <div class="flex flex-col min-h-screen">
    <div class="header">
      <navbar></navbar>
    </div>
    <div class="main flex-grow">
      <div class="willkommen font-willkommen">
        <!-- custom font konfiguriert-->
        <!-- Hier noch Background-Pic oder Video rein -->
        <div class="text-white mb-20 mt-10 text-center text-5xl font-s">
          {{ titleMessage }}
          <div class="text-gray-300 text-center mt-8 text-2xl font-thin bg">
            {{ smallDescription }}
          </div>
        </div>
        <!-- end willkommenstexte -->
      </div>
      <!-- end willkommen -->

      <!--Button dann als seperaten Component bereitstellen, margin left noch weg und centern-->
      <Button
        button-inhalt="Produkte"
        button-color="bg-green-400"
        on-hover="hover:bg-white"
      ></Button>
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
    <Footer></Footer>
  </div>
  <!-- end outer div -->
</template>


<script>
import Footer from "./Footer";
import Navbar from "./Navbar";
import Apple from "./svg/Apple";
import Button from "./Button";
const default_layout = "default";

export default {
  computed: {},
  data() {
    return {
      titleMessage: "Willkommen bei den Haiminger Markttagen!",
      smallDescription: "Flanieren, Probieren und Genießen...",
      //nicht vergessen, Anreiseinfos entweder in DB abspeichern und von dort aus zB via Props zu laden, oder direkt..
    };
  },
  components: { Navbar, Footer, Apple, Button },
};
</script>

