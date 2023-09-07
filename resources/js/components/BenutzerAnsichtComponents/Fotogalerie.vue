<template>
  <div class="fotogaleriecontentcontainer">
    <foto-app></foto-app>
  </div>
</template>

<script>
import Button from "../ReusableComponents/Button";
import FotoApp from "../BenutzerAnsichtComponents/Fotoslidergalerie/FotoApp";

export default {
  metaInfo: {
    title: 'Fotogalerie'
  },
  components: { Button, FotoApp },
};
</script>
