<template>
  <!--Only show if the fotoid equals index-->
  <div v-show="visibleSlide === index">
    <!--Slot fuer das jeweilige Image aus dem Array-->
    <slot></slot>
  </div>
</template>

<script>
export default {
  props: ["visibleSlide", "index"],
  data() {
    return {
      /*ausstellerfotos: [],*/
    };
  },

  components: {},
};
</script>
