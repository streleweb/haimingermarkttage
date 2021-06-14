<template>
  <img src="/../../images/icons/svgs/apple1.svg" class="filter-white" alt="" />
</template>

<script>
export default {
  name: "Apple",
};
</script>

<style>
/* Filter für SVG zu weiß */
.filter-white {
  filter: invert(100%) sepia(0%) saturate(7494%) hue-rotate(350deg)
    brightness(101%) contrast(104%);

  height: 5em;
}
</style>