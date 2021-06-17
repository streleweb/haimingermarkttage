<template>
  <div class="mobiledropdown mobiledropdowntextconfig" v-if="open">
    <router-link class="bar-element" to="/app/news" exact> News </router-link>
    <router-link class="bar-element" to="/app/philosophie" exact>
      Philosophie
    </router-link>
    <router-link class="bar-element" to="/app/programm" exact>
      Programm
    </router-link>
    <router-link class="bar-element" to="/app/Fotogalerie" exact>
      Fotogalerie
    </router-link>
    <router-link class="bar-element" to="/app/Kontakt" exact>
      Kontakt
    </router-link>
    <router-link class="bar-element" to="/app/Sponsoren" exact>
      Philosophie
    </router-link>
  </div>

  <!-- end outercontainer -->
</template>


<script>
export default {
  props: ["open"],
  computed: {},
  data() {
    return {
      name: "Mobilemenu",
    };
  },
  components: {},
};
</script>

<style scoped>
</style>

<script>
export default {
  props: ["open"],
  data: () => {
    return {
      navElements: ["user", "cogs", "th", "share-alt", "star", "comment"],
    };
  },
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
  transform: translateX(-60px);
}
</style>