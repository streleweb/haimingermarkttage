<template>
  <div class="ausstellergradient">
    <div class="ausstellercontainer">
      <!-- custom font konfiguriert in tailwind.config.js-->
      <!-- Hier noch Background-Pic oder Video rein -->
      <div class="titletext ueberschrift mb-7 w-full textshadow-markant">
        <p>Unsere heurigen Aussteller</p>
        <!-- end willkommenstexte -->
      </div>

      <div
        class="
          grid grid-cols-1
          sm:grid-cols-2
          lg:grid-cols-3
          gap-8
          items-center
          w-full
        "
      >
        <!--listofaussteller
        grid grid-flow-row grid-rows-2 grid-cols-2
        lg:grid-flow-col lg:grid-cols-3
        gap-3-->
        <article
          v-for="(jeweiligerAussteller, index) in aussteller"
          :key="index"
          class="articlestyling mx-auto overflow-hidden w-full"
        >
          <img
            v-if="imageUrlNotEmpty(index)"
            :src="imgUrl(index)"
            alt=""
            class="border-b-2 border-yellow-50"
          />
          <img
            v-else
            src="/images/icons/svgs/aussteller.svg"
            alt="Ausstellerfoto"
            class="
              filter-white
              bg-gray-50 bg-opacity-20
              border-b-2 border-black
            "
          />
          <div class="text text-center lg:text-lg">
            <h3 class="font-bold text-gray-800 mb-2">
              {{ jeweiligerAussteller.aussteller_fullname }}
            </h3>
            <p class="text-sm lg:text-base mb-2">
              {{ jeweiligerAussteller.aussteller_beschreibung }}
            </p>
            <div
              class="
                bg-gray-800
                relative
                bottom-0
                left-0
                right-0
                h-10
                flex
                justify-center
                items-center
                rounded-lg
              "
            >
              <ul class="inline-flex gap-2 justify-center items-center">
                <li v-if="webUrlNotEmpty(index)">
                  <a :href="webUrl(index)"
                    ><img
                      src="/images/icons/svgs/www.svg"
                      class="resize-icon filter-white-icons"
                      alt="website"
                  /></a>
                </li>

                <li v-if="zonenFarbeNotEmpty(index)" class="h-5 w-32">
                  <Farbzone :zonen-farbe="zonenFarbe(index)"></Farbzone>
                </li>
              </ul>
            </div>
          </div>
          <!--<li class="border rounded-lg">
          <a
            :href="jeweiligerAussteller.aussteller_websiteurl"
            class="text-4xl"
            >{{ jeweiligerAussteller.aussteller_fullname }}</a
          >
          <p>{{ jeweiligerAussteller.aussteller_beschreibung }}</p>

          <Farbzone
            :class="jeweiligerAussteller.aussteller_zonenfarbe"
          ></Farbzone>
        </li>-->
        </article>

        <!-- end willkommen -->
      </div>

      <!--
      <router-link to="/app/ausstelleranlegen">
        <Button
          button-inhalt="Aussteller anlegen"
          button-color="bg-green-400"
          on-hover="hover:bg-yellow-50"
        ></Button>
      </router-link>
    </div>-->
      <!-- end buttoncontainer -->
    </div>
    <div class="flex justify-center mt-5 mb-5">
      <!--Buttons mit Custom Props-->
      <router-link to="/app">
        <Button
          svg-source="/../../images/icons/svgs/home.svg"
          button-inhalt="Home"
          button-color="bg-green-400"
          on-hover="hover:bg-yellow-200"
        ></Button>
      </router-link>
    </div>
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
  created() {
    this.loadAussteller();
    /*this.loadAusstellerfoto();*/
  },

  methods: {
    loadAussteller: function () {
      axios
        .get("/api/aussteller") // load API
        .then((response) => {
          this.aussteller = response.data.data; // 1. data = axios syntax, 2. data = das Property "data" innerhalb der JSON response
          console.log(this.aussteller);
        }) // assign to this.aussteller array
        .catch(function (error) {
          // Fehlerbehandlung
          console.log(error);
        });
    },

    imgUrl(index) {
      try {
        return (
          "/images/aussteller/" + this.aussteller[index].aussteller_bildurl
        );
      } catch (error) {
        console.log(error);
      }
    },

    webUrl(index) {
      return this.aussteller[index].aussteller_websiteurl;
    },

    webUrlNotEmpty(index) {
      return (
        this.aussteller[index].aussteller_bildurl != null &&
        this.aussteller[index].aussteller_bildurl != ""
      );
    },

    imageUrlNotEmpty(index) {
      return (
        this.aussteller[index].aussteller_websiteurl != null &&
        this.aussteller[index].aussteller_websiteurl != ""
      );
    },

    zonenFarbeNotEmpty(index) {
      return (
        this.aussteller[index].aussteller_zonenfarbe != null &&
        this.aussteller[index].aussteller_zonenfarbe != ""
      );
    },

    zonenFarbe(index) {
      return this.aussteller[index].aussteller_zonenfarbe;
    },
  },

  components: { Button, Farbzone },
};
</script>

<style scoped>
.articlestyling {
  background: #eee5e9;
  border: none;
  box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.3);
  border-radius: 20px;
  text-align: center;
  width: 250px;
  transition: transform 0.3s;
}

article:hover {
  transform: translateY(5px);
  box-shadow: 2px 2px 26px 0px rgba(0, 0, 0, 0.3); /*Shadow bewegt sich mit nach unten*/
}

article img {
  width: 100%;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
}

.text {
  padding: 0 20px 20px;
}

.text h3 {
  text-transform: uppercase;
}

.ausstellergradient {
  background-image: linear-gradient(to bottom, #536976, #292e49);
  background-repeat: no-repeat;
  background-size: cover;
}
</style>