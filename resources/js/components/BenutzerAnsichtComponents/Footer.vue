<template>
  <footer class="footer">
    <span class="footer-text"><router-link to="/impressum">Impressum</router-link></span>
    <span class="footer-text"><router-link to="/datenschutz">Datenschutz</router-link></span>
    <span class="footer-text"><router-link to="/kontakt">Kontakt</router-link></span>
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
