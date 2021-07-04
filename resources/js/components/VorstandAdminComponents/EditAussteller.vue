<template>
  <div class="w-full">
    <div
      v-if="loggedIn() == false"
      class="
        flex
        w-full
        h-full
        items-center
        justify-center
        text-red-900
        bg-gray-900
      "
    >
      Nicht eingeloggt! Bitte loggen Sie sich ein, um auf diese Seite zugreifen
      zu können...
    </div>
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
                      bg-gray-900
                      text-white
                      px-3
                      py-2
                      rounded-md
                      text-sm
                      font-medium
                    "
                    aria-current="page"
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
                    <router-link to="/app/admin/dashboard/news"
                      >News</router-link
                    >
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
                <span class="text-white cursor-pointer"
                  >Logout
                  <img
                    src="/public/images/icons/svgs/ausloggen.svg"
                    class="filter-white"
                    alt=""
                /></span>
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
              ><router-link to="/app/admin/dashboard">Dashboard</router-link></a
            >
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
              >Aussteller</a
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
      <!-- DASHBOARD ENDE-->
      <div class="pt-2 px-10 py-5 bg-gray-700">
        <div class="flex flex-col">
          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-white">
                  Aussteller ändern
                </h3>
                <p class="mt-1 text-sm text-gray-300">
                  Hier können jeweilige Ausstellerinformationen für das kommende
                  Jahr abgeändert werden, ohne den Aussteller löschen und wieder
                  hinzufügen zu müssen...
                </p>
              </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
              <form action="#" method="POST">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                  <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-3 gap-6">
                      <div class="col-span-3 sm:col-span-2">
                        <label
                          for="company_website"
                          class="block text-sm font-medium text-gray-700"
                        >
                          Aussteller-Website
                        </label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                          <span
                            class="
                              inline-flex
                              items-center
                              px-3
                              rounded-l-md
                              border border-r-0 border-gray-300
                              bg-gray-50
                              text-gray-500 text-sm
                            "
                          >
                            http://
                          </span>
                          <input
                            type="text"
                            name="company_website"
                            id="company_website"
                            class="
                              focus:ring-green-500
                              focus:border-green-500
                              flex-1
                              block
                              w-full
                              rounded-none rounded-r-md
                              sm:text-sm
                              border-gray-300
                            "
                            placeholder="www.example.com"
                          />
                        </div>
                      </div>
                    </div>

                    <div>
                      <label
                        for="about"
                        class="block text-sm font-medium text-gray-700"
                      >
                        Aussteller-Beschreibung (max. 200 Zeichen)
                      </label>
                      <div class="mt-1">
                        <textarea
                          id="about"
                          name="about"
                          rows="3"
                          class="
                            shadow-sm
                            focus:ring-green-500
                            focus:border-green-500
                            mt-1
                            block
                            w-full
                            sm:text-sm
                            border border-gray-300
                            rounded-md
                          "
                          placeholder="you@example.com"
                        />
                      </div>
                      <p class="mt-2 text-sm text-gray-500">
                        Dieser Text wird auf der jeweiligen Aussteller-Karte
                        angezeigt.
                      </p>
                    </div>

                    <div>
                      <label class="block text-sm font-medium text-gray-700">
                        Foto
                      </label>
                      <div class="mt-1 flex items-center">
                        <span
                          class="
                            inline-block
                            h-12
                            w-12
                            rounded-full
                            overflow-hidden
                            bg-gray-100
                          "
                        >
                          <svg
                            class="h-full w-full text-gray-300"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                          >
                            <path
                              d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"
                            />
                          </svg>
                          <!--Farbzone noch -->
                        </span>
                        <button
                          type="button"
                          class="
                            ml-5
                            bg-white
                            py-2
                            px-3
                            border border-gray-300
                            rounded-md
                            shadow-sm
                            text-sm
                            leading-4
                            font-medium
                            text-gray-700
                            hover:bg-gray-50
                            focus:outline-none
                            focus:ring-2
                            focus:ring-offset-2
                            focus:ring-green-500
                          "
                        >
                          Ändern
                        </button>
                      </div>
                    </div>
                    <!--
              <div>
                <label class="block text-sm font-medium text-gray-700">
                  Cover photo
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                  <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                      <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                      <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                        <span>Upload a file</span>
                        <input id="file-upload" name="file-upload" type="file" class="sr-only" />
                      </label>
                      <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-500">
                      PNG, JPG, GIF up to 10MB
                    </p>
                  </div>
                </div>
              </div>-->
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="hidden sm:block" aria-hidden="true">
          <div class="py-5">
            <div class="border-t border-gray-200" />
          </div>
        </div>

        <div class="mt-10 sm:mt-0">
          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-white">
                  Personal Information
                </h3>
                <p class="mt-1 text-sm text-gray-400">
                  Ausstellerinformationen. Vor- und Nachname ist ein
                  Pflichtfeld.
                </p>
              </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
              <form action="#" method="POST">
                <div class="shadow overflow-hidden sm:rounded-md">
                  <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                      <div class="col-span-6 sm:col-span-3">
                        <label
                          for="first_name"
                          class="block text-sm font-medium text-gray-700"
                          >Vor- und Nachname</label
                        >
                        <input
                          type="text"
                          name="first_name"
                          id="first_name"
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

                      <div class="col-span-6 sm:col-span-3">
                        <label
                          for="last_name"
                          class="block text-sm font-medium text-gray-700"
                          >Handelsname, falls vorhanden...</label
                        >
                        <input
                          type="text"
                          name="last_name"
                          id="last_name"
                          autocomplete="family-name"
                          placeholder="Optional [Bsp.: Eier Tirol]"
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
                          >Email</label
                        >
                        <input
                          type="text"
                          name="email_address"
                          id="email_address"
                          autocomplete="email"
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
                          >Straße / Adresse</label
                        >
                        <input
                          type="text"
                          name="street_address"
                          id="street_address"
                          autocomplete="street-address"
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

                      <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                        <label
                          for="city"
                          class="block text-sm font-medium text-gray-700"
                          >Ort</label
                        >
                        <input
                          type="text"
                          name="city"
                          id="city"
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

                      <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                        <label
                          for="postal_code"
                          class="block text-sm font-medium text-gray-700"
                          >PLZ</label
                        >
                        <input
                          type="text"
                          name="postal_code"
                          id="postal_code"
                          autocomplete="postal-code"
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
                        hover:bg-green-700
                        focus:outline-none
                        focus:ring-2 focus:ring-offset-2 focus:ring-green-500
                      "
                    >
                      Save
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
      if (localStorage.getItem("isLoggedIn") == "true") return true;
      else return false;
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
    loadAussteller: function () {
      axios
        .get("/api/aussteller") // load API
        .then((response) => {
          this.aussteller = response.data.data; // 1. data = axios syntax, 2. data = das Property "data" innerhalb der JSON response
          console.log(this.aussteller);
        }) // assign to this.aussteller array
        .catch(function (error) {
          // Fehlerbehandlung
          console.log(error);
        });
    },

    imgUrl(index) {
      try {
        return (
          "/images/aussteller/" + this.aussteller[index].aussteller_bildurl
        );
      } catch (error) {
        console.log(error);
      }
    },

    webUrl(index) {
      return this.aussteller[index].aussteller_websiteurl;
    },

    webUrlNotEmpty(index) {
      return (
        this.aussteller[index].aussteller_bildurl != null &&
        this.aussteller[index].aussteller_bildurl != ""
      );
    },

    imageUrlNotEmpty(index) {
      return (
        this.aussteller[index].aussteller_websiteurl != null &&
        this.aussteller[index].aussteller_websiteurl != ""
      );
    },

    zonenFarbeNotEmpty(index) {
      return (
        this.aussteller[index].aussteller_zonenfarbe != null &&
        this.aussteller[index].aussteller_zonenfarbe != ""
      );
    },

    zonenFarbe(index) {
      return this.aussteller[index].aussteller_zonenfarbe;
    },
  },
};
</script>

<style>
</style>


      
