<template>
  <transition name="show">
    <div
      id="content"
      class="mobiledropdown mobiledropdowntextconfig"
      v-if="open"
    >
      <router-link class="bar-element" to="/app/news" exact
        ><span class="w-full text-center" @click="emitGlobalClickEvent()">
          News</span
        >
      </router-link>
      <router-link class="bar-element" to="/app/philosophie" exact
        ><span class="w-full text-center" @click="emitGlobalClickEvent()">
          Philosophie</span
        >
      </router-link>
      <router-link class="bar-element" to="/app/programm" exact
        ><span class="w-full text-center" @click="emitGlobalClickEvent()">
          Programm</span
        >
      </router-link>
      <router-link class="bar-element" to="/app/fotogalerie" exact
        ><span class="w-full text-center" @click="emitGlobalClickEvent()">
          Fotogalerie</span
        >
      </router-link>
      <router-link class="bar-element" to="/app/kontakt" exact
        ><span class="w-full text-center" @click="emitGlobalClickEvent()">
          Kontakt</span
        >
      </router-link>
      <router-link class="bar-element" to="/app/sponsoren" exact
        ><span class="w-full text-center" @click="emitGlobalClickEvent()">
          Unsere Sponsoren</span
        >
      </router-link>
    </div>
  </transition>
  <!-- end root transition element -->
</template>


<script>
import { EventBus } from "../event-bus.js";

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
    //when visible changes to false, reset it to null
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
  position: relative;
  flex-direction: column;
  width: 100%;
  height: calc(100vh - 50px);
  padding-top: 3rem;
  background-color: rgb(41, 41, 41);
  opacity: 1;
  z-index: 1001;
}

.bar-element {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 60%;
  height: 3rem;
  margin-bottom: 8px;
  cursor: pointer;
  color: #fefefe;
  background-color: #242424;
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