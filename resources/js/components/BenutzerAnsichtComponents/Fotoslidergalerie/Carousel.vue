<template>
  <div class="carousel max-w-full h-auto lg:max-w-screen-lg customshadow">
    <!--Slot für CarouselSlide-->
    <slot></slot>

    <img class="
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
      " src="/images/icons/svgs/next1.svg" alt="Next" @click="goToNext()" />
    <img class="
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
      " src="/images/icons/svgs/back.svg" alt="Previous" @click="goToPrevious()" />
  </div>
</template>

<script>
export default {
  data() {
    return {};
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

  display: flex;

  @apply flex justify-center items-center;
}

img:focus,
img:hover {
  outline: none;
  cursor: pointer;
}

.next {
  position: fixed;
  right: 0px;
}

.previous {
  position: fixed;
  left: 0px;
}
</style>
