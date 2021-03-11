<template>
  <div class="container font-willkommen">
    <!-- custom font konfiguriert in tailwind.config.js-->
    <!-- Hier noch Background-Pic oder Video rein -->
    <div class="text-white mb-20 mt-10 text-center text-5xl font-s">
      <p>Diese Seite exisitiert nicht!</p>
      <div class="text-gray-300 text-center mt-8 text-2xl font-thin bg">
        <p>
          Bitte geben Sie eine richtige URL ein, oder drücken Sie den Button, um
          zum Home-Screen zu gelangen!
        </p>
      </div>
      <!-- end willkommenstexte -->
    </div>
    <!-- end willkommen -->

    <!--Buttons mit Custom Props-->
    <router-link to="/app">
      <Button
        button-inhalt="Back to Home-Screen"
        button-color="bg-green-400"
        on-hover="hover:bg-white"
      ></Button>
    </router-link>
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