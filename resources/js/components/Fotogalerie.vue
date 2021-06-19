<template>
  <div class="fotogaleriecontentcontainer">
    <!-- custom font konfiguriert in tailwind.config.js-->
    <!-- Hier noch Background-Pic oder Video rein -->
    <div class="titletext ueberschrift">
      <p>Fotogalerie</p>
      <!-- end willkommenstexte -->
      <CardList></CardList>
    </div>

    <!--
      <ul v-for="foto in fotos" class="">
        <li class="border rounded-lg">
          <p>{{ foto.fotogalerie_fotourl }}</p>
        </li>
      </ul>
    </div>
    
    <div class="flex">
  
      <router-link to="/app">
        <Button
          svg-source="/../../images/icons/svgs/home.svg"
          button-inhalt="Home"
          button-color="bg-green-400"
          on-hover="hover:bg-yellow-200"
        ></Button>
      </router-link>
    </div>-->
    <!-- end buttoncontainer -->
  </div>
</template>

<script>
import CardList from "./cards/CardList.vue";
import Button from "./Button";

export default {
  data() {
    return {
      /*ausstellerfotos: [],*/
    };
  },
  //wenn Component geladen ist, führe die Methoden zum
  //Laden der Aussteller und Ausstellerfotos via Axios Request aus

  components: { CardList, Button },
};
</script>
