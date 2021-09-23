<template>
  <div class="w-full h-full bg-gray-900">
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
      Nicht eingeloggt! Bitte loggen Sie sich ein, um auf das Dashboard
      zugreifen zu können...
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
                    ><router-link to="/app/admin/dashboard/programmanlegen">
                      Programm</router-link
                    ></a
                  >

                  <div
                    aria-current="page"
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
                    Fotogalerie
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
                <span class="text-white cursor-pointer" @click="handleLogout()"
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
              ><router-link to="/app/admin/dashboard/ausstelleruebersicht"
                >Aussteller</router-link
              >
            </a>

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
              ><router-link to="/app/admin/dashboard/programmanlegen">
                Programm</router-link
              ></a
            >
          </div>
        </div>
      </nav>
      <!-- DASHBOARD ENDE-->

      <div class="bg-gray-800 flex flex-col justify-evenly p-4 md:p-10 lg:p-20">
        <p v-if="loading" class="mx-auto">
          <img
            src="/images/icons/gifs/loadingtransparent.gif"
            alt="loading..."
            class="m-auto resize-loadinggif"
          />
        </p>
        <div class="mt-10 sm:mt-0">
          <div class="">
            <div class="text-gray-400 pb-3">
              <h3 class="text-lg font-medium leading-6 text-white pb-1">
                Fotogalerie
              </h3>
              Der Foto-Titel und die Fotobeschreibung werden im Foto-Carousel
              eingebettet. Maximallänge Foto-Titel: 30 Zeichen,
              Fotobeschreibung: 50 Zeichen. Folgende Fotos sind bereits
              vorhanden, klicken Sie auf "delete", um diese aus der Datenbank
              und aus der Galerie zu löschen. Achten Sie bitte darauf, dass Sie
              zuerst das Foto auf "Upload photo" raufladen und danach auf den
              Button "In DB speichern" klicken. Falls Sie keinen Fototitel
              hinzufügen möchten, können Sie den "In DB speichern"-Button auch
              nicht drücken. Das Photo wird trotzdem gespeichert und ist in der
              Fotogalerie ersichtlich.
            </div>

            <div
              v-for="(jeweiligesFoto, index) in fotos"
              :key="index"
              class="
                flex
                justify-evenly
                pl-3
                text-white
                bg-green-900
                mb-3
                border border-gray-600
              "
            >
              <span class="flex w-32 items-center">{{
                jeweiligesFoto.fotogalerie_fotoname
              }}</span>
              <img
                :src="urlOfFoto(index)"
                class="w-20 h-20 border border-gray-50 rounded-lg my-2"
                alt="Foto"
              />
              <button key:index @click="deleteFoto(index)" class="btn btn-red">
                delete
              </button>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
              <div>
                <div class="shadow overflow-hidden sm:rounded-md">
                  <h3 class="text-lg font-medium leading-6 text-white pb-1">
                    Foto hinzufügen
                  </h3>
                  <div class="px-4 py-5 bg-gray-300 sm:p-6">
                    <label
                      for="name"
                      class="block text-sm font-medium text-gray-700"
                      >Foto-Titel</label
                    >
                    <input
                      maxlength="30"
                      type="text"
                      v-model="formdata.fotogalerie_fotoname"
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

                    <div class="col-span-6 sm:col-span-4">
                      <label
                        for="email_address"
                        class="block text-sm font-medium text-gray-700"
                        >Fotobeschreibung</label
                      >
                      <textarea
                        maxlength="50"
                        v-model="formdata.fotogalerie_fotobeschreibung"
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

                    <!--IMAGE FILE UPLOAD START-->
                    <div class="py-2 bg-green-900 text-white mb-1 px-2">
                      Foto Upload
                      <div class="alert">
                        <span
                          class="closebtn"
                          onclick="this.parentElement.style.display='none';"
                          >&times;</span
                        >
                        <strong>Achtung!</strong> Maximale Filesize: 1.9MB
                        <br />
                        Bsp: haimingermarkttage2020-1.jpg , hm1.png..
                      </div>
                    </div>
                    <form
                      @submit.prevent="upload"
                      class="flex items-center justify-center mt-3"
                    >
                      <input
                        @change="handleOnChange"
                        type="file"
                        class="text-xs sm:text-base"
                      />
                      <button
                        @click="showSubmitButton"
                        class="
                          bg-green-900
                          text-xs
                          sm:text-base
                          p-1
                          text-white
                          border border-green-600
                          rounded-md
                          hover:bg-green-500
                        "
                      >
                        Upload photo
                      </button>
                    </form>

                    <!--IMAGE FILE UPLOAD END-->
                  </div>

                  <div
                    class="
                      flex
                      justify-center
                      px-4
                      py-3
                      bg-gray-600
                      border-t-2 border-gray-800
                      text-right
                      sm:px-6
                    "
                  >
                    <button
                      id="submitbutton"
                      @click="submitform"
                      :class="submitvisibility"
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Swal from "sweetalert2";

