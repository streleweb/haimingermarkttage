<template>
<div class="w-full h-full">
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
  <div class="bg-gray-800 flex flex-col justify-evenly p-4">
      <div class="mt-10 sm:mt-0">
        <div class="grid grid-cols gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0 text-gray-400">
              <h3 class="text-lg font-medium leading-6 text-white pb-1">
                Neuen Aussteller anlegen
              </h3>
              Neuer Aussteller wird in DB gespeichert und in Web-App eingebettet...
            </div>
          </div>
          <div class="mt-5 md:mt-0 md:col-span-2">
            <form method="POST" action="/api/aussteller">
              <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-gray-300 sm:p-6">
                  <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                      <label
                        for="first_name"
                        class="block text-sm font-medium text-gray-700"
                        >Vor und Nachname</label
                      >
                      <input
                        type="text"
                        v-model="formdata.aussteller_fullname"
                        name="aussteller_fullname"
                        id="full_name"
                        placeholder="Pflichtfeld"
                        autocomplete="given-name"
                        class="
                          mt-1
                          focus:ring-green-500
                          focus:border-green-500
                          block
                          w-full
                          shadow-sm
                          sm:text-sm
                          border-gray-300
                          rounded-md
                        "
                      />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                      <label
                        for="email_address"
                        class="block text-sm font-medium text-gray-700"
                        >Beschreibung</label
                      >
                      <textarea
                        maxlength="200"
                        v-model="formdata.aussteller_beschreibung"
                        name="aussteller_beschreibung"
                        id="beschreibung"
                        autocomplete="Beschreibung"
                        placeholder="Optional"
                        class="
                          mt-1
                          focus:ring-green-500
                          focus:border-green-500
                          block
                          w-full
                          shadow-sm
                          sm:text-sm
                          border-gray-300
                          rounded-md
                        "
                      />
                    </div>

                    <div class="col-span-6">
                      <label
                        for="street_address"
                        class="block text-sm font-medium text-gray-700"
                        >Zonenfarbe am Markt</label
                      >
                      <input
                        type="text"
                        name="aussteller_zonenfarbe"
                        v-model="formdata.aussteller_zonenfarbe"
                        id="zonenfarbe"
                        autocomplete="Zonenfarbe"
                        placeholder="Optional"
                        class="
                          mt-1
                          focus:ring-green-500
                          focus:border-green-500
                          block
                          w-full
                          shadow-sm
                          sm:text-sm
                          border-gray-300
                          rounded-md
                        "
                      />
                    </div>
                  </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                  <button
                    type="submit"
                    class="
                      inline-flex
                      justify-center
                      py-2
                      px-4
                      border border-transparent
                      shadow-sm
                      text-sm
                      font-medium
                      rounded-md
                      text-white
                      bg-green-600
                      hover:bg-black
                      focus:outline-none
                      focus:ring-2 focus:ring-offset-2 focus:ring-green-500
                    "
                  >
                    In DB Speichern
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: "Ausstelleranlegen",
      aussteller: [],
      ausstellerfotos: [],
      neuerAussteller: "",
      formdata: {
        aussteller_fullname: null,
        aussteller_beschreibung: null,
        aussteller_zonenfarbe: null,
      }, //Objekt zum Speichern der Model-Daten von oben
    };
  },
  //wenn Component geladen ist, führe die Methoden zum
  //Laden der Aussteller und Ausstellerfotos via Axios Request aus
  mounted() {},

  methods: {
    loggedIn() {
      if (localStorage.getItem("isLoggedIn") == "true") {
        return true;
      } else return false;
    },
    async handleLogout() {
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
    submitform() {
      let formToJson = JSON.stringify(this.formdata);
      console.log(formToJson);
      try {
        let result = axios.post("/api/aussteller", {
          this: this.formdata,
        });
        console.log(result.response.data);
        /*.then((response) => {
          console.log(response); // debug
        })
        .catch(function (error) {
          // Fehlerbehandlung
          console.log(error);
        });*/
      } catch (error) {
        console.error(error.response.data);
      }
    },
  },
};
</script>

<style>
</style>

