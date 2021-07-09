<template>
  <div class="philosophiecontentcontainer">
    <!-- Content Container von Willkommen (exklusive Navbar) bis exklusive Footer-->

    <div
      class="
        willkommen
        font-willkommen
        flex-shrink
        mt-2
        pr-2
        pl-2
        mb-4
        md:flex-grow
        md:mt-5
        text-center
      "
    >
      <!-- custom font konfiguriert in tailwind.config.js-->
      <!-- Hier noch Background-Pic oder Video rein -->
      <div
        class="
          text-white
          sm:mb-5
          text-xl
          iphone6:text-3xl
          sm:text-3xl
          md:text-5xl
          lg:text-5xl
          font-s
        "
      >
        {{ titleMessage }}
        <div
          class="
            text-gray-100 text-xs
            sssm:text-base
            text-justify
            pt-4
            sssm:px-4
            sm:px-10
            sm:pb-0
            md:px-20
            md:text-xl
            lg:mt-8
            lg:px-40
            lg:text-2xl
            font-thin
            bg
          "
        >
          {{ description }}
        </div>
        <!-- end willkommenstexte -->
      </div>
    </div>
    <!-- end willkommen -->

    <div class="buttonContainer flex flex-col flex-shrink md:flex-grow mb-2">
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
      name: "Philosophie",
      titleMessage: "Geschichte der Haiminger Markttage",
      description:
        "Im Jahr 1987 entstand die Idee eine bäuerliche Vermarktungsstruktur zu etablieren. Die Initiatoren Anton Raffl, Ewald Höpperger und der verstorbene Altbürgermeister Wilfried Stigger erarbeiteten ein Konzept für die ersten Haiminger Markttage. " +
        "Am Vorabend des 10. Oktobers 1987, der als erster Haiminger Markttag in die Geschichte des Dorfes einging, wurde bis weit nach Mitternacht gemeinsam gearbeitet, vorbereitet und auch gebangt, was den Verlauf dieser Veranstaltung anging. Auf insgesamt 12 Marktständen verkauften die Haiminger Bauern und einige Haiminger Unternehmer ihre Produkte. Der Andrang auf diesen ersten Erntemarkt war dermaßen überwältigend, dass die Obstbauern bereits um 11 Uhr ausverkauft waren. " +
        "Dieser durchschlagende Erfolg hat aufgezeigt, welche Möglichkeiten für die Vermarktung regionaler bäuerlicher Erzeugnisse bestehen. Die Haiminger Bauern waren die ersten in Tirol, die landwirtschaftliche Produkte nach marktwirtschaftlichen Kriterien herstellten und vertrieben. Im Laufe der Jahre erlebten die Haiminger Markttage unter Obmann Hubert Wammes ein stetiges Wachstum. Mittlerweile kann man bei über 80 Anbietern deren Produkte erwerben. " +
        "Die Haiminger Markttage haben zum Ziel, den Direktverkauf regionaler bäuerlicher Produkte von hoher Qualität zu unterstützen und so den Erzeugern nachhaltige, marktgerechte Preise zu sichern. " +
        "So konnten nicht nur Endverbraucher, sondern auch Supermarktketten, wie Spar, MPreis oder Billa von der Qualität heimischer Produkte überzeugt werden. ",
    };
  },
  components: { Button },
};
</script>

<style>
#kontaktinfo {
  opacity: 80%;
}
</style>