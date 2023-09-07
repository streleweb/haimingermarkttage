<template>
  <div class="page-loader" v-if="!domContentLoaded">
    <div class="apple"><img src="https://app.haiminger-markttage.at/images/loaderapple.svg" alt="apple-svg"></div>
    <div class="apple"><img src="https://app.haiminger-markttage.at/images/loaderapple.svg" alt="apple-svg"></div>
    <div class="apple"><img src="https://app.haiminger-markttage.at/images/loaderapple.svg" alt="apple-svg"></div>
    <div class="apple"><img src="https://app.haiminger-markttage.at/images/loaderapple.svg" alt="apple-svg"></div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: "Pageloader",
      domContentLoaded: false
    }
  },
  mounted() {
    document.onreadystatechange = () => {
      const pageLoaderDiv = document.querySelector('.page-loader');


      if (document.readyState == "complete") {
        pageLoaderDiv.classList.add('opacityout');

        setTimeout(() => {
          this.domContentLoaded = true;
        }, 700);
      }


    }
  }
}
</script>

<style>
.page-loader {
  display: flex;
  justify-content: center;
  align-items: center;
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background-color: #222;
  z-index: 9999;
}

.opacityout {
  animation: addopacity 0.7s ease-out;
}

.apple {
  width: 2.5rem;
  margin-right: 0.7rem;
}

.apple:first-child {
  animation: left 1s infinite;
}

.apple:last-child {
  animation: right 1s infinite .5s;
}



@keyframes left {
  40% {
    transform: translateX(-20px);
  }

  50% {
    transform: translateX(0);
  }
}

@keyframes right {
  40% {
    transform: translateX(20px);
  }

  50% {
    transform: translateX(0);
  }
}

@keyframes addopacity {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
  }
}
</style>
