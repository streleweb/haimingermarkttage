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
  position: fixed;
  top: 58px;
  flex-direction: column;
  width: 100%;
  height: calc(100vh - 58px);
  padding-top: 3rem;
  background-image: url("/images/background/mobilemenubackground3.svg");
  opacity: 1;
  z-index: 900;
}

.bar-element {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 60%;
  height: 10%;
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