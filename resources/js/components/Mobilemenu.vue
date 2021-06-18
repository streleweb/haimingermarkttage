<template>
  <transition name="show">
    <div
      id="content"
      class="mobiledropdown mobiledropdowntextconfig"
      v-if="open"
    >
      <div class="mobiledropdown" @click="emitGlobalClickEvent()">
        <router-link class="bar-element" to="/app/news" exact>
          News
        </router-link>
        <router-link class="bar-element" to="/app/philosophie" exact>
          Philosophie
        </router-link>
        <router-link class="bar-element" to="/app/programm" exact>
          Programm
        </router-link>
        <router-link class="bar-element" to="/app/fotogalerie" exact>
          Fotogalerie
        </router-link>
        <router-link class="bar-element" to="/app/kontakt" exact>
          Kontakt
        </router-link>
        <router-link class="bar-element" to="/app/sponsoren" exact>
          Unsere Sponsoren
        </router-link>
      </div>
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