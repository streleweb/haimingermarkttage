<template>
  <div class="sm:hidden" id="mobile-menu">
    <div class="px-2 pt-2 pb-3 space-y-1">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <div class="
                                bg-gray-900
                                text-white
                                block
                                px-3
                                py-1
                                rounded-md
                                text-base
                                font-medium
                              " aria-current="page">
        Dashboard
      </div>
      <!--Wenn Menü aufgeklappt-->
      <router-link to="/admin/dashboard/ausstelleruebersicht">
        <div class="
                                text-gray-300
                                hover:bg-gray-700
                                hover:text-white
                                block
                                px-3
                                py-1
                                rounded-md
                                text-base
                                font-medium
                              ">
          Aussteller
        </div>
      </router-link>

      <div class="
                                text-gray-300
                                hover:bg-gray-700
                                hover:text-white
                                block
                                px-3
                                py-1
                                rounded-md
                                text-base
                                font-medium
                              ">
        <router-link to="/admin/dashboard/news">News</router-link>
      </div>

      <div class="
                                text-gray-300
                                hover:bg-gray-700
                                hover:text-white
                                block
                                px-3
                                py-1
                                rounded-md
                                text-base
                                font-medium
                              ">
        <router-link to="/admin/dashboard/programmanlegen">
          Programm</router-link>
      </div>
      <div class="
                                text-gray-300
                                hover:bg-gray-700
                                hover:text-white
                                block
                                px-3
                                py-1
                                rounded-md
                                text-base
                                font-medium
                              ">
        <router-link to="/admin/dashboard/editfotogalerie">Fotogalerie</router-link>
      </div>
      <div class="
                                text-gray-300
                                hover:bg-gray-700
                                hover:text-white
                                block
                                px-3
                                py-1
                                rounded-md
                                text-base
                                font-medium
                              ">
        <router-link to="/admin/dashboard/hometext">Home-Text</router-link>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: "Mobilemenu"
}
</script>

<style lang="scss" scoped></style>
