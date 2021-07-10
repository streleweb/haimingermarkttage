

<template>
  <div class="max-w-full produktbackground">
    <!-- Content Container von Willkommen (exklusive Navbar) bis exklusive Footer-->

    <div class="font-willkommen pt-5 px-1 mb-10 text-center z-index:100">
      <!-- custom font konfiguriert in tailwind.config.js-->
      <!-- Hier noch Background-Pic oder Video rein -->
      <div class="ueberschriftprodukte textshadow-markant">
        Farbzonen-Übersicht
        <div
          class="
            hidden
            hmbp:block
            mb-5
            text-xs
            px-4
            pt-4
            ssm:text-sm
            btnbp:text-xl
            btnbp:pt-6
            btnbp:px-12
            text-gray-300 text-center
            produktdescriptionbp:px-14
          "
        >
          Damit Sie einen besseren Überblick über unsere Aussteller und deren
          Position am Markt bekommen, ist jedem Aussteller eine Zonenfarbe
          zugewiesen. Sie sehen hier die gekennzeichneten Farbzonen anhand einer
          eingebetteten Google-Maps-Karte. Falls Sie einen bestimmten Aussteller
          suchen, navigieren Sie bitte zurück zur Homepage und drücken auf
          Aussteller. <br /><br />Sie sehen dann die jeweilige Farbzone, in
          welcher sich der jeweilige Aussteller befindet. Am Besten folgen Sie
          den mit Farbe gekennzeichneten Schildern am Markt.
        </div>
        <!-- end willkommenstexte -->
      </div>
    </div>
    <!-- end willkommen -->
    <div class="flex justify-center items-center">
      <iframe
        src="https://www.google.com/maps/d/embed?mid=13qNnDIQECR3-pZ3-vK39FNUhoY7M-qD1"
        width="640"
        height="480"
      ></iframe>
    </div>

    <div class="buttonContainer flex flex-col justify-end pb-4 mt-10">
      <!--Buttons mit Custom Props-->
      <router-link to="/app">
        <Button
          svg-source="/../../images/icons/svgs/home.svg"
          button-inhalt="Home"
          button-color="bg-green-400"
          on-hover="hover:bg-white"
        ></Button>
      </router-link>
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
      name: "Karte",

      titleMessage:
        "Weitreichende Produktpalette bei den Haiminger Markttagen!",
      smallDescription:
        "Die Besucher der Haiminger Markttage sollen die Vielfalt der heimischen, bäuerlichen Produkte erleben. Die Angebotspalette unserer Aussteller ist daher breit gefächert:",
    };
  },
  components: { Button },
};
</script>

<style scoped>
.text {
  padding: 20px 20px;
}

.text h3 {
  text-transform: uppercase;
}

.produktbackground {
  background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.1)),
    url("/images/background/produktbackground.svg");
  background-repeat: no-repeat;
  background-position: 50% 50%;
  height: 100%;
  width: 100%;
  background-size: cover;
  opacity: 90%;
}
</style>