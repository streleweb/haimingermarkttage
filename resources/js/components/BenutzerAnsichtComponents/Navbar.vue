<template>
  <header>
    <!-- Nav -->
    <nav class="navbar">
      <div id="#LOGO UND LI CONTAINER" class="flex items-center flex-shrink space-x-5 text-white mr-6">
        <router-link class="items-center inline-flex navbg" to="/" exact>
          <img src="/../../images/icons/pngs/7272transparent.png" class="resizeLogo" alt="Logo" /><span
            class="logotextstyle">Haiminger Markttage</span></router-link>

        <router-link to="/philosophie" exact class="hidden philosophiebp:inline-flex navbg">Philosophie</router-link>
        <router-link to="/news" exact class="hidden newnewsbp:inline-flex navbg">News</router-link>
        <router-link to="/programm" exact class="hidden newsbp:inline-flex navbg">Programm</router-link>
        <router-link to="/fotogalerie" exact class="hidden fotogaleriebp:inline-flex navbg">Fotogalerie</router-link>
      </div>
      <!--START- Iconcontainer-->
      <div id="iconcontainer" class="hidden ssm:inline-flex pr-4 space-x-2">
        <a href="https://www.facebook.com/Haiminger.Markttage"><img src="/images/icons/svgs/facebook-logo.svg"
            class="resize-icon filter-white-icons" alt="fb" /></a>

        <a href="http://www.haiminger-markttage.at/"><img src="/images/icons/svgs/www.svg"
            class="resize-icon filter-white-icons" alt="website" /></a>

        <a href="mailto:info@haiminger-markttage.at" target="_newtab"><img src="/images/icons/svgs/email.svg"
            class="resize-icon filter-white-icons pl-1" alt="email" /></a>
      </div>

      <!--START BUTTON-div, via emit kann am Elternelement (App) auf dieses togglemenu event gelistened werden-->
      <div class="block lg:hidden" @click="
        showMenu = !showMenu;
      $emit('togglemenu');
      ">
        <button id="app" class="
            fixed
            top-3
            right-3
            items-center
            text-white
            focus:outline-none
            border-white border
            rounded
            px-3
            py-2
            navbg
          ">
          <svg class="fill-current h-4 w-3 -mt-1 text-white" viewBox="0 0 20 15" xmlns="http://www.w3.org/2000/svg">
            <title>Menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
          </svg>
        </button>
      </div>
      <!--END BUTTON-div-->
    </nav>
    <!-- END Nav -->
  </header>
  <!-- END Header -->
</template>

<script>
import Mobilemenu from "./Mobilemenu.vue";
import { EventBus } from "../../event-bus";

export default {
  name: "Navbar",
  data() {
    return {
      showMenu: false,
    };
  },

  components: { Mobilemenu, EventBus },

  watch: {
    showMenu() {
      const navbar = document.querySelector(".navbar");

      if (this.showMenu) {
        //Scrollen deaktivieren
        document.body.classList.add("stop-scrolling");
        /** Alles ausser Menübutton "hidden" */
        var children = navbar.children;
        for (let i = 0; i < children.length - 1; i++) {
          //console.log(children[i])
          children[i].style.visibility = "hidden";
        }
      } else {
        //Scrollen wieder aktivieren
        document.body.classList.add("haveFunScrolling");
        var children = navbar.children;
        for (let i = 0; i < children.length - 1; i++) {
          //console.log(children[i])
          children[i].style.visibility = "visible";
        }
      }
      //Reagiert, wenn Menübutton geklicked wurde und empfängt Bei Klicken eines Menülinks vom Event-Bus einen $emit
      //EventBusHandler für Clicked-Event im MobileMenü, damit der Clicked-State auch hier upgedated wird.
      const clickHandler = () => {
        //console.log("This is from App, the Event has been received..");
        this.showMenu = false;
      };
      //Den Costum-clickHandler als Callback auf den $emit ausführen
      EventBus.$on("clickedOnMenuLink", clickHandler);
    },
  },
};
</script>

<style>
.stop-scrolling {
  height: 100vh;
  overflow: hidden;
}

.haveFunScrolling {
  overflow: visible;
}
</style>
