<template>
  <div class="ausstellergradient">
    <div class="ausstellercontainer">
      <p v-if="loading">
        <img src="/images/icons/gifs/loadingtransparent.gif" alt="loading..." class="mt-40 mx-auto z-50" />
      </p>
      <!-- custom font konfiguriert in tailwind.config.js-->
      <!-- Hier noch Background-Pic oder Video rein -->
      <div class="titletext ueberschrift mb-7 w-full textshadow-markant">
        <p>Unsere heurigen Aussteller</p>
        <!-- end willkommenstexte -->
      </div>

      <div class="
                  grid grid-cols-1
                  sm:grid-cols-2
                  lg:grid-cols-3
                  gap-8
                  items-center
                  w-full
                ">
        <article v-for="(jeweiligerAussteller, index) in aussteller" :key="index"
          class="articlestyling mx-auto overflow-hidden w-full">
          <img v-if="imageUrlNotEmpty(index)" :src="imgUrl(index)" alt="" class="border-b-2 border-yellow-50" />
          <img v-else src="/images/icons/svgs/aussteller.svg" alt="Ausstellerfoto" class="
                      filter-white
                      bg-gray-50 bg-opacity-20
                      border-b-2 border-black
                    " />
          <div class="text text-center lg:text-lg">
            <h3 v-if="ausstellerBrandingNameNotEmpty(index)" class="font-bold text-gray-800 mb-1">
              {{ jeweiligerAussteller.aussteller_brandingname }}
            </h3>
            <h2 class="font-semibold text-gray-700 mb-2">
              {{ jeweiligerAussteller.aussteller_fullname }}
            </h2>
            <p class="text-sm lg:text-base mb-2">
              {{ jeweiligerAussteller.aussteller_beschreibung }}
            </p>
            <div v-if="webUrlNotEmpty(index) ||
              ausstellerEmailNotEmpty(index) ||
              zonenFarbeNotEmpty(index)
              " class="
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
                      ">
              <ul class="inline-flex gap-2 justify-center items-center">
                <li v-if="webUrlNotEmpty(index)">
                  <a :href="webUrl(index)"><img src="/images/icons/svgs/www.svg" class="resize-icon filter-white-icons"
                      alt="website" /></a>
                </li>
                <li v-if="ausstellerEmailNotEmpty(index)">
                  <a :href="ausstellerEmail(index)" target="_newtab"><img src="/images/icons/svgs/email.png"
                      class="h-4 filter-white-icons" alt="website" /></a>
                </li>
                <!-- <a
                  href="https://www.google.com/maps/d/embed?mid=18zYJ568aZGAngWapMG2ZriZWZXYI-vI&ehbc=2E312F"
                > -->
                <router-link to="/karte">
                  <li v-if="zonenFarbeNotEmpty(index)" class="h-5 w-32">
                    <Farbzone :zonen-farbe="zonenFarbe(index)"></Farbzone>
                  </li>
                </router-link>
                <!-- </a> -->
              </ul>
            </div>
          </div>
        </article>
      </div>
    </div>
    <div class="flex justify-center mt-5 mb-5">
      <!--Buttons mit Custom Props-->
      <router-link to="/" exact>
        <Button svg-source="/../../images/icons/svgs/home.svg" button-inhalt="Home" button-color="bg-green-400"
          on-hover="hover:bg-yellow-200"></Button>
      </router-link>
    </div>
  </div>
</template>

<script>
import Button from "./Button";
import Farbzone from "./Farbzone";
import Swal from "sweetalert2";

export default {
  metaInfo: {
    title: 'Aussteller'
  },
  data() {
    return {
      aussteller: [],
      loading: false,
    };
  },
  //wenn Component created ist, führe die Methoden zum
  //Laden der Aussteller und Ausstellerfotos via Axios Request aus
  created() {
    this.loading = true;
    this.loadAussteller();
    this.loading = false;
    /*this.loadAusstellerfoto();*/
  },

  methods: {
    loadAussteller() {
      axios
        .get("/api/aussteller")
        .then((response) => {
          //console.log("Debug status:" + response.status);
          if (response.status == 200) {
            this.aussteller = response.data.data; // 1. data = axios syntax, 2. data = das Property "data" innerhalb der JSON response
            if (this.aussteller.length <= 0) {
              Swal.fire({
                title:
                  "Momentan befinden sich keine Aussteller in der Datenbank!",
                heightAuto: false,
                text: "Die Aussteller für das kommende Jahr werden in Kürze aktualisiert.",
                confirmButtonText: "ok",
                confirmButtonColor: "#3cb371",
              });
            }
          } else {
            Swal.fire({
              title: "Konnte Aussteller leider nicht aus der DB laden!",
              heightAuto: false,
              text: "Wir werden uns in Kürze darum kümmern.",
              confirmButtonText: "ok",
              confirmButtonColor: "#3cb371",
            });
          }
        })
        .catch((error) => {
          Swal.fire({
            title: "Konnte Connection zur DB nicht herstellen!",
            heightAuto: false,
            text: "Überprüfen Sie bitte Ihre Verbindung",
            confirmButtonText: "ok",
            confirmButtonColor: "#3cb371",
          });
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
      let http = "http://";
      return http + this.aussteller[index].aussteller_websiteurl;
    },

    imageUrlNotEmpty(index) {
      return (
        this.aussteller[index].aussteller_bildurl != null &&
        this.aussteller[index].aussteller_bildurl != ""
      );
    },

    webUrlNotEmpty(index) {
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

    ausstellerEmailNotEmpty(index) {
      return (
        this.aussteller[index].aussteller_email != null &&
        this.aussteller[index].aussteller_email != ""
      );
    },

    ausstellerEmail(index) {
      return "mailto:http://" + this.aussteller[index].aussteller_email;
    },

    ausstellerBrandingNameNotEmpty(index) {
      return (
        this.aussteller[index].aussteller_brandingname != null &&
        this.aussteller[index].aussteller_brandingname != ""
      );
    },
  },

  components: { Button, Farbzone },
};
</script>

<style scoped>
.articlestyling {
  background: #eee5e9;
  border: none;
  box-shadow: 4px 4px 8px 0px rgba(0, 0, 0, 0.3);
  border-radius: 20px;
  text-align: center;
  width: 250px;
  transition: transform 0.3s;
  z-index: 1;
}

article:hover {
  transform: translateY(5px);
  box-shadow: 4px 4px 30px 0px rgba(0, 0, 0, 0.3);
  /*Shadow bewegt sich mit nach unten*/
}

article img {
  width: 100%;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
  z-index: 1;
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

  background: linear-gradient(rgba(90, 65, 42, 0.342), rgba(65, 65, 65, 0.3)),
    url("/images/background/hb1.webp");
  background-repeat: no-repeat;
  /*background-position: 50% 50%;*/
  width: 100%;
  min-height: 100%;
  background-size: cover;
}
</style>
