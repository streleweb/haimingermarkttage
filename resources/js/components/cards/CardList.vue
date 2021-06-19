
<!--<ul v-for="jeweiligerAussteller in aussteller" class="">
        <li class="border rounded-lg">
          <a
            :href="jeweiligerAussteller.aussteller_websiteurl"
            class="text-4xl"
            >{{ jeweiligerAussteller.aussteller_fullname }}</a
          >
          <p>{{ jeweiligerAussteller.aussteller_beschreibung }}</p>-->

<template>
  <div class="card-list">
    <ul>
      <li v-for="(foto, index) in fotos" :key="index">
        <Card :item="foto" :active="index == id"></Card>
      </li>
    </ul>
  </div>
</template>

<script>
import Card from "./Card.vue";
export default {
  data() {
    return {
      id: null,
      fotos: [],
    };
  },

  mounted() {
    this.loadFotos();
  },

  methods: {
    loadFotos: function () {
      axios
        .get("/api/fotogalerie") // load API
        .then((response) => {
          //Fehlerbehandlung einbauen, falls URL in DB nicht der Norm entspricht: Bildname.jpg  oder Bildname.png usw...
          //NICHT /Bildname. Auch DB-seitig überprüfen
          this.fotos = response.data.data;
          console.log(this.fotos);
          this.id = response.data.data.id; // 1. data = axios syntax, 2. data = das Property "data" innerhalb der JSON response
        }) // assign to this.aussteller array
        .catch(function (error) {
          // Fehlerbehandlung
          console.log(error);
        });
    },
  },

  components: { Card },
};
</script>

<style>
</style>