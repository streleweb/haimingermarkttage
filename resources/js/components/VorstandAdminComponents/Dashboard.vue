<template>
<div class="w-full h-full bg-gray-900">
<div v-if="loggedIn() == false" class="flex w-full h-full items-center justify-center text-red-900 bg-gray-900"> Nicht eingeloggt! Bitte loggen Sie sich ein, um auf das Dashboard zugreifen zu können...</div>
<!-- Check for Login-Status, only display if logged in-->
<div v-if="loggedIn()" class="w-full">
  
  <nav class="bg-gray-800 border-b border-gray-300">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          
            <span class="sr-only">Open main menu</span>
           
            <!--
            Icon when menu is open.

            Heroicon name: outline/x

            Menu open: "block", Menu closed: "hidden"
          -->
            <svg
              class="hidden h-6 w-6"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              aria-hidden="true"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"
              />
            </svg>
          </button>
        </div>
        <div
          class="
            flex-1 flex
            items-center
            justify-center
            sm:items-stretch
            sm:justify-start
          "
        >
          <div class="flex-shrink-0 flex items-center"></div>
          <div class="hidden sm:block sm:ml-6">
            <div class="flex space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <router-link to="/app/admin/dashboard"
                ><span class="text-gray-500 text-lg"
                  >Dashboard</span
                ></router-link
              >
              <div
                class="
                  text-gray-300
                  hover:bg-gray-700
                  hover:text-white
                  px-3
                  py-2
                  rounded-md
                  text-sm
                  font-medium
                "
              >
                <router-link to="/app/admin/dashboard/ausstelleruebersicht"
                  >Aussteller
                </router-link>
              </div>

              <div
                class="
                  text-gray-300
                  hover:bg-gray-700
                  hover:text-white
                  px-3
                  py-2
                  rounded-md
                  text-sm
                  font-medium
                "
              >
                <router-link to="/app/admin/dashboard/news">News</router-link>
              </div>

              <a
                href="#"
                class="
                  text-gray-300
                  hover:bg-gray-700
                  hover:text-white
                  px-3
                  py-2
                  rounded-md
                  text-sm
                  font-medium
                "
                >Programm</a
              >

              <a
                href="#"
                class="
                  text-gray-300
                  hover:bg-gray-700
                  hover:text-white
                  px-3
                  py-2
                  rounded-md
                  text-sm
                  font-medium
                "
                >platzhalter</a
              >
            </div>
          </div>
        </div>
        <div
          class="
            absolute
            inset-y-0
            right-0
            flex
            items-center
            pr-2
            sm:static
            sm:inset-auto
            sm:ml-6
            sm:pr-0
          "
        >
          <div
                class="
                  text-gray-300
                  hover:bg-red-900
                  hover:text-white
                  px-3
                  py-2
                  rounded-md
                  text-sm
                  font-medium
                "
              >
                <span class="text-white cursor-pointer" @click="handleLogout()">Logout <img src="/public/images/icons/svgs/ausloggen.svg" class= "filter-white" alt=""></span>
              </div>
            
          </div>
        </div>
      </div>
    

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu">
      <div class="px-2 pt-2 pb-3 space-y-1">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a
          href="#"
          class="
            bg-gray-900
            text-white
            block
            px-3
            py-1
            rounded-md
            text-base
            font-medium
          "
          aria-current="page"
          >Dashboard</a
        >
        <!--Wenn Menü aufgeklappt-->
        <a
          href="#"
          class="
            text-gray-300
            hover:bg-gray-700
            hover:text-white
            block
            px-3
            py-1
            rounded-md
            text-base
            font-medium
          "
          ><router-link to="/app/admin/dashboard/ausstelleruebersicht">Aussteller</router-link> </a
        >

        <a
          href="#"
          class="
            text-gray-300
            hover:bg-gray-700
            hover:text-white
            block
            px-3
            py-1
            rounded-md
            text-base
            font-medium
          "
          >News</a
        >

        <a
          href="#"
          class="
            text-gray-300
            hover:bg-gray-700
            hover:text-white
            block
            px-3
            py-1
            rounded-md
            text-base
            font-medium
          "
          >Programm</a
        >
      </div>
    </div>
  </nav>
  <div id="dashboardcontent" class="h-full w-full">
    <div class= "flex pt-60 w-full justify-center text-white text-4xl text-gray-800">Welcome Home</div>
  </div>
</div>
</div>
</template>

<script>
export default {
  name: "Dashboard",
  data() {
    return {
      loading: null,
    };
  },

  //wenn Component geladen ist, führe die Methoden zum
  //Laden der Aussteller und Ausstellerfotos via Axios Request aus
  created() {
    console.log(localStorage.getItem("isLoggedIn"));
    //Wenn Admin nicht eingeloggt ist, redirect auf LoginPage
    if (localStorage.getItem("isLoggedIn") != "true") {
      this.$router.push({ name: "adminLogin" });
    }
    this.loadAussteller();
  },

  methods: {
    loggedIn() {
      if (localStorage.getItem("isLoggedIn") == "true") {
        return true;
      } else return false;
    },
    async handleLogout() {
      this.loading = true;
      try {
        await axios.post("http://localhost:8000/api/admin/logout");
        //LocalStorage LoggedIn-Status löschen
        localStorage.removeItem("isLoggedIn");
        localStorage;
        this.$router.push({ name: "adminLogin" });
      } catch (error) {
        console.log(error);
      } finally {
        this.loading = false;
      }
    },
  },
};
</script>

<style>
</style>