<template>
  <div
    class="
      z-50
      buttoncontainer
      flex
      justify-center
      flex-col
      items-center
      text-white text-center
      sm:mb-2
    "
  >
    <!--Custom Button-->
    <div class="w-40 sm:w-60 md:w-80 text-center z-50">
      <div class="p-1 rounded-lg shadow-2xl" :class="onHover">
        <!-- Hoverdiv Start -->
        <div
          class="
            flex
            items-center
            justify-between
            rounded-lg
            h-10
            px-2
            ssm:px-1
            sm:px-4
            sm:h-20
            shadow-xl
            cursor-pointer
            hover:bg-green-900
            hover:text-gray-100
            cshadow
            z-50
          "
          :class="buttonColor"
        >
          <img
            :src="svgSource"
            class="filter-white iconsmall ssm:iconmedium z-50"
          />
          <!--<svg
            class="h-6 fill-current hover:text-gray-100"
            role="img"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <title>Vue.js icon</title>
            <path
              d="M19.197 1.608l.003-.006h-4.425L12 6.4v.002l-2.772-4.8H4.803v.005H0l12 20.786L24 1.608"
            />
          </svg>-->
          <div>
            <p
              class="
                text-2xl
                sm:text-3xl
                font-medium
                md:mr-10
                md:text-3xl
                md:p-2
                z-50
              "
            >
              {{ buttonInhalt }}
            </p>
          </div>
        </div>
      </div>
      <!-- Hoverdiv End-->
    </div>
  </div>
  <!-- end Buttoncontainer -->
</template>

<script>
export default {
  name: "Button",
  props: ["buttonInhalt", "buttonColor", "onHover", "svgSource"],
};
</script>

<style>
.cshadow {
  box-shadow: rgba(109, 140, 177, 0.4) 0px 0px 0px 3px,
    rgba(6, 24, 44, 0.65) 0px 4px 6px -1px,
    rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
}
</style>