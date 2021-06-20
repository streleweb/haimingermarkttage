<template>
  <!--Only show if the fotoid equals index-->
  <div v-show="visibleSlide === index" class="fade">
    <!--Slot fuer das jeweilige Image aus dem Array-->
    <slot></slot>
  </div>
</template>

<script>
export default {
  props: ["visibleSlide", "index"],
  data() {
    return {};
  },

  components: {},
};
</script>

<style>
.fade {
  -webkit-animation: fade 2s;
  animation: fade 2s;
  -moz-animation: fade 2s;
  -o-animation: fade 2s;
}

@-webkit-keyframes fade {
  0% {
    opacity: 0;
  }

  100% {
    opacity: 1;
  }
}

@-moz-keyframes fade {
  0% {
    opacity: 0;
  }

  100% {
    opacity: 1;
  }
}

@keyframes fade {
  0% {
    opacity: 0;
  }

  100% {
    opacity: 1;
  }
}
@-o-keyframes fade {
  0% {
    opacity: 0;
  }

  100% {
    opacity: 1;
  }
}
</style>
