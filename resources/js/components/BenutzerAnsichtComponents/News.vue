<template>
  <div class="newsgradient">
    <div class="newscontainer">
      <!-- custom font konfiguriert in tailwind.config.js-->
      <div class="titletext ueberschrift mb-7 w-full textshadow-markant">
        <p>News</p>
      </div>
      <p v-if="loading">
        <img src="/images/icons/gifs/loadingtransparent.gif" alt="loading..." class="mt-20 z-50" />
      </p>

      <div class="grid grid-cols-1 gap-20 items-center w-full">
        <article v-for="(jeweiligeNews, index) in news" :key="index"
          class="articlestyling mx-auto overflow-hidden w-full">
          <img v-if="imageUrlNotEmpty(index)" :src="imgUrl(index)" alt=""
            class="border border-green-900 shadow-md maximum50vh object-cover" />

          <div class="text text-lg font-willkommen lg:text-2xl">
            <h3 class="font-bold leading-5 text-gray-800">
              {{ jeweiligeNews.news_titel }}
            </h3>
            <h6 class="font-semibold text-xs text-gray-700 mb-4">
              Vom {{ jeweiligeNews.created_at }}
            </h6>
            <p class="text-base text-justify lg:text-xl mb-2">
              {{ jeweiligeNews.news_textfeld }}
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
    title: 'News'
  },
  data() {
    return {
      news: [],
      loading: false,
    };
  },
  //wenn Component created ist, führe die Methoden zum
  //Laden der Aussteller und Ausstellerfotos via Axios Request aus
  created() {
    this.loading = true;
    this.loadNews();
    this.loading = false;
    /*this.loadAusstellerfoto();*/
  },

  methods: {
    changeTimeFormat() {
      for (let i = 0; i < this.news.length; i++) {
        let dateOfNews = this.news[i].created_at;
        let splitItUp = dateOfNews.split("T"); //Carbon return splittable at T
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
        this.news[i].created_at = addPoints;
      }
    },
    loadNews() {
      this.loading = true;
      axios
        .get("/api/news")
        .then((response) => {
          //console.log("Debug status:" + response.status);
          if (response.status == 200) {
            this.news = sortMostRecentFirst(response.data.data); // 1. data = axios syntax, 2. data = das Property "data" innerhalb der JSON response
            this.loading = false;
            this.changeTimeFormat();
            if (this.news.length <= 0) {
              Swal.fire({
                title: "Momentan gibt es keine Neuigkeiten!",
                heightAuto: false,
                text: "Schauen Sie in Kürze wieder vorbei...",
                confirmButtonText: "ok",
                confirmButtonColor: "#3cb371",
              });
            }
          } else {
            Swal.fire({
              title: "Konnte News nicht aus der DB laden!",
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
        return "/images/aussteller/" + this.news[index].news_bild_url;
      } catch (error) {
        console.log(error);
      }
    },

    webUrl(index) {
      let http = "http://";
      return http + this.news[index].news_bild_url;
    },

    imageUrlNotEmpty(index) {
      return (
        this.news[index].news_bild_url != null &&
        this.news[index].news_bild_url != ""
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
}

article img {
  max-width: 50%;
  margin-top: 1rem;
  margin-bottom: 1rem;
  margin-left: auto;
  margin-right: auto;
  z-index: 1;
}

.text {
  padding: 0 20px 20px;
}

.newsgradient {
  background-image: linear-gradient(to bottom, #536976, #292e49);
  background-repeat: no-repeat;
  background-size: cover;

  background: linear-gradient(rgba(90, 65, 42, 0.342), rgba(65, 65, 65, 0.3)),
    url("/images/background/hb1.webp");
  background-repeat: no-repeat;
  width: 100%;
  min-height: 100%;
  background-size: cover;
}

.maximum50vh {
  max-height: 50vh;
}
</style>
