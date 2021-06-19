<template>
  <div class="card">
    <div class="img" :style="backgroundImage"></div>
    <div class="title">{{ item.fotogalerie_fotoname }}</div>
    <div class="description">{{ item.fotogalerie_fotobeschreibung }}</div>
  </div>
</template>

<script>
export default {
  props: ["item", "active"],
  computed: {
    backgroundImage() {
      return {
        "background-image":
          "url(" +
          require("../../../../public/images/fotogalerie/" +
            this.item.fotogalerie_fotourl) +
          ")",
      };
    },
  },
};
</script>

<style>
</style>