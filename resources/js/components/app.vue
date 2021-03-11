<template>
  <div class="outercontainer flex flex-col h-full">
    <div class="header">
      <navbar></navbar>
    </div>
    <div class="main flex-1">
      <!-- flex-grow war davor -->
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
const default_layout = "default";

export default {
  computed: {},
  data() {
    return {
      titleMessage: "Willkommen bei den Haiminger Markttagen!",
      smallDescription: "Flanieren, Probieren und Genießen...",
      //nicht vergessen, Anreiseinfos entweder in DB abspeichern und von dort aus zB via Props zu laden, oder via API Call (Axios oder FetchAPI)..
    };
  },
  components: { Navbar, Footer, Apple, HomeContent },
};
</script>

