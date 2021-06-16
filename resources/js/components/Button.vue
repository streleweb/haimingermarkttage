<template>
  <div
    class="
      buttoncontainer
      flex
      justify-center
      flex-col
      items-center
      text-white text-center
      h-20
      mb-2
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
            rounded-lg
            pr-4
            pl-4
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
</style>