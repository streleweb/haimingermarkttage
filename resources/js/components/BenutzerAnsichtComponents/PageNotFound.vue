<template>
  <div class="pagenotfoundcontainer titletextpagenotfound">
    <div class="ueberschrift">
      <p>Diese Seite exisitiert nicht!</p>
      <div class="descriptiontext">
        <p>
          Bitte geben Sie eine richtige URL ein, oder drücken Sie den Button, um
          zum Home-Screen zu gelangen!
        </p>
      </div>
    </div>

    <!--Buttons mit Custom Props-->
    <router-link to="/" exact>
      <Button svg-source="/../../images/icons/svgs/home.svg" button-inhalt="Home" button-color="bg-green-400"
        on-hover="hover:bg-white"></Button>
    </router-link>
  </div>
</template>


<script>
import Button from "../ReusableComponents/Button";

export default {
  data() {
    return {
      name: "PageNotFound",
    };
  },
  components: { Button },
};
</script>

<style></style>
