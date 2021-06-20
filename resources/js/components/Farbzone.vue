<template>
  <div
    class="h-full w-full rounded border customborder text-xs text-white"
    :class="zonenFarbe"
  >
    Farbzone am Markt
  </div>
</template>

<script>
export default {
  name: "Farbzone",
  props: ["zonenFarbe"],
};
</script>

<style>
</style>