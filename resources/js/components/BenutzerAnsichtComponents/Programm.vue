<template>
  <div class="programmgradient">
    <div class="programmcontainer">
      <!-- custom font konfiguriert in tailwind.config.js-->
      <!-- Hier noch Background-Pic oder Video rein -->
      <div class="titletext ueberschrift mb-7 w-full textshadow-markant">
        <p>Programm</p>
        <!-- end willkommenstexte -->
      </div>
      <p v-if="loading">
        <img src="/images/icons/gifs/loadingtransparent.gif" alt="loading..." class="mt-20 mx-auto z-50" />
      </p>

      <div class="grid grid-cols-1 gap-20 items-center w-full">
        <article v-for="(jeweiligesProgramm, index) in programmArray" :key="index" class="
              grid grid-cols-1
              newsbp:grid-cols-2
              gap-1
              articlestyling
              mx-auto
              overflow-hidden
              w-full
            ">
          <img v-if="imageUrlNotEmpty(index)" :src="imgUrl(index)" alt=""
            class="border border-green-900 shadow-md self-center" />

          <div class="text text-lg text-left font-willkommen leading-5 lg:text-2xl mt-5 mb-5">
            <h3 class="font-bold text-gray-800 ">
              {{ jeweiligesProgramm.programm_titel }}
            </h3>
            <h6 class="font-semibold text-xs text-gray-700 mb-4">
              Geschrieben am {{ jeweiligesProgramm.created_at }}
            </h6>
            <p class="text-base text-justify lg:text-xl mb-2">
              {{ jeweiligesProgramm.programm_beschreibung }}
            </p>
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
import Button from "../ReusableComponents/Button";
import Farbzone from "../ReusableComponents/Farbzone";
import Swal from "sweetalert2";
import { sortMostRecentFirst } from '../../utilityfunctions/utils'

export default {
  metaInfo: {
    title: 'Programm'
  },
  data() {
    return {
      loading: false,
      programmArray: [],
    };
  },

  created() {
    this.loading = true;
    this.loadProgammData();
    this.loading = false;
  },

  methods: {
    changeTimeFormat() {
      for (let i = 0; i < this.programmArray.length; i++) {
        let dateOfProgrammPost = this.programmArray[i].created_at;
        let splitItUp = dateOfProgrammPost.split("T"); //Carbon return splittable at T
        let first = splitItUp[0];
        let splitted = first.split("-");
        let reversed = splitted.reverse();
        let joinItAgain = reversed.join("");
        let addPoints =
          joinItAgain.substring(0, 2) +
          "." +
          joinItAgain.substring(2, 4) +
          "." +
          joinItAgain.substring(4, joinItAgain.length);
        //console.log(addPoints);
        this.programmArray[i].created_at = addPoints;
      }
    },
    loadProgammData() {
      axios
        .get("/api/programm")
        .then((response) => {
          //console.log("Debug status:" + response.status);
          if (response.status == 200) {
            this.programmArray = sortMostRecentFirst(response.data.data); // 1. data = axios syntax, 2. data = das Property "data" innerhalb der JSON response

            this.changeTimeFormat();
            if (this.programmArray.length <= 0) {
              Swal.fire({
                title: "Momentan gibt es keine Programminfos!",
                heightAuto: false,
                text: "Schauen Sie in Kürze wieder vorbei...",
                confirmButtonText: "ok",
                confirmButtonColor: "#3cb371",
              });
            }
          } else {
            Swal.fire({
              title: "Konnte Programminfos nicht aus der DB laden!",
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
          "/images/aussteller/" + this.programmArray[index].programm_bild_url
        );
      } catch (error) {
        console.log(error);
      }
    },

    webUrl(index) {
      let http = "http://";
      return http + this.programmArray[index].programm_bild_url;
    },

    imageUrlNotEmpty(index) {
      return (
        this.programmArray[index].programm_bild_url != null &&
        this.programmArray[index].programm_bild_url != ""
      );
    },
  },

  components: { Button, Farbzone },
};
</script>

<style scoped>
.articlestyling {
  background: #eee5e9;
  border: white;
  box-shadow: 4px 4px 8px 0px rgba(0, 0, 0, 0.3);
  border-radius: 0.4rem;
  text-align: center;
  width: 80%;
  transition: transform 0.3s;
  z-index: 1;
}

article:hover {
  transform: translateY(5px);
  box-shadow: 4px 4px 30px 0px rgba(0, 0, 0, 0.3);
  /*Shadow bewegt sich mit nach unten*/
}

article img {
  max-width: 90%;
  margin: 8px auto;
  border-radius: 0;
  z-index: 1;
  box-shadow: 4px 4px 8px 0px rgba(0, 0, 0, 0.3);
}

.text {
  padding: 0 20px 20px;
}

.programmgradient {
  background-image: linear-gradient(to bottom, #536976, #292e49);
  background-repeat: no-repeat;
  /*background-size: cover;*/

  background: linear-gradient(rgba(90, 65, 42, 0.342), rgba(65, 65, 65, 0.3)),
    url("/images/background/hb1.webp");
  background-repeat: no-repeat;
  /*background-position: 50% 50%;*/
  width: 100%;
  min-height: 100%;
  background-size: cover;
}
</style>
