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
          {{ homecontent.homeContentTitle }} <br />
          {{ homecontent.homeContentDescription }}
        </div>
        <!-- ********** AKTUELLES HM DATUM HIER EINGEBEN ENDE ******-->
      </div>
    </div>
    <!-- end willkommen -->

    <div class="buttonContainer flex flex-col flex-shrink flex-grow">
      <!--Buttons mit Custom Props-->
      <router-link to="/produktreiter">
        <Button svg-source="/../../images/icons/svgs/apple1.svg" button-inhalt="Produkte" button-color="bg-green-900"
          on-hover="hover:bg-yellow-50"></Button>
      </router-link>

      <router-link to="/aussteller">
        <Button svg-source="/../../images/icons/svgs/aussteller.svg" button-inhalt="Aussteller"
          button-color="bg-green-900" on-hover="hover:bg-yellow-200"></Button>
      </router-link>

      <!-- <a
        href="https://www.google.com/maps/d/u/0/edit?mid=13qNnDIQECR3-pZ3-vK39FNUhoY7M-qD1&usp=sharing"
      >-->
      <router-link to="/karte"><Button svg-source="/../../images/icons/svgs/map.svg" button-inhalt="Karte"
          button-color="bg-green-900" on-hover="hover:bg-yellow-300"></Button></router-link>
      <router-link to="/anreise">
        <Button svg-source="/../../images/icons/svgs/locationpointer.svg" button-inhalt="Anreise"
          button-color="bg-green-900" on-hover="hover:bg-yellow-400"></Button></router-link>
    </div>
    <!-- end buttoncontainer -->
  </div>
  <!-- end root element -->
</template>

<script>
import repository from "../VorstandAdminComponents/repository/repository";
import Button from "./Button";
import Swal from "sweetalert2";

export default {
  metaInfo: {
    title: 'Willkommen bei den Haiminger Markttagen!'
  },
  data() {
    return {
      name: "HomeContent",
      titleMessage: "Willkommen bei den Haiminger Markttagen!",
      smallDescription: "Flanieren, Probieren und Genießen...",
      beforeInstallPromptEvent: Event,
      homecontent: {
        homeContentTitle: 'Infos zu den kommenden Markttagen folgen',
        homeContentDescription: ''
      }
      //nicht vergessen, Anreiseinfos entweder in DB abspeichern und von dort aus zB via Props zu laden, oder via API Call (Axios oder FetchAPI)..
    };
  },

  beforeCreate() {
    // Check if the PWA is eligible for installation and if it's already installed
    window.addEventListener('beforeinstallprompt', (e) => {
      // Prevent the default browser UI from displaying the install prompt
      e.preventDefault();
      this.beforeInstallPromptEvent = e;

      // Check if the app is already installed on the home screen
      if (window.matchMedia('(display-mode: standalone)').matches || window.navigator.standalone === true) {
        console.log('PWA bereits installiert.');
      } else {
        console.log('PWA ist noch nicht installiert.');

        Swal.fire({
          title: "App installieren",
          text: "App zum Startbildschirm hinzufügen?",
          heightAuto: false,
          showCancelButton: true,
          cancelButtonText: "Nein",
          confirmButtonText: "Ja",
          confirmButtonColor: "#3cb371",
        }).then((result) => {
          if (result.isConfirmed) {
            this.beforeInstallPromptEvent.prompt();
          }
        });
      }
    });

    if (!localStorage.getItem("cookieOkClicked")) {
      Swal.fire({
        title: "Cookie Notice",
        heightAuto: false,
        // text: "Wir verwenden Cookies, um unsere Webseite möglichst benutzerfreundlich zu gestalten. Durch die Nutzung unserer Webapp erklären Sie sich mit der Verwendung von Cookies einverstanden. Details dazu finden Sie in der Datenschutzerklärung.",
        html: 'Wir verwenden Cookies, um unsere Webseite möglichst benutzerfreundlich zu gestalten. Durch die Nutzung unserer Webapp erklären Sie sich mit der Verwendung von Cookies einverstanden. Details dazu finden Sie in der Datenschutzerklärung.<br><br><strong>Jede Seite, die Sie in dieser App online besucht haben, können Sie auch ohne Internetverbindung öffnen!</strong>',
        confirmButtonText: "ok",
        confirmButtonColor: "#3cb371",
      }).then(() => this.cookieOkClicked());
    }
  },
  created() {
    repository.getHomeContent().then(response => {
      this.homecontent.homeContentTitle = response.data.homeContentTitle;
      this.homecontent.homeContentDescription = response.data.homeContentDescription;
    });
  },
  components: { Button },
  methods: {
    cookieOkClicked() {
      localStorage.setItem("cookieOkClicked", "true");
    },
  },
};
</script>

<style>
#installapp {
  position: absolute;
  background: black;
  background-color: black;
}
</style>
