

<template>
  <div class="max-w-full produktbackground">
    <div class="font-willkommen pt-5 px-1 mb-10 text-center z-index:100">
      <!-- custom font konfiguriert in tailwind.config.js-->
      <div class="ueberschriftprodukte textshadow-markant">
        <h1>Anreise</h1>
        <div class="
            hidden
            hmbp:block
            mb-5
            text-xs
            px-4
            pt-4
            ssm:text-sm
            btnbp:text-xl
            btnbp:pt-6
            btnbp:px-12
            text-gray-300 text-center
            produktdescriptionbp:px-14
          ">
          Hier finden Sie den heurigen Lageplan von den Markttagen. Diverse
          Park-Möglichkeiten sind gekennzeichnet. Klicken Sie bitte auf das
          Navigationssymbol, um per Google Maps nach Haiming navigiert zu
          werden.
        </div>
      </div>
    </div>

    <div class="flex flex-col justify-center items-center">
      <a href="https://goo.gl/maps/c5LfWFrYFkwVvHJ37"><img class="h-20 border border-black p-5 rounded-full filter-white"
          src="/images/icons/svgs/locationpointer.svg" alt="Google Maps Navigation" /></a>
      <img class="mt-5" src="/images/anreise/img_lageplan.webp" alt="" />
    </div>

    <div class="buttonContainer flex flex-col justify-end pb-4 mt-10">
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
  data() {
    return {
      name: "Anreise",
    };
  },
  components: { Button }
};
</script>

<style scoped>
.text {
  padding: 20px 20px;
}

.text h3 {
  text-transform: uppercase;
}

.produktbackground {
  background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.1)),
    url("/images/background/produktbackground.svg");
  background-repeat: no-repeat;
  background-position: 50% 50%;
  background-size: cover;
  opacity: 90%;
  height: 100%;
}
</style>
