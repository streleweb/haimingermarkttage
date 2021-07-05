<template>
  <div class="w-full h-full bg-gray-700">
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

    <!-- DASHBOARD -->
    <div v-if="loggedIn()" class="h-full w-full">
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
                    <router-link to="/app/admin/dashboard/editfotogalerie"
                      >Fotogalerie</router-link
                    >
                  </div>
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
                <span @click="handleLogout()" class="text-white cursor-pointer"
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

            <div
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
            >
              <router-link to="/app/admin/dashboard/news">News</router-link>
            </div>

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

      <p v-if="loading">
        <img
          src="/images/icons/gifs/loadingtransparent.gif"
          alt="loading..."
          class="resize-loadinggif fixed top-1/2 left-1/2 z-5000 bg-gray-900"
        />
      </p>

      <div class="ausstellergradient">
        <div class="ausstellercontainer">
          <div
            class="
              inline-flex
              justify-start
              gap-3
              pt-5
              px-4
              items-center
              w-full
            "
          >
            <router-link to="/app/admin/dashboard/ausstelleraendern"
              ><button class="btn btn-blue">
                Aussteller ändern
              </button></router-link
            >
            <!--Neuen Aussteller hinzufügen Button-->
            <router-link to="/app/admin/dashboard/ausstelleranlegen"
              ><button class="btn btn-green">
                Neuen Aussteller hinzufügen
              </button></router-link
            >
            <!--Neuen Aussteller hinzufügen Button END-->
          </div>
          <div
            class="
              grid grid-cols-1
              sm:grid-cols-2
              lg:grid-cols-3
              gap-8
              items-center
              w-full
              pt-4
            "
          >
            <p v-if="error" style="...">{{ error }}</p>
            <article
              v-for="(jeweiligerAussteller, index) in aussteller"
              :key="index"
              class="articlestyling mx-auto overflow-hidden w-full"
            >
              <img
                v-if="imageUrlNotEmpty(index)"
                :src="imgUrl(index)"
                alt=""
                class="border-b-2 border-yellow-50"
              />
              <img
                v-else
                src="/images/icons/svgs/aussteller.svg"
                alt="Ausstellerfoto"
                class="
                  filter-white
                  bg-gray-50 bg-opacity-20
                  border-b-2 border-black
                "
              />
              <div class="text text-center lg:text-lg">
                <h3 class="font-bold text-gray-800 mb-2">
                  {{ jeweiligerAussteller.aussteller_fullname }}
                </h3>
                <h2
                  v-if="ausstellerBrandingNameNotEmpty(index)"
                  class="font-semibold text-gray-700 mb-2"
                >
                  {{ jeweiligerAussteller.aussteller_brandingname }}
                </h2>
                <p class="text-sm lg:text-base mb-2">
                  {{ jeweiligerAussteller.aussteller_beschreibung }}
                </p>
                <div
                  class="
                    bg-gray-800
                    relative
                    bottom-0
                    left-0
                    right-0
                    h-10
                    flex
                    justify-center
                    items-center
                    rounded-lg
                  "
                >
                  <ul class="inline-flex gap-2 justify-center items-center">
                    <li v-if="webUrlNotEmpty(index)">
                      <a :href="webUrl(index)" target="_blank"
                        ><img
                          src="/images/icons/svgs/www.svg"
                          class="resize-icon filter-white-icons"
                          alt="website"
                      /></a>
                    </li>

                    <li v-if="ausstellerEmailNotEmpty(index)">
                      <a :href="ausstellerEmail(index)" target="_newtab"
                        ><img
                          src="/images/icons/svgs/email.png"
                          class="h-4 filter-white-icons"
                          alt="website"
                      /></a>
                    </li>

                    <li v-if="zonenFarbeNotEmpty(index)" class="h-5 w-32">
                      <Farbzone :zonen-farbe="zonenFarbe(index)"></Farbzone>
                    </li>
                  </ul>
                </div>
                <div class="gap-2 justify-start items-center mt-3">
                  <button
                    key:index
                    @click="deleteAussteller(index)"
                    class="btn btn-red"
                  >
                    delete
                  </button>
                </div>
              </div>
            </article>

            <!-- end willkommen -->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Button from "../Button";
import Farbzone from "../Farbzone";
import repository from "./repository/repository";

import Swal from "sweetalert2";

