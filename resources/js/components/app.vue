<template>
  <div class="text-white mb-8 text-xl text-center">
    {{ titleMessage }}
    <div class="text-gray-300 text-center">
      {{ smallDescription }}
    </div>

    <!--Button dann als seperaten Component bereitstellen, margin left noch weg und centern-->
    <div class="container p-2 md:w-40 mt-20 ml-20 flex justify-center">
      <div
        class="flex items-center p-4 bg-green-200 rounded-lg shadow-xs cursor-pointer hover:bg-green-500 hover:text-gray-100"
      >
        <svg
          class="h-6 fill-current hover:text-gray-100"
          role="img"
          viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg"
        >
          <title>Vue.js icon</title>
          <path
            d="M19.197 1.608l.003-.006h-4.425L12 6.4v.002l-2.772-4.8H4.803v.005H0l12 20.786L24 1.608"
          />
        </svg>
        <div>
          <p class="text-xs font-medium ml-2">Produkte Test</p>
        </div>
      </div>
    </div>

    <div class="container p-2 md:w-40 mt-20 ml-20 flex justify-center">
      <div
        class="flex items-center p-4 bg-green-200 rounded-lg shadow-xs cursor-pointer hover:bg-green-500 hover:text-gray-100"
      >
        <svg
          class="h-6 fill-current hover:text-gray-100"
          role="img"
          viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg"
        >
          <title>Vue.js icon</title>
          <path
            d="M19.197 1.608l.003-.006h-4.425L12 6.4v.002l-2.772-4.8H4.803v.005H0l12 20.786L24 1.608"
          />
        </svg>
        <div>
          <p class="text-xs font-medium ml-2">Aussteller</p>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
const default_layout = "default";

export default {
  computed: {},
  data() {
    return {
      titleMessage: "Willkommen bei den Haiminger Markttagen",
      smallDescription: "Flanieren, Probieren und Genießen...",
    };
  },
};
</script>