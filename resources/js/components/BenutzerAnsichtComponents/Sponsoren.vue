<template>
  <div>
    <div class="produktbackground h-full flex flex-col w-full justify-evenly">
      <!-- Content Container von Willkommen (exklusive Navbar) bis exklusive Footer-->

      <div class="
          willkommen
          font-willkommen
          flex-shrink
          mt-2
          pr-2
          pl-2
          mb-1
          md:mt-5
          text-center
        ">
        <!-- custom font konfiguriert in tailwind.config.js-->
        <div class="
            text-white
            sm:mb-5
            text-xl
            iphone6:text-3xl
            sm:text-3xl
            md:text-5xl
            lg:text-5xl
            font-s
          ">
          {{ titleMessage }}
          <div class="
              text-gray-100 text-base
              flex
              justify-center
              items-center
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
            ">
            {{ contactDescription }}
          </div>
          <!-- end willkommenstexte -->
        </div>
      </div>
      <!-- end willkommen -->
      <div class="
          text-white
          grid grid-cols-1
          sm:grid-cols-2
          lg:grid-cols-3
          gap-6
          max-w-full
        ">
        <div class="
            sponsorencontainer
            flex flex-col
            justify-center
            items-center
            border-b border-gray-400
            sm:border-none
            text-center
          ">
          <img src="/images/partner/gemeindehaiming.jpg" alt="Gemeinde Haiming" class="pr-3 w-20 mb-1" />
          <h2><b>Gemeinde Haiming</b></h2>
          <br />
          Siedlungsstraße 2 <br />
          6425 Haiming
          <a href="www.haiming.tirol.gv.at">www.haiming.tirol.gv.at</a>
        </div>

        <div class="
            sponsorencontainer
            flex flex-col
            justify-center
            items-center
            border-b border-gray-400
            sm:border-none
            text-center
          ">
          <img src="/images/partner/raiffeisen.jpg" alt="Raiffeisenbank Silz-Haiming" class="pr-3 w-40 mb-1" />
          <h2><b>Raiffeisenbank Silz-Haiming u.U.</b></h2>
          <br />
          Tirolerstraße 78<br />
          6424 Silz
          <a href="www.raiba-silz.at">www.raiba-silz.at</a>
        </div>
        <div class="
            sponsorencontainer
            flex flex-col
            justify-center
            items-center
            border-b border-gray-400
            sm:border-none
            text-center
          ">
          <img src="/images/partner/oetztal.jpg" alt="Ötztal Tourismus" class="pr-3 w-30 mb-1" />
          <h2><b>Ötztal Tourismus</b></h2>
          <br />
          Siedlungsstraße 2<br />
          6425 Haiming
          <a href="www.oetztal.com">www.oetztal.com</a>
        </div>

        <div class="
            sponsorencontainer
            flex flex-col
            justify-center
            items-center
            border-b border-gray-400
            sm:border-none
            text-center
          ">
          <img src="/images/partner/agrarmarketing.jpg" alt="Agrarmarketing Tirol" class="pr-3 w-30 mb-1" />
          <h2><b>Agrarmarketing Tirol</b></h2>
          <br />
          Brixnerstraße 1/5<br />
          6020 Innsbruck
          <a href="www.amtirol.at">www.amtirol.at</a>
        </div>

        <div class="
            sponsorencontainer
            flex flex-col
            justify-center
            items-center
            border-b border-gray-400
            sm:border-none
            text-center
          ">
          <img src="/images/partner/genuss_region.jpg" alt="Genuss Region Österreich" class="pr-3 w-30 mb-1" />
          <h2><b>Genuss Region Österreich</b></h2>
          <br />
          Stubenring 1<br />
          1012 Wien
          <a href="www.genuss-region.at">www.genuss-region.at</a>
        </div>

        <div class="
            sponsorencontainer
            flex flex-col
            justify-center
            items-center
            border-b border-gray-400
            sm:border-none
            text-center
          ">
          <img src="/images/partner/oebb.jpg" alt="ÖBB" class="pr-3 w-35 mb-1" />
          <h2><b>ÖBB</b></h2>
          <br />
          Wagramer Straße 17-19<br />
          1220 Wien
          <a href="www.oebb.at">www.oebb.at</a>
        </div>

        <div class="
            sponsorencontainer
            flex flex-col
            justify-center
            items-center
            border-b border-gray-400
            sm:border-none
            text-center
          ">
          <img src="/images/partner/ffhaiming.jpg" alt="FF Haiming" class="pr-3 w-35 mb-1" />
          <h2><b>Freiwillige Feuerwehr Haiming</b></h2>
          <br />
          Rauthweg 2
          <br />
          6424 Haiming
          <a href="www.feuerwehr-haiming.at">www.feuerwehr-haiming.at</a>
        </div>
      </div>
      <!--ENDE-->

      <div class="
          buttonContainer
          flex flex-col flex-shrink
          sm:pt-4
          md:flex-grow
          mt-2
          ssm:mt-4
        ">
        <!--Buttons mit Custom Props-->
        <router-link to="/" exact>
          <Button svg-source="/../../images/icons/svgs/home.svg" button-inhalt="Home" button-color="bg-green-400"
            on-hover="hover:bg-white"></Button>
        </router-link>
      </div>
      <!-- end buttoncontainer -->
    </div>
  </div>
  <!-- end root element -->
</template>

<script>
import Button from "./Button";

export default {
  metaInfo: {
    title: 'Sponsoren'
  },
  data() {
    return {
      name: "Sponsoren",
      titleMessage: "Partner der Haiminger Markttage",
      contactDescription: "Hier finden Sie eine Liste unserer Partner.",
      //nicht vergessen, Anreiseinfos entweder in DB abspeichern und von dort aus zB via Props zu laden, oder via API Call (Axios oder FetchAPI)..
    };
  },
  components: { Button },
};
</script>

<style scoped>
#kontaktinfo {
  opacity: 80%;
}

.produktbackground {
  background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.1)),
    url("/images/background/produktbackground.svg");
  background-repeat: no-repeat;
  /*background-position: 50% 50%;*/
  height: 100%;
  width: 100%;
  background-size: cover;
  opacity: 90%;
}
</style>