export default {
  data() {
    return {
      aussteller: [],
      error: null,
      loading: false,
      laravelResponseData: null,
    };
  },

  created() {
    console.log(localStorage.getItem("isLoggedIn"));
    //Wenn Admin nicht eingeloggt ist, redirect auf LoginPage
    if (localStorage.getItem("isLoggedIn") != "true") {
      this.$router.push({ name: "adminLogin" });
    }
    this.loadAussteller();
  },

  methods: {
    deleteAussteller(index) {
      axios
        .delete(
          "http://localhost:8000/api/aussteller/" +
            this.aussteller[index].aussteller_fullname
        )
        .then((response) => {
          console.log(response);
          //laravel response zu component object hinzufügen zur späteren Ausgabe
          this.laravelResponseData = response.data;
          Swal.fire({
            title: response.data,
            heightAuto: false,
            text: "Seite wird in 3 sekunden neu geladen...",
            confirmButtonText: "ok",
            confirmButtonColor: "#3cb371",
          });
          //Nach 3 Sekunden Page refresh
          setTimeout(() => {
            location.reload();
          }, 3000);
        });
    },

    loggedIn() {
      if (localStorage.getItem("isLoggedIn") == "true") return true;
      else return false;
    },
    async handleLogout() {
      this.loading = true;
      try {
        await axios.post("http://localhost:8000/api/admin/logout");
        //LocalStorage LoggedIn-Status löschen
        localStorage.removeItem("isLoggedIn");
        localStorage;
        this.loading = false;
        this.$router.push({ name: "adminLogin" });
      } catch (error) {
        console.log(error);
      }
    },
    /*loadAussteller: function () {
      axios
        .get("/api/aussteller") // load API
        .then((response) => {
          this.aussteller = response.data.data; // 1. data = axios syntax, 2. data = das Property "data" innerhalb der JSON response
          console.log(this.aussteller);
        }) // assign to this.aussteller array
        .catch(function (error) {
          // Fehlerbehandlung
          console.log(error);
        });*/

    async loadAussteller() {
      this.loading = true;
      try {
        let { data } = await repository.getAussteller();
        this.aussteller = data.data;
      } catch (error) {
        Swal.fire({
          title: "Konnte Aussteller nicht laden.",
          heightAuto: false,
          confirmButtonText: "ok",
          confirmButtonColor: "#3cb371",
        });
      } finally {
        this.loading = false;
      }
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
      let http = "http://";
      return http + this.aussteller[index].aussteller_websiteurl;
    },

    imageUrlNotEmpty(index) {
      return (
        this.aussteller[index].aussteller_bildurl != null &&
        this.aussteller[index].aussteller_bildurl != ""
      );
    },

    webUrlNotEmpty(index) {
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

    ausstellerEmailNotEmpty(index) {
      return (
        this.aussteller[index].aussteller_email != null &&
        this.aussteller[index].aussteller_email != ""
      );
    },

    ausstellerEmail(index) {
      return "mailto:http://" + this.aussteller[index].aussteller_email;
    },

    ausstellerBrandingNameNotEmpty(index) {
      return (
        this.aussteller[index].aussteller_brandingname != null &&
        this.aussteller[index].aussteller_brandingname != ""
      );
    },
  },

  components: { Button, Farbzone },
};
</script>

<style scoped>
.btn {
  @apply font-bold py-2 px-2 rounded;
}
.btn-blue {
  @apply bg-blue-500 text-white;
}
.btn-gray {
  @apply bg-gray-500 text-white;
}
.btn-green {
  @apply bg-green-500 text-white;
}
.btn-red {
  @apply bg-red-500 text-white;
}
.btn-blue:hover {
  @apply bg-blue-700;
}
.btn-red:hover {
  @apply bg-red-700;
}
.btn-gray:hover {
  @apply bg-gray-700;
}
.btn-green:hover {
  @apply bg-green-700 text-white;
}

.articlestyling {
  background: #eee5e9;
  border: none;
  box-shadow: 4px 4px 8px 0px rgba(0, 0, 0, 0.3);
  border-radius: 20px;
  text-align: center;
  width: 250px;
  transition: transform 0.3s;
  z-index: 1;
}

article:hover {
  transform: translateY(5px);
  box-shadow: 4px 4px 30px 0px rgba(0, 0, 0, 0.3); /*Shadow bewegt sich mit nach unten*/
}

article img {
  width: 100%;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
  z-index: 1;
}

.text {
  padding: 0 20px 20px;
}

.text h3 {
  text-transform: uppercase;
}

.ausstellergradient {
  @apply bg-gray-700;
  background-repeat: no-repeat;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: 50% 50%;
  background-size: cover;
}
</style>