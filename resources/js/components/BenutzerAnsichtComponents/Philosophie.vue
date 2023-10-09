<template>
  <div class="philosophiecontentcontainer">
    <div class="
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
      ">
      <div class="
          text-white
          sm:mb-5
          mt-7
          text-xl
          iphone6:text-3xl
          sm:text-3xl
          md:text-5xl
          lg:text-5xl
          font-s
        ">
        <h1>{{ titleMessage }}</h1>
        <div class="
            text-gray-100 text-xs
            sssm:text-base
            text-justify
            pt-4
            sssm:px-4
            sm:px-10
            sm:pb-0
            md:px-20
            md:text-xl
            lg:mt-10
            lg:px-40
            lg:text-2xl
            font-thin
            bg
          ">

          <div class="grid grid-cols-1 xl:grid-cols-2 gap-20 items">
            <div id="philtext1">Im Jahr 1987 entstand die Idee, eine bäuerliche Vermarktungsstruktur in Haiming zu
              etablieren. Die
              Initiatoren Anton Raffl, Ewald Höpperger und Altbürgermeister Wilfried Stigger erarbeiteten ein Konzept für
              die ersten „Haiminger Markttage“.
              Am Vorabend des 10. Oktobers 1987, der als erster Haiminger Markttag in die Geschichte des Dorfes einging,
              wurde bis weit nach Mitternacht gemeinsam gearbeitet, vorbereitet und auch gebangt, was den Verlauf dieser
              Veranstaltung anging. Auf insgesamt 12 Marktständen verkauften die Haiminger Bauern und einige Haiminger
              Unternehmer ihre Produkte. Der Andrang auf diesen ersten Erntemarkt war dermaßen überwältigend, dass die
              Obstbauern bereits um 11 Uhr ausverkauft waren.
            </div>
            <div id="philimg1" class="flex flex-col justify-end">
              <img class="border-white border-2" alt="Markttage 1987" src="/images/philosophie/1987.jpg">
              <div class="text-gray-50 text-sm pt-2 text-center opacity-60">Erster Markttag 1987</div>
            </div>
          </div>
          <div id="philtext2" class="pt-10 mb-10">
            Dieser durchschlagende Erfolg hat aufgezeigt, welche Möglichkeiten für die Vermarktung regionaler bäuerlicher
            Erzeugnisse bestehen.
            Die Haiminger Bauern waren die ersten in Tirol, die landwirtschaftliche Produkte nach marktwirtschaftlichen
            Kriterien herstellten und vertrieben.
          </div>

          <div class="grid grid-cols-1 xl:grid-cols-2 gap-20 pt-10 mb-20">
            <div id="philimg2">
              <img class="border-white border-2" alt="Markttage 1987" src="/images/philosophie/eingang.jpg">
              <div class="text-gray-50 text-sm pt-2 text-center opacity-60">Eingang Haiminger Markttage
              </div>
            </div>
            <div id="philtext3">Die Faszination der Haiminger Markttage ist nach wie vor außerordentlich. Seit 1987
              strömen jedes Jahr am zweiten und dritten Oktobersamstag tausende Marktbesucher ins Tiroler Oberland.
              Erntefrische Produkte locken mit Qualität und Frische nach Haiming. Gut 85 Aussteller präsentieren mitten im
              Dorf erlesene jahreszeitliche Produkte aus der Region.
            </div>

            <div id="philtext3">Tirols größter Erntemarkt präsentiert sich
              mittlerweile als Tirols längste Schmankerlmeile. Im Zentrum des Angebotes sind zahllose bäuerliche
              Spezialitäten, darunter die Haiminger Äpfel in all ihren Facetten von der Frucht bis zu Säften.
            </div>
            <div id="philimg3" class="flex flex-col justify-end">
              <img class="border-white border-2" alt="Markttage 1987" src="/images/philosophie/verkostung.jpg">
              <div class="text-gray-50 text-sm pt-2 text-center opacity-60">Verkostung an den Markttagen</div>
            </div>


          </div>
          <div class="flex justify-center">
            <div id="philimg5" class="max-w-8xl">
              <img class="border-white border-2" alt="Markttage 1987" src="/images/philosophie/1990.jpg">
              <div class="text-gray-50 text-sm pt-2 text-center opacity-60">90er Jahre - Äpfelanlieferung Dieter Wegleiter
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="buttonContainer flex flex-col flex-shrink md:flex-grow mb-2">
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
import Button from "../ReusableComponents/Button";

export default {
  metaInfo: {
    title: 'Philosophie'
  },
  data() {
    return {
      name: "Philosophie",
      titleMessage: "Philosophie Haiminger Markttage",
      description:
        ` `
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