export default {
  data() {
    return {
      name: "Ausstelleranlegen",
      image: "",
      fotos: [],
      loading: null,
      neuerAussteller: "",
      submitvisibility: "hidden",
      formdata: {
        fotogalerie_fotoname: null,
        fotogalerie_fotobeschreibung: null,
        fotogalerie_fotourl: null,
        //created_at: null,
        //updated_at: null,
      }, //Objekt zum Speichern der Model-Daten von oben
    };
  },

  //Noch bevor Component gemounted ist, checke Login-Status...
  //Lade Aussteller nur dann, wenn Admin eingeloggt ist,
  //andernfalls erfolgt ein Redirect zur Login-Page
  created() {
    this.loading = true;
    this.loadFotos();
    //console.log(localStorage.getItem("isLoggedIn"));
    //Wenn Admin nicht eingeloggt ist, redirect auf LoginPage
    if (localStorage.getItem("isLoggedIn") != "true") {
      this.$router.push({ name: "adminLogin" });
    }
  },

  mounted() {
    this.loading = false;
  },

  methods: {
    showSubmitButton() {
      this.submitvisibility = "block";
    },
    //image aus dem inputfield lesen
    handleOnChange(e) {
      this.image = e.target.files[0];
      /*console.log(this.image);
      console.log(this.image.name);*/
    },
    //images holen
    loadFotos: function () {
      axios
        .get("/api/fotogalerie") // load API
        .then((response) => {
          this.fotos = response.data.data; // 1. data = axios syntax, 2. data = das Property "data" innerhalb der JSON response
          console.log(this.fotos);
        }) // assign to this.foto array
        .catch(function (error) {
          // Fehlerbehandlung
          console.log(error);
        });
    },

    upload() {
      //formdata reset, falls öfter aufgerufen wird
      this.formdata.aussteller_bildurl = null;
      const formData = new FormData();
      formData.set("image", this.image);

      axios.post("/api/imageupload", formData).then((response) => {
        //Server-Responseurl des Images zur aussteller_bildurl innerhalb der formdata adden
        this.formdata.fotogalerie_fotourl = response.data.filepath;
        //console.log(response.data);
        Swal.fire({
          title: response.data.filename + " wurde erfolgreich gespeichert!",
          heightAuto: false,
          confirmButtonText: "ok",
          confirmButtonColor: "#3cb371",
        });
      });
      //console.log(this.aussteller_bildurl);
    },

    deleteFoto(index) {
      axios
        .delete("/api/fotogalerie/" + this.fotos[index].id)
        .then((response) => {
          console.log(response);
          //laravel response zu component object hinzufügen zur späteren Ausgabe
          this.laravelResponseData = response.data;
          Swal.fire({
            title: response.data,
            heightAuto: false,
            confirmButtonColor: "#3cb371",
          });
          location.reload();
        });
    },

    urlOfFoto(index) {
      try {
        return "/images/aussteller/" + this.fotos[index].fotogalerie_fotourl;
      } catch (error) {
        console.log(error);
      }
    },

    id(index) {
      try {
        console.log(this.fotos[index].id);
        return this.fotos[index].id;
      } catch (error) {
        console.log(error);
      }
    },

    loggedIn() {
      if (localStorage.getItem("isLoggedIn") == "true") {
        return true;
      } else return false;
    },
    async handleLogout() {
      try {
        await axios.post("/api/admin/logout");
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
        axios
          .post("/api/fotogalerie", this.formdata)
          //console.log(result.response.data);
          .then((response) => {
            //console.log(response);
            //alert(response.data);
            Swal.fire({
              title: response.data,
              heightAuto: false,
              confirmButtonText: "ok",
              confirmButtonColor: "#3cb371",
            });
            //Swal.fire(response.data);
          })
          .catch(function (error) {
            // Fehlerbehandlung
            //console.log(error);
            Swal.fire({
              title: error,
              heightAuto: false,
              confirmButtonText: "ok",
              confirmButtonColor: "#3cb371",
            });
          });
      } catch (error) {
        //console.error(error.response.data);
      } finally {
        setTimeout(() => {}, 1500);
        location.reload();
      }
    },
  },
};
</script>

<style>
/* Farbzonenbuttons */
.container {
  display: block;
  position: relative;
  padding-left: 2rem;
  margin-bottom: 0.8rem;
  cursor: pointer;
  font-size: 0.9rem;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196f3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
  top: 9px;
  left: 9px;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: white;
}

.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}

.btn-red {
  @apply bg-red-500 text-white h-1/2 my-auto p-1 border border-white rounded-lg;
}

.btn-red:hover {
  @apply bg-red-700 text-white;
}
</style>

