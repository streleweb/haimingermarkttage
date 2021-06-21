<template>
  <div class="homecontentcontainer">
    <!-- Content Container von Willkommen (exklusive Navbar) bis exklusive Footer-->

    <div
      class="
        font-willkommen
        flex-shrink
        pt-5
        px-1
        pb-4
        flex-grow
        text-center
        z-index:
        100;
      "
    >
      <!-- custom font konfiguriert in tailwind.config.js-->
      <!-- Hier noch Background-Pic oder Video rein -->
      <div class="ueberschriftprodukte textshadow-markant">
        {{ titleMessage }}
        <div
          class="
            hidden
            hmbp:block
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
          v-for="(jeweiligesImg, index) in images"
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


    <div
      class="
        buttonContainer
        flex flex-col
        justify-end
        pb-4
        flex-shrink flex-grow
      "
    >
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

<style>
</style>