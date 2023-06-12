<template>
  <div class="app">
    <PageLoader></PageLoader>
    <header class="navigationbar">
      <navbar @togglemenu="mobileMenuOpen = !mobileMenuOpen"></navbar>
    </header>

    <Mobilemenu :open="mobileMenuOpen"></Mobilemenu>

    <section class="sectionarea">
      <router-view></router-view>
    </section>

    <Footer></Footer>
  </div>

  <!-- end outercontainer -->
</template>


<script>
import PageLoader from "./PageLoader.vue";
import Footer from "./Footer";
import Navbar from "./Navbar";
import Mobilemenu from "./Mobilemenu.vue";
const default_layout = "default";
import { EventBus } from "../../event-bus";

export default {
  name: 'App',
  metaInfo: {
    title: 'Haiminger Markttage',
    titleTemplate: '%s | Haiminger Markttage',
    htmlAttrs: {
      lang: 'de-DE'
    },
    meta: [
      { charset: 'utf-8' },
      { name: 'description', content: 'Haiminger Markttage App. Der Weg zum guten Geschmack führt über die Haiminger Markttage' }
    ]
  },
  data() {
    return {
      titleMessage: "Willkommen bei den Haiminger Markttagen!",
      smallDescription: "Flanieren, Probieren und Genießen...",
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
  components: { PageLoader, Navbar, Footer, Mobilemenu },
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

