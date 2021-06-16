<template>
  <div class="flex flex-col h-screen bg-black justify-between">
    <!--Hier video oder Photo noch rein-->
    <!-- "
      outercontainer
      flex flex-col
      h-full
      bg-gradient-to-b
      from-gray-900
      to-green-500
      overflow-hidden
    "-->
    <!-- war bg-gradient-to-b from-gray-900 to-green-500 ... flex h-full flex-col overflow-hidden-->
    <header>
      <navbar></navbar>
    </header>
    <div class="">
      <!--war main flex-1-->
      <!-- zu flex-grow zuruecksetzen, wenn ausstellerview ausgefeilt -->
      <router-view></router-view>
    </div>
    <Footer></Footer>
  </div>

  <!-- end outercontainer -->
</template>


<script>
import Footer from "./Footer";
import Navbar from "./Navbar";
import Apple from "./svg/Apple";
import HomeContent from "./HomeContent";
import PageNotFound from "./PageNotFound";
const default_layout = "default";

export default {
  computed: {},
  data() {
    return {
      titleMessage: "Willkommen bei den Haiminger Markttagen!",
      smallDescription: "Flanieren, Probieren und Genießen...",
      //nicht vergessen, Anreiseinfos entweder in DB abspeichern und  via API Call (Axios oder FetchAPI), oder direkte maske bereitstellen
    };
  },
  components: { Navbar, Footer, Apple },
};
</script>

<style>
/*Custom Selection Color, wenn man Text mit Maus auswählt*/
::selection {
  color: rgb(0, 255, 8);
  background: rgba(116, 116, 116, 0.496);
}
</style>

