<template>
  <transition name="show">
    <div
      id="content"
      class="mobiledropdown mobiledropdowntextconfig"
      v-if="open"
    >
      <router-link class="bar-element" to="/produkte" exact
        ><span class="w-full text-center" @click="emitGlobalClickEvent()">
          Produkte</span
        >
      </router-link>
      <router-link class="bar-element" to="/aussteller" exact
        ><span class="w-full text-center" @click="emitGlobalClickEvent()">
          Aussteller</span
        >
      </router-link>
      <router-link class="bar-element" to="/news" exact
        ><span class="w-full text-center" @click="emitGlobalClickEvent()">
          News</span
        >
      </router-link>
      <router-link class="bar-element" to="/karte" exact
        ><span class="w-full text-center" @click="emitGlobalClickEvent()">
          Karte</span
        >
      </router-link>
      <router-link class="bar-element" to="/anreise" exact
        ><span class="w-full text-center" @click="emitGlobalClickEvent()">
          Anreise</span
        >
      </router-link>
      <router-link class="bar-element" to="/philosophie" exact
        ><span class="w-full text-center" @click="emitGlobalClickEvent()">
          Philosophie</span
        >
      </router-link>
      <router-link class="bar-element" to="/programm" exact
        ><span class="w-full text-center" @click="emitGlobalClickEvent()">
          Programm</span
        >
      </router-link>
      <router-link class="bar-element" to="/fotogalerie" exact
        ><span class="w-full text-center" @click="emitGlobalClickEvent()">
          Fotogalerie</span
        >
      </router-link>
      <router-link class="bar-element" to="/kontakt" exact
        ><span class="w-full text-center" @click="emitGlobalClickEvent()">
          Kontakt</span
        >
      </router-link>
      <router-link class="bar-element" to="/sponsoren" exact
        ><span class="w-full text-center" @click="emitGlobalClickEvent()">
          Sponsoren</span
        >
      </router-link>
    </div>
  </transition>
  <!-- end root transition element -->
</template>


<script>
import { EventBus } from "../../event-bus.js";

export default {
  props: ["open"],
  computed: {},

  data() {
    return {
      name: "Mobilemenu",
      hidden: false,
    };
  },
  methods: {
    emitGlobalClickEvent() {
      document.getElementById("content").style.visibility = "hidden";
      this.hidden = true;

      EventBus.$emit("clickedOnMenuLink");
    },
  },
  watch: {
    //when visible changes, reset it
    hidden() {
      this.hidden = false;
    },
  },

  components: {},
};
</script>



<style scoped>
.mobiledropdown {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  position: fixed;
  top: 58px;
  flex-direction: column;
  width: 100%;
  height: 100vh;
  padding-top: 1rem;
  background-image: url("/images/background/mobilemenubackground3.svg");
  opacity: 1;
  z-index: 4000;
  overflow: hidden;
}

.bar-element {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 60%;
  height: 7%;
  margin-bottom: 1rem;
  cursor: pointer;
  color: #fefefe;
  background-color: #2424247e;
  border-radius: 18%;
  transition: 0.3s;
}

.bar-element:hover {
  background-color: #1b741ed3;
  color: white;
}

.bar-element:active {
  background-color: #6ea070;
  box-shadow: 3px rgb(0, 56, 33);
  transform: translateY(4px);
}

.show {
  opacity: 0;
  transform: translateY(-100%);
}

.show-enter,
.show-leave-to {
  opacity: 0;
  transform: translateY(-100%);
}

.show-enter-active,
.show-leave-active {
  transition: all 800ms;
  z-index: 998;
}
</style>