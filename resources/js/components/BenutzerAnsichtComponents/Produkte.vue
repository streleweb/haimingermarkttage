<template>
  <div class="max-w-full produktbackground">
    <!-- Content Container von Willkommen (exklusive Navbar) bis exklusive Footer-->

    <div class="font-willkommen pt-5 px-1 mb-10 text-center z-index:100">
      <!-- custom font konfiguriert in tailwind.config.js-->
      <!-- Hier noch Background-Pic oder Video rein -->
      <div class="ueberschriftprodukte textshadow-markant">
        {{ titleMessage }}
        <div
          class="
            hidden
            hmbp:block
            mb-5
            text-xs
            px-4
            pt-4
            ssm:text-sm
            btnbp:text-xl
            btnbp:pt-6
            btnbp:px-12
            text-gray-300 text-center
            produktdescriptionbp:px-14
          "
        >
          {{ smallDescription }}
        </div>
        <!-- end willkommenstexte -->
      </div>
    </div>
    <!-- end willkommen -->

    <div
      class="
        grid grid-cols-1
        sm:grid-cols-2
        lg:grid-cols-3
        gap-6
        m-auto
        max-w-full
      "
    >
      <article
        v-for="(jeweiligesImg, index) in images"
        :key="index"
        class="articlestyling mx-auto overflow-hidden"
      >
        <img
          :src="jeweiligesImg.imgUrl"
          alt=""
          class="border-b border-gray-800 produktecardshadow"
        />

        <div class="text text-center lg:text-lg">
          <h3 class="font-bold text-gray-800 mb-2 mt-1">
            {{ jeweiligesImg.imgTitel }}
          </h3>
          <p class="text-sm lg:text-base mb-2">
            {{ jeweiligesImg.imgBeschreibung }}
          </p>
        </div>
      </article>
    </div>
    <!-- end gridcontainer-->

    <div class="buttonContainer flex flex-col justify-end pb-4 mt-10">
      <!--Buttons mit Custom Props-->
      <router-link to="/app">
        <Button
          svg-source="/../../images/icons/svgs/home.svg"
          button-inhalt="Home"
          button-color="bg-green-400"
          on-hover="hover:bg-white"
        ></Button>
      </router-link>
    </div>
    <!-- end buttoncontainer -->
  </div>
  <!-- end root element -->
</template>

<script>
import Button from "./Button";

export default {
  data() {
    return {
      name: "Produkte",
      images: [
        {
          imgTitel: "Äpfel und Apfelsaft",
          imgUrl: "/images/produkte/img_aepfel.jpg",
          imgBeschreibung:
            "Das Leitprodukt der Haiminger Markttage in vielen verschie­denen Sorten und einem ausgewogenen Geschmack von süß bis knackig säuerlich.",
        },
        {
          imgTitel: "Erdäpfel",
          imgUrl: "/images/produkte/img_erdaepfel.jpg",
          imgBeschreibung:
            "Egal ob mehlig oder fest-kochend, auf den Markttagen finden sich alle beliebten Erdäpfelsorten.",
        },
        {
          imgTitel: "Wein, Schnäpse u. Liköre",
          imgUrl: "/images/produkte/img_wein.jpg",
          imgBeschreibung:
            "Ein reiches Sortiment von Destillaten ausschließlich aus chemisch unbehandelten Früch­ten sowie gehaltvolle Weine - auch zum Verkosten.",
        },
        {
          imgTitel: "Gemüse und Obst",
          imgUrl: "/images/produkte/img_obst.jpg",
          imgBeschreibung:
            "Regionales Gemüse, Speise- aber auch Zierkürbisse, sowie fruchtiges Obst.",
        },
        {
          imgTitel: "Wurst- und Fleischwaren",
          imgUrl: "/images/produkte/img_wurst.jpg",
          imgBeschreibung:
            "Fleisch, Speck und Würste - wie es sich für eine zünftige Marend gehört.",
        },
        {
          imgTitel: "Käse",
          imgUrl: "/images/produkte/img_kaese.jpg",
          imgBeschreibung:
            "Verschiedenste Käsesorten aus Kuh-, Ziegen- und Schafsmilch.",
        },
        {
          imgTitel: "Brot, Getreide und Gebäck",
          imgUrl: "/images/produkte/img_brot.jpg",
          imgBeschreibung:
            "Fertige Brote oder aber auch Bio-Brotgetreide für's selber-backen.",
        },
        {
          imgTitel: "Honig und Marmeladen",
          imgUrl: "/images/produkte/img_marmelade.jpg",
          imgBeschreibung:
            "Süße Leckereien vom Beerengarten oder Produkte heimischer Imker.",
        },
        {
          imgTitel: "Tees und Gewürze",
          imgUrl: "/images/produkte/img_tee.jpg",
          imgBeschreibung:
            "Aromatische Gewürze und schmackhafte Tees verwöhnen jeden Gaumen.",
        },
        {
          imgTitel: "Blumen und Gestecke",
          imgUrl: "/images/produkte/img_blume.jpg",
          imgBeschreibung:
            "Florale Schmuckteile passend insbesondere für die Herbstzeit.",
        },
        {
          imgTitel: "Bekleidung",
          imgUrl: "/images/produkte/img_bekleidung.jpg",
          imgBeschreibung:
            "Sportbekleidung, Trachtenbe­kleidung, Mützen, Schals, Pat­schen uvm.",
        },
        {
          imgTitel: "Haushalts-, Geschenks- und Dekorationsartikel",
          imgUrl: "/images/produkte/img_deko.jpg",
          imgBeschreibung:
            "Glasartikel, Kerzen, Kosmetik, Heilprodukte - alles für Wohl­befinden und ein schönes Zuhause.",
        },
      ],
      titleMessage:
        "Weitreichende Produktpalette bei den Haiminger Markttagen!",
      smallDescription:
        "Die Besucher der Haiminger Markttage sollen die Vielfalt der heimischen, bäuerlichen Produkte erleben. Die Angebotspalette unserer Aussteller ist daher breit gefächert:",
    };
  },
  components: { Button },
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
  box-shadow: 4px 4px 30px 0px rgba(0, 0, 0, 0.3); /*Shadow bewegt sich mit nach unten*/
}

article img {
  @apply mx-auto mt-2;
  width: 130px;
  border-radius: 20px;
  z-index: 1;
}

.text {
  padding: 20px 20px;
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
  /*background-size: cover;*/
  opacity: 90%;
}
</style>