<template>
  <div class="datenschutzcontentcontainer">
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
        text-left
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
          text-center
        "
      >
        {{ titleMessage }}
        <div
          class="
            text-gray-100 text-base text-left
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
          Informationspflicht laut §5 E-Commerce Gesetz, §14
          Unternehmensgesetzbuch, §63 Gewerbeordnung und Offenlegungspflicht
          laut §25 Mediengesetz. <br /><br />

          <div class="text-lg md:text-3xl">Technische Umsetzung</div>
          <br />

          Frontend(VueJs, TailwindCSS) + Laravel-REST-API: Peter Strele <br />
          Datenbankimplementierung + Laravel-Sanctum-Authentifizierung:
          Christoph Lottersberger
          <br /><br />
          <div class="text-lg md:text-3xl">EU-Streitschlichtung</div>
          <br />
          Gemäß Verordnung über Online-Streitbeilegung in
          Verbraucherangelegenheiten (ODR-Verordnung) möchten wir Sie über die
          Online-Streitbeilegungsplattform (OS-Plattform) informieren.
          Verbraucher haben die Möglichkeit, Beschwerden an die Online
          Streitbeilegungsplattform der Europäischen Kommission unter
          <a href="http://ec.europa.eu/odr?tid=221103820"
            >http://ec.europa.eu/odr?tid=221103820</a
          >
          zu richten. Die dafür notwendigen Kontaktdaten finden Sie oberhalb in
          unserem Impressum. <br /><br />

          Wir möchten Sie jedoch darauf hinweisen, dass wir nicht bereit oder
          verpflichtet sind, an Streitbeilegungsverfahren vor einer
          Verbraucherschlichtungsstelle teilzunehmen. In der Regel werden
          Webserver-Logfiles zwei Wochen gespeichert und danach automatisch
          gelöscht. Wir geben diese Daten nicht weiter, können jedoch nicht
          ausschließen, dass diese Daten beim Vorliegen von rechtswidrigem
          Verhalten eingesehen werden. <br /><br />

          <div class="text-lg md:text-3xl">
            Haftung für Inhalte dieser Webapplikation
          </div>
          <br />

          Wir entwickeln die Inhalte dieser Webseite ständig weiter und bemühen
          uns korrekte und aktuelle Informationen bereitzustellen. Leider können
          wir keine Haftung für die Korrektheit aller Inhalte auf dieser
          Webseite übernehmen, speziell für jene die seitens Dritter
          bereitgestellt wurden. Sollten Ihnen problematische oder rechtswidrige
          Inhalte auffallen, bitten wir Sie uns umgehend zu kontaktieren, Sie
          finden die Kontaktdaten unter Kontakt, sowie am Ende dieser Seite.
          <br /><br />

          <div class="text-lg md:text-3xl">
            Haftung für Links in dieser Webapplikation
          </div>
          <br />Unsere Webseite enthält Links zu anderen Webseiten für deren
          Inhalt wir nicht verantwortlich sind. Haftung für verlinkte Websites
          besteht laut § 17 ECG für uns nicht, da wir keine Kenntnis
          rechtswidriger Tätigkeiten hatten und haben, uns solche
          Rechtswidrigkeiten auch bisher nicht aufgefallen sind und wir Links
          sofort entfernen würden, wenn uns Rechtswidrigkeiten bekannt werden.
          Wenn Ihnen rechtswidrige Links auf unserer Website auffallen, bitten
          wir Sie uns zu kontaktieren, Sie finden die Kontaktdaten im Impressum.

          <br /><br />

          <div class="text-lg md:text-3xl">Urheberrechtshinweis</div>
          <br />
          Bei allen genützten Icons, Buttons, Hintergrundbildern handelt es sich
          entweder um urheberrechtsfreie Daten, oder um individuell
          programmierte Elemente (Zum Beispiel Buttons..). Die restlichen
          Inhalte dieser Webseite (Bilder, Fotos, Texte, Videos) unterliegen dem
          Urheberrecht.
          <br /><br />

          <div class="text-lg md:text-3xl">Bildernachweis</div>
          <br />
          Die Bilder, Fotos und Grafiken auf dieser Webseite sind
          urheberrechtlich geschützt.
          <br /><br />

          Quelle: Erstellt mit dem Datenschutz Generator von firmenwebseiten.at
          in Kooperation mit wallentin.cc

          <br /><br />
          Sie erreichen uns unter folgenden Kontaktdaten:
        </div>
        <!-- end willkommenstexte -->
      </div>
    </div>
    <!-- end willkommen -->

    <ul
      id="kontaktinfo"
      class="
        text-white text-xs
        border-t border-b border-gray-800
        pb-1
        ssm:text-base
        grid
        justify-center
        items-center
        gap-1
        content-evenly
        bg-gray-600 bg-gradient-to-bl
        from-green-900
        to-gray-700
      "
    >
      <li class="justify-self-center">
        Erzeugerorganisation Oberinntalobst GmbH
      </li>
      <li class="justify-self-center">Wiesrainstraße 13</li>
      <li class="justify-self-center">A-6425 Haiming</li>
      <li class="justify-self-center">Tel.: +43 (0) 664 3408802</li>
      <li class="justify-self-center">Fax: +43 (0) 5266 88429</li>
      <li class="justify-self-center">
        E-Mail:
        <a
          href="mailto:info@haiminger-markttage.at,office@obstlager-haiming.at"
          target="_newtab"
          >office@obstlager-haiming.at<img
            src="/images/icons/svgs/email.svg"
            class="resize-icon filter-white-icons mx-auto"
            alt="email"
        /></a>
      </li>
      <li class="justify-self-center">
        Website:
        <a href="http://www.haiminger-markttage.at/"
          >haiminger-markttage.at<img
            src="/images/icons/svgs/www.svg"
            class="resize-icon filter-white-icons mx-auto"
            alt="website"
        /></a>
      </li>
      <li class="justify-self-center">
        Zum Kontaktformular:<a href="http://www.haiminger-markttage.at/kontakt/"
          ><img
            src="/images/icons/svgs/contact-form.svg"
            class="resize-icon filter-white-icons mx-auto"
            alt="website"
        /></a>
      </li>
    </ul>

    <div
      class="
        buttonContainer
        flex flex-col flex-shrink
        sm:pt-4
        md:flex-grow
        mt-2
        ssm:mt-4
        mb-2
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
import Button from "../Button";

export default {
  data() {
    return {
      name: "Impressum",
      titleMessage: "Impressum",
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