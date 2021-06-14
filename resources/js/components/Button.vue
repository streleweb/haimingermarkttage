<template>
  <div
    class="
      buttoncontainer
      flex
      justify-center
      flex-col
      items-center
      text-white text-center
    "
  >
    <div class="w-60 md:w-80 text-center">
      <div class="p-1 rounded-lg" :class="onHover">
        <!-- Hoverdiv Start -->
        <div
          class="
            flex
            items-center
            justify-between
            p-4
            rounded-lg
            shadow-xl
            cursor-pointer
            hover:bg-green-900
            hover:text-gray-100
          "
          :class="buttonColor"
        >
          <img :src="svgSource" class="filter-white" />
          <!--<svg
            class="h-6 fill-current hover:text-gray-100"
            role="img"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <title>Vue.js icon</title>
            <path
              d="M19.197 1.608l.003-.006h-4.425L12 6.4v.002l-2.772-4.8H4.803v.005H0l12 20.786L24 1.608"
            />
          </svg>-->
          <div>
            <p class="text-3xl font-medium md:mr-10 md:text-3xl md:p-2">
              {{ buttonInhalt }}
            </p>
          </div>
        </div>
      </div>
      <!-- Hoverdiv End-->
    </div>
  </div>
  <!-- end Buttoncontainer -->
</template>

<script>
export default {
  name: "Button",
  props: ["buttonInhalt", "buttonColor", "onHover", "svgSource"],
};
</script>

<style>
/* Filter für SVG zu weiß */
.filter-white {
  filter: invert(100%) sepia(0%) saturate(7494%) hue-rotate(350deg)
    brightness(101%) contrast(104%);

  height: 5em;
  width: 3em;
}
</style>