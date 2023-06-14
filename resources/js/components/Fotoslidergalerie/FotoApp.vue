<template>
  <div class="fotogaleriecontentcontainer">
    <!--Emit von Carousel abhören-->
    <carousel @next="goToNext()" @previous="goToPrevious()">
      <carousel-slide v-for="(foto, index) in fotos" :key="id(index)" :index="index" :visibleSlide="visibleSlide">
        <span class="text-white font-semibold fixed left-6 top-16">{{
          foto.fotogalerie_fotoname
        }}</span>
        <span class="text-xs sm:text-base text-gray-400 fixed right-6 bottom-10">{{ foto.fotogalerie_fotobeschreibung
        }}</span>
        <img :src="urlOfFoto(index)" alt="Foto" />
      </carousel-slide>
    </carousel>
  </div>
</template>

<script>
import Carousel from "./Carousel.vue";
import CarouselSlide from "./CarouselSlide.vue";

export default {
  data() {
    return {
      fotos: [],
      visibleSlide: 0,
    };
  },
  /*created wird vor mounted() aufgerufen, deshalb schneller*/
  created() {
    this.loadFotos();
  },

  methods: {
    loadFotos: function () {
      axios
        .get("/api/fotogalerie") // load API
        .then((response) => {
          this.fotos = response.data.data; // 1. data = axios syntax, 2. data = das Property "data" innerhalb der JSON response
          //console.log(this.fotos);
        }) // assign to this.foto array
        .catch(function (error) {
          // Fehlerbehandlung
          console.log(error);
        });
    },
    urlOfFoto(index) {
      try {
        return "/images/aussteller/" + this.fotos[index].fotogalerie_fotourl;
      } catch (error) {
        console.log(error);
      }
    },

    id(index) {
      try {
        //console.log(this.fotos[index].id);
        return this.fotos[index].id;
      } catch (error) {
        console.log(error);
      }
    },

    goToNext() {
      console.log(this.visibleSlide);
      if (this.visibleSlide == this.fotosLength - 1) {
        this.visibleSlide = 0; //Reset - nach dem letzten Bild
      } else {
        this.visibleSlide++;
      }
    },

    goToPrevious() {
      if (this.visibleSlide <= 0) {
        this.visibleSlide = this.fotosLength - 1; //Reset - nach dem letzten Bild
      } else {
        this.visibleSlide--;
      }
    },
  },
  computed: {
    fotosLength() {
      return this.fotos.length;
    },
  },
  components: { Carousel, CarouselSlide },
};
</script>

