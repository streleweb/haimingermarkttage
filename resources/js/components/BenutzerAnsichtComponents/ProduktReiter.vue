<template>
  <div class="max-w-full produktbackground">
    <!-- Content Container von Willkommen (exklusive Navbar) bis exklusive Footer-->

    <div class="font-willkommen pt-5 px-2 md:px-1 mb-10 text-center z-index:100">
      <!-- custom font konfiguriert in tailwind.config.js-->
      <!-- Hier noch Background-Pic oder Video rein -->
      <div class="ueberschriftprodukte textshadow-markant">
        {{ titleMessage }}
        <div class="
                    hidden
                    hmbp:block
                    mb-5
                    text-base
                    px-4
                    pt-4
                    btnbp:text-2xl btnbp:pt-6 btnbp:px-12
                    text-gray-300 text-center
                    produktdescriptionbp:px-14
                  ">
          {{ smallDescription }}
        </div>
        <!-- end willkommenstexte -->
      </div>
    </div>
    <!-- end willkommen -->

    <div class="
                grid grid-cols-1
                produktreiterbp:grid-cols-2
                xl:grid-cols-3
                gap-6
                m-auto
                max-w-full
              ">
      <article v-for="(produktart, index) in produktarten" :key="index" @click="goToPage(produktart.produktartTitel)"
        class="articlestyling mx-auto overflow-hidden w-52 ssm:w-72 md:w-96">
        <img :src="produktart.imgUrl" alt="" class="border-b border-gray-800 produktecardshadow" />

        <div class="text text-center text-lg">
          <h3 class="font-bold font-willkommen text-gray-800 mb-3 lg:mt-1">
            {{ produktart.produktartTitel }}
          </h3>
          <p class="text-base font-willkommen lg:text-base mb-2">
            {{ produktart.produktartBeschreibung }}
          </p>
        </div>
      </article>
    </div>
    <!-- end gridcontainer-->

    <div class="buttonContainer flex flex-col justify-end pb-4 mt-10">
      <!--Buttons mit Custom Props-->
      <router-link to="/" exact>
        <Button svg-source="/../../images/icons/svgs/home.svg" button-inhalt="Home" button-color="bg-green-400"
          on-hover="hover:bg-white"></Button>
      </router-link>
    </div>
    <!-- end buttoncontainer -->
  </div>
  <!-- end root element -->
</template>

<script>
import Button from "./Button";

export default {
  metaInfo: {
    title: 'Produktreiter'
  },
  data() {
    return {
      name: "ProduktReiter",
      produktarten: [
        {
          produktartTitel: "Lebensmittel",
          imgUrl: "/images/produkte/apples.jpg",
          produktartBeschreibung:
            "Obst, Gemüse, Wein, Getreide, Fleischwaren, Käse, Säfte, Süßigkeiten und vieles mehr...",
        },
        {
          produktartTitel: "Gastronomie",
          imgUrl: "/images/produkte/gastronomie.jpg",
          produktartBeschreibung:
            "Unsere Gastronomen freuen sich schon auf Sie!",
        },
        {
          produktartTitel: "Handwerk",
          imgUrl: "/images/produkte/handwerk.jpg",
          produktartBeschreibung:
            "Fassbinderei, Schafwollprodukte, Mützen, Drechselwaren, Keramik, Drechselwaren, Körbe...",
        },
        {
          produktartTitel: "Textil",
          imgUrl: "/images/produkte/textil.jpg",
          produktartBeschreibung:
            "Bekleidungsartikel, Stickereien, Taschen, Rucksäcke, Lederwaren, Nähsachen, Tücher...",
        },
        {
          produktartTitel: "Allerlei",
          imgUrl: "/images/produkte/allerlei.jpg",
          produktartBeschreibung:
            "Blumen, Spielwaren, Kaffee, Kuchen, Dekoartikel, Musikträger, Mineralien, Geschenksartikel, Bänder, Seifen, Cremes...",
        },
      ],
      titleMessage:
        "Weitreichende Produktpalette bei den Haiminger Markttagen!",
      smallDescription:
        "Die Besucher der Haiminger Markttage sollen die Vielfalt der heimischen, bäuerlichen Produkte erleben. Die Angebotspalette unserer Aussteller ist daher breit gefächert:",
    };
  },
  components: { Button },
  methods: {
    goToPage(produktartTitel) {
      this.$router.push({ name: produktartTitel });
    },
  },
};
</script>

<style scoped>
.articlestyling {
  background: #eee5e9;
  border: none;
  box-shadow: 4px 4px 8px 0px rgba(0, 0, 0, 0.3);
  border-radius: 20px;
  text-align: center;
  transition: transform 0.3s;
  cursor: pointer;
  z-index: 1;
}

article:hover {
  transform: translateY(5px);
  box-shadow: 4px 4px 30px 0px rgba(0, 0, 0, 0.3);
  /*Shadow bewegt sich mit nach unten*/
}

article img {
  @apply mx-auto;
  width: 100%;
  border-radius: 20px 0 0 0;
  z-index: 1;
}

.text {
  padding: 8px 20px 20px;
}

.text h3 {
  text-transform: uppercase;
}

.produktbackground {
  background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.1)),
    url("/images/background/produktbackground.svg");
  background-repeat: no-repeat;
  /*background-position: 50% 50%;*/
  width: 100%;
  min-height: 100%;
  background-size: cover;
  opacity: 90%;
}
</style>
