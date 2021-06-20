<template>
  <div class="carousel max-w-full h-auto lg:max-w-screen-lg customshadow">
    <!--Slot für CarouselSlide-->
    <slot></slot>

    <iframe
      class="
        next
        filter-white-icons
        animate-pulse
        hover:bg-white
        hover:opacity-50
        h-8
        w-10
        ssm:h-14
        ssm:w-16
        fotogaleriebp:h-16
        fotogaleriebp:w-18
        sm:h-32
        sm:w-36
        lg:h-34
        lg:w-36
      "
      src="/images/icons/svgs/next1.svg"
      alt="Next"
      @click="goToNext()"
    />
    <iframe
      class="
        h-8
        w-10
        ssm:h-14
        ssm:w-16
        fotogaleriebp:h-16
        fotogaleriebp:w-18
        sm:h-32
        sm:w-36
        lg:h-34
        lg:w-36
        previous
        filter-white-icons
        animate-pulse
        hover:bg-white
        hover:opacity-50
      "
      src="/images/icons/svgs/back.svg"
      alt="Next"
      @click="goToPrevious()"
    />
  </div>
</template>

<script>
export default {
  data() {
    return {
      /*ausstellerfotos: [],*/
    };
  },
  methods: {
    goToNext() {
      this.$emit("next");
    },

    goToPrevious() {
      this.$emit("previous");
    },
  },

  components: {},
};
</script>

<style scoped>
.carousel {
  position: relative;
  /*
  max-width: 80%;
  height: auto;
*/
  display: flex;

  @apply flex justify-center items-center;
}

iframe:focus,
iframe:hover {
  outline: none;
  cursor: pointer;

  /* 
  height: 120px;
  width: 160px;
  top: calc(
    50% - 20px
  ); px-Wert halb so viel wie height, damit svg genau in der Mitte ist*/
}

.next {
  position: fixed;
  right: 0px;
}

.previous {
  position: fixed;
  left: 0px;
}

.customshadow {
  box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;
}

.customborder {
  box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset,
    rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
}
</style>