<template>
  <div>
    <div>
      <navbar></navbar>
      <div class="willkommen">
        <!-- Hier noch Background-Pic oder Video rein -->
        <div class="text-white mb-20 mt-10 text-xl text-center">
          {{ titleMessage }}
          <div class="text-gray-300 text-center">
            {{ smallDescription }}
          </div>
        </div>
        <!-- end willkommenstexte -->
      </div>
      <!-- end willkommen -->

      <!--Button dann als seperaten Component bereitstellen, margin left noch weg und centern-->
      <div
        class="buttoncontainer flex justify-center flex-col items-center text-white"
      >
        <div class="p-2 md:w-40 mt-10">
          <div
            class="flex items-center p-4 bg-green-600 rounded-lg shadow-xs cursor-pointer hover:bg-green-500 hover:text-gray-100"
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
              <p class="text-xs font-medium ml-2">Produkte</p>
            </div>
          </div>
        </div>

        <div class="button2 p-2 md:w-40 mt-10">
          <div
            class="flex items-center p-4 bg-green-600 rounded-lg shadow-xs cursor-pointer hover:bg-green-500 hover:text-gray-100"
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
        <!-- end button2 -->
      </div>
      <!-- end buttoncontainer -->
    </div>
    <Footer></Footer>
  </div>

  <!-- end outer div -->
</template>


<script>
import Footer from "./Footer";
import Navbar from "./Navbar";
import Apple from "./svg/Apple";
const default_layout = "default";

export default {
  computed: {},
  data() {
    return {
      titleMessage: "Willkommen bei den Haiminger Markttagen!",
      smallDescription: "Flanieren, Probieren und Genießen...",
    };
  },
  components: { Navbar, Footer, Apple },
};
</script>

