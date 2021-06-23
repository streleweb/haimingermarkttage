<template>
  <div class="app">
    <header class="navigationbar">
      <navbar @togglemenu="mobileMenuOpen = !mobileMenuOpen"></navbar>
    </header>

    <Mobilemenu :open="mobileMenuOpen"></Mobilemenu>
    <section class="sectionarea">
      <!--war main flex-1-->
      <!-- zu flex-grow zuruecksetzen, wenn ausstellerview ausgefeilt -->
      <router-view></router-view>
    </section>
    <Footer></Footer>
  </div>

  <!-- end outercontainer -->
</template>


<script>
import Footer from "./Footer";
import Navbar from "./Navbar";
import HomeContent from "./HomeContent";
import PageNotFound from "./PageNotFound";
import Mobilemenu from "./Mobilemenu.vue";
const default_layout = "default";
import { EventBus, Eventbus } from "../event-bus";

export default {
  computed: {},
  data() {
    return {
      titleMessage: "Willkommen bei den Haiminger Markttagen!",
      smallDescription: "Flanieren, Probieren und Genießen...",
      //nicht vergessen, Anreiseinfos entweder in DB abspeichern und  via API Call (Axios oder FetchAPI), oder direkte maske bereitstellen
      mobileMenuOpen: false,
    };
  },
  watch: {
    //Reagiert, wenn Menübutton geklicked wurde und empfängt Bei Klicken eines Menülinks vom Event-Bus einen $emit
    mobileMenuOpen() {
      //EventBusHandler für Clicked-Event im MobileMenü, damit der Clicked-State auch hier upgedated wird.
      const clickHandler = () => {
        //console.log("This is from App, the Event has been received..");
        this.mobileMenuOpen = false;
      };
      //Den Costum-clickHandler als Callback auf den $emit ausführen
      EventBus.$on("clickedOnMenuLink", clickHandler);
    },
  },
  components: { Navbar, Footer, Mobilemenu },
};
</script>

<style>
/*Custom Selection Color, wenn man Text mit Maus auswählt*/
::selection {
  color: rgb(0, 255, 8);
  background: rgba(116, 116, 116, 0.496);
}

.navigationbar {
  height: 58px;
}
</style>

