<template>
  <AusstellerListe pageTitle="Textil" :smallDescription="description" :getAusstellerUrl="url"></AusstellerListe>
</template>

<script>
import AusstellerListe from '../../ReusableComponents/AusstellerListe.vue';

export default {
  components: { AusstellerListe },

  data() {
    return {
      description: "Hier finden Sie alle Aussteller zur Sparte Textil. Nähere Informationen befinden sich in der jeweiligen Ausstellerbeschreibung. Klicken Sie auf die jeweilige Aussteller-Farbzone, um die Farbzonen auf einer Karte einzusehen.",
      url: "/api/getAllAusstellerOfSpecificProduktreiter/Textil"
    }
  }
}
</script>
