<template>
  <footer class="footer">
    <span class="footer-text"
      ><router-link to="/app/impressum">Impressum</router-link></span
    >
    <span class="footer-text"
      ><router-link to="/app/datenschutz">Datenschutz</router-link></span
    >
    <span class="footer-text"
      ><router-link to="/app/kontakt">Kontakt</router-link></span
    >
    <!-- Noch dynamisch machen und verlinken -->
  </footer>
</template>

<script>
export default {
  name: "Footer",
};
</script>

<style scoped>
.footer-text {
  @apply font-semibold font-sans text-green-50 text-xs;
}
</style>