<template>
  <div class="pagenotfoundcontainer titletextpagenotfound">
    <!-- custom font konfiguriert in tailwind.config.js-->
    <!-- Hier noch Background-Pic oder Video rein -->
    <div class="ueberschrift">
      <p>Diese Seite exisitiert nicht!</p>
      <div class="descriptiontext">
        <p>
          Bitte geben Sie eine richtige URL ein, oder drücken Sie den Button, um
          zum Home-Screen zu gelangen!
        </p>
      </div>
      <!-- end willkommenstexte -->
    </div>
    <!-- end willkommen -->

    <!--Buttons mit Custom Props-->
    <a href="http://app.haiminger-markttage.at">
      <Button
        svg-source="/../../images/icons/svgs/home.svg"
        button-inhalt="Home"
        button-color="bg-green-400"
        on-hover="hover:bg-white"
      ></Button>
    </a>
  </div>
</template>


<script>
import Button from "./Button";

export default {
  data() {
    return {
      name: "PageNotFound",
    };
  },
  components: { Button },
};
</script>

<style>
</style>