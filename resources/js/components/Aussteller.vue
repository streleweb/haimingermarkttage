<template>
  <div class="ausstellercontainer font-willkommen text-center text-white">
    <!-- custom font konfiguriert in tailwind.config.js-->
    <!-- Hier noch Background-Pic oder Video rein -->
    <div class="text-5xl font-s">
      <p>Unsere heurigen Aussteller</p>
      <!-- end willkommenstexte -->
    </div>

    <div
      class="listofaussteller grid grid-flow-row grid-rows-4 lg:grid-flow-col lg:grid-cols-3 gap-3"
    >
      <ul v-for="jeweiligerAussteller in aussteller" class="">
        <li class="border rounded-lg">
          <a
            :href="jeweiligerAussteller.aussteller_websiteurl"
            class="text-4xl"
            >{{ jeweiligerAussteller.aussteller_fullname }}</a
          >
          <p>{{ jeweiligerAussteller.aussteller_beschreibung }}</p>

          <Farbzone
            :class="jeweiligerAussteller.aussteller_zonenfarbe"
          ></Farbzone>
        </li>
      </ul>
    </div>
    <!-- end willkommen -->
    <div class="flex">
      <!--Buttons mit Custom Props-->
      <router-link to="/app">
        <Button
          button-inhalt="Back to Homescreen"
          button-color="bg-green-400"
          on-hover="hover:bg-yellow-200"
        ></Button>
      </router-link>

      <router-link to="/app/ausstelleranlegen">
        <Button
          button-inhalt="Aussteller anlegen"
          button-color="bg-green-400"
          on-hover="hover:bg-yellow-50"
        ></Button>
      </router-link>
    </div>
    <!-- end buttoncontainer -->
  </div>
</template>

<script>
import Button from "./Button";
import Farbzone from "./Farbzone";

export default {
  data() {
    return {
      aussteller: [],
      ausstellerfotos: [],
    };
  },
  //wenn Component geladen ist, führe die Methoden zum
  //Laden der Aussteller und Ausstellerfotos via Axios Request aus
  mounted() {
    this.loadAussteller();
    this.loadAusstellerfoto();
  },

  methods: {
    loadAussteller: function () {
      axios
        .get("/api/aussteller") // load API
        .then((response) => {
          this.aussteller = response.data.data; // 1. data = axios syntax, 2. data = das Property "data" innerhalb der JSON response
        }) // assign to this.aussteller array
        .catch(function (error) {
          // Fehlerbehandlung
          console.log(error);
        });
    },

    loadAusstellerfoto: function () {
      axios
        .get("/api/ausstellerfoto") // load API
        .then((response) => {
          this.ausstellerfotos = response.data.data; // 1. data = axios syntax, 2. data = das Property "data" innerhalb der JSON response
        }) // assign to this.aussteller array
        .catch(function (error) {
          // Fehlerbehandlung
          console.log(error);
        });
    },
  },
  components: { Button, Farbzone },
};
</script>
