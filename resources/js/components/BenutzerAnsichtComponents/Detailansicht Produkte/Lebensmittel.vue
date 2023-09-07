<template>
  <AusstellerListe pageTitle="Lebensmittel" :smallDescription="description" :getAusstellerUrl="url"></AusstellerListe>
</template>

<script>
import AusstellerListe from '../../ReusableComponents/AusstellerListe.vue';

export default {
  components: { AusstellerListe },

  data() {
    return {
      description: "Hier finden Sie alle Aussteller, die Lebensmittel anbieten. Nähere Informationen befinden sich in der jeweiligen Ausstellerbeschreibung. Klicken Sie auf die jeweilige Aussteller-Farbzone, um die Karte zu öffnen.",
      url: "/api/getAllAusstellerOfSpecificProduktreiter/Lebensmittel"
    }
  }
}
</script>
