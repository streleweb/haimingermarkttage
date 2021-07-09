<template>
  <div class="fotogaleriecontentcontainer">
    <foto-app></foto-app>
  </div>
</template>

<script>
import Button from "./Button";
import FotoApp from "../components/Fotoslidergalerie/FotoApp.vue";

export default {
  data() {
    return {
      /*ausstellerfotos: [],*/
    };
  },
  //wenn Component geladen ist, führe die Methoden zum
  //Laden der Aussteller und Ausstellerfotos via Axios Request aus

  components: { Button, FotoApp },
};
</script>
