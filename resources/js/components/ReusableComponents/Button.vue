<template>
  <div class="
      z-50
      buttoncontainer
      flex
      justify-center
      flex-col
      items-center
      text-white text-center
      sm:mb-2
    ">
    <!--Custom Button-->
    <div class="w-40 sm:w-60 md:w-80 text-center z-50">
      <div class="p-1 rounded-lg shadow-2xl" :class="onHover">
        <!-- Hoverdiv Start -->
        <div class="
            flex
            items-center
            justify-between
            rounded-lg
            h-10
            px-2
            ssm:px-2
            sm:px-4
            sm:h-20
            shadow-xl
            cursor-pointer
            hover:bg-green-900
            hover:text-gray-100
            cshadow
            z-50
            buttoncolor1
          " :class="buttonColor">
          <img :src="svgSource" class="filter-white iconsmall ssm:iconmedium z-50" alt="Menu Icon" />
          <div>
            <p class="
                text-2xl
                sm:text-3xl
                font-medium
                font-willkommen
                md:mr-10
                md:text-3xl
                md:p-2
                z-50
              ">
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

.buttoncolor1 {
  background-color: #003d33d2;
}
</style>
