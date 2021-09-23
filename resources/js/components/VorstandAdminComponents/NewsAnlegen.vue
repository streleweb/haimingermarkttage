<template>
  <div class="w-full h-full bg-gray-900">
    <!-- Check for Login-Status, only display if logged in-->
    <div v-if="loggedIn" class="w-full">
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
                  <router-link to="/app/admin/dashboard" exact
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
                    <router-link to="/app/admin/dashboard/news"
                      >News</router-link
                    >
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
                    <router-link to="/app/admin/dashboard/programmanlegen">
                      Programm</router-link
                    >
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
            <div
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
            >
              <router-link to="/app/admin/dashboard">Dashboard</router-link>
            </div>
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
              <router-link to="/app/admin/dashboard/ausstelleruebersicht"
                >Aussteller</router-link
              >
            </div>

            <a
              aria-current="page"
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
            >
              News
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
              ><router-link to="/app/admin/dashboard/programmanlegen">
                Programm</router-link
              ></a
            >
          </div>
        </div>
      </nav>
      <!--END DASHBOARD-->

      <div class="bg-gray-800 flex flex-col justify-evenly p-4 md:p-10 lg:p-20">
        <div class="mt-10 sm:mt-0">
          <div class="">
            <div class="text-gray-400 pb-3">
              <h3 class="text-lg font-medium leading-6 text-white pb-1">
                News anlegen
              </h3>
              Hier können Sie neue News anlegen. Falls Sie alte News ändern
              möchten, löschen Sie bitte den jeweiligen News-Post und legen Sie
              einen neuen an. Folgende News-Titel sind momentan in der DB.
            </div>

            <div
              v-for="(jeweiligeNews, index) in news"
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
                jeweiligeNews.news_titel
              }}</span>
              <img
                v-if="fotoEnthalten(index)"
                :src="urlOfFoto(index)"
                class="w-20 h-20 border border-gray-50 rounded-lg my-2"
                alt="Foto"
              />
              <div v-else class="flex w-20 h-20 justify-center items-center">
                Kein Foto
              </div>
              <button key:index @click="deleteNews(index)" class="btn btn-red">
                delete
              </button>
            </div>

            <div class="mt-5 md:mt-0 md:col-span-2">
              <div>
                <div class="shadow overflow-hidden sm:rounded-md">
                  <div class="px-4 py-5 bg-gray-300 sm:p-6">
                    <label
                      for="name"
                      class="block text-sm font-medium text-gray-700"
                      >Neuer News-Titel</label
                    >
                    <input
                      v-model="formdata.news_titel"
                      maxlength="70"
                      type="text"
                      id="news_titel"
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
                        >News-Textinhalt</label
                      >
                      <textarea
                        maxlength="255"
                        v-model="formdata.news_textfeld"
                        id="news_textfeld"
                        autocomplete="Beschreibung"
                        placeholder="Pflichtfeld. [Inhalt der News, wird unter dem Titel eingefügt]"
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
                        Bsp: newsbildname.jpg oder newsbildname.png
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
                    <div class="flex items-center justify-center">
                      <button
                        @click="showSubmitButton"
                        class="
                          bg-green-900
                          text-xs
                          sm:text-base
                          p-1
                          mt-2
                          text-white
                          border border-green-600
                          rounded-md
                          hover:bg-green-500
                        "
                      >
                        Kein News-Foto uploaden
                      </button>
                    </div>
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
import repository from "./repository/repository";
import Swal from "sweetalert2";

export default {
  data() {
    return {
      name: "NewsAnlegen",
      loading: null, //für die Einblendung vom loading-gif
      image: "",
      news: [],
      error: null,
      submitvisibility: "hidden",
      formdata: {
        news_titel: null,
        news_textfeld: null,
        news_bild_url: null,
      }, //Objekt zum Speichern der Model-Daten von oben
    };
  },

  //Noch bevor Component gemounted ist, checke Login-Status
  //Falls nicht eingeloggt -> Redirect zu Login-Page
  created() {
    //console.log(localStorage.getItem("isLoggedIn"));
    if (localStorage.getItem("isLoggedIn") != "true") {
      this.$router.push({ name: "adminLogin" });
    }
    this.loadNews();
  },

  methods: {
    fotoEnthalten(index) {
      return this.news[index].news_bild_url != null &&
        this.news[index].news_bild_url != ""
        ? true
        : false;
    },

    async loadNews() {
      this.loading = true;
      let { data } = await repository.getNews();
      this.news = data.data;
      this.loading = false;
      console.log(this.news);
    },

    urlOfFoto(index) {
      try {
        return "/images/aussteller/" + this.news[index].news_bild_url;
      } catch (error) {
        console.log(error);
      }
    },
    showSubmitButton() {
      this.submitvisibility = "block";
    },
    //image aus dem inputfield lesen
    handleOnChange(e) {
      this.image = e.target.files[0];
      /*console.log(this.image);
      console.log(this.image.name);*/
    },
    //image uploaden
    upload() {
      //formdata reset, falls öfter aufgerufen wurde
      this.formdata.news_bild_url = null;
      const formData = new FormData();
      formData.set("image", this.image);

      axios.post("/api/imageupload", formData).then((response) => {
        //Server-Responseurl des Images zur bildurl innerhalb der formdata adden
        this.formdata.news_bild_url = response.data.filepath;
        Swal.fire({
          title: "Foto gespeichert!",
          heightAuto: false,
          confirmButtonText: "ok",
          confirmButtonColor: "#3cb371",
        });
      });
    },

    deleteNews(index) {
      axios.delete("/api/news/" + this.news[index].id).then((response) => {
        console.log(response);
        //laravel response zu component object hinzufügen zur späteren Ausgabe
        this.laravelResponseData = response.data;
        Swal.fire({
          title: "Erfolgreich gelöscht!",
          heightAuto: false,
          showConfirmButton: false,
        });
        location.reload();
      });
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
        //console.log(error);
      }
    },
    submitform() {
      let formToJson = JSON.stringify(this.formdata);
      //console.log(formToJson);
      try {
        axios
          .post("/api/news", this.formdata)
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
</style>


