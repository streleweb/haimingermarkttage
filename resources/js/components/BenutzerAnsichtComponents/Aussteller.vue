<template>
  <AusstellerListe pageTitle="Unsere heurigen Aussteller" :smallDescription="description" :getAusstellerUrl="url">
  </AusstellerListe>
</template>

<script>
import AusstellerListe from '../ReusableComponents/AusstellerListe';

export default {
  components: { AusstellerListe },

  data() {
    return {
      description: "",
      url: "/api/aussteller"
    }
  }
}
</script>
