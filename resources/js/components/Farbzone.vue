<template>
  <div
    class="flex items-center justify-items-center h-16 w-16 border border-gray-800"
    :class="zonenFarbe"
  >
    <div class="text-black flex-grow">ZONE</div>
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