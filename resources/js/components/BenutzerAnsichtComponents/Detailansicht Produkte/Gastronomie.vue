<template>
  <AusstellerListe pageTitle="Gastronomie" :smallDescription="description" :getAusstellerUrl="url"></AusstellerListe>
</template>

<script>
import AusstellerListe from '../../ReusableComponents/AusstellerListe.vue';

export default {
  components: { AusstellerListe },

  data() {
    return {
      description: "Hier finden Sie alle Aussteller zur Sparte Gastronomie. Nähere Informationen befinden sich in der jeweiligen Ausstellerbeschreibung. Klicken Sie auf die jeweilige Aussteller-Farbzone, um die Farbzonen auf einer Karte einzusehen.",
      url: "/api/getAllAusstellerOfSpecificProduktreiter/Gastronomie"
    }
  }
}
</script>
