<template>
  <div class="w-full h-full bg-gray-900">
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
              <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </div>
            <div class="
                        flex-1 flex
                        items-center
                        justify-center
                        sm:items-stretch
                        sm:justify-start
                      ">
              <div class="flex-shrink-0 flex items-center"></div>
              <div class="hidden sm:block sm:ml-6">
                <div class="flex space-x-4">
                  <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                  <router-link to="/admin/dashboard"><span class="text-gray-500 text-lg">Dashboard</span></router-link>
                  <div class="
                              text-gray-300
                              hover:bg-gray-700
                              hover:text-white
                              px-3
                              py-2
                              rounded-md
                              text-sm
                              font-medium
                            ">
                    <router-link to="/admin/dashboard/ausstelleruebersicht">Aussteller
                    </router-link>
                  </div>

                  <div class="
                              text-gray-300
                              hover:bg-gray-700
                              hover:text-white
                              px-3
                              py-2
                              rounded-md
                              text-sm
                              font-medium
                            ">
                    <router-link to="/admin/dashboard/news">News</router-link>
                  </div>

                  <div class="
                            text-gray-300
                            hover:bg-gray-700
                            hover:text-white
                            px-3
                            py-2
                            rounded-md
                            text-sm
                            font-medium
                                  ">
                    <router-link to="/admin/dashboard/programmanlegen">
                      Programm</router-link>
                  </div>

                  <div class="
                              text-gray-300
                              hover:bg-gray-700
                              hover:text-white
                              px-3
                              py-2
                              rounded-md
                              text-sm
                              font-medium
                            ">
                    <router-link to="/admin/dashboard/editfotogalerie">Fotogalerie</router-link>
                  </div>
                  <div class="
                                  text-gray-300
                                  hover:bg-gray-700
                                  hover:text-white
                                  px-3
                                  py-2
                                  rounded-md
                                  text-sm
                                  font-medium
                                ">
                    <router-link to="/admin/dashboard/hometext">Home-Text</router-link>
                  </div>
                </div>
              </div>
            </div>
            <div class="
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
                      ">
              <div class="
                          text-gray-300
                          hover:bg-red-900
                          hover:text-white
                          px-3
                          py-2
                          rounded-md
                          text-sm
                          font-medium
                        ">
                <span class="text-white cursor-pointer" @click="handleLogout()">Logout</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <MobileMenu />
      </nav>
      <!--END DASHBOARD-->

      <div class="bg-gray-800 flex flex-col justify-evenly p-4 md:p-10 lg:p-20">
        <p v-if="error" style="...">{{ error }}</p>

        <div class="mt-10 sm:mt-0">
          <div class="">
            <div class="text-gray-400 pb-3">
              <h3 class="text-lg font-medium leading-6 text-white pb-1">
                Aussteller ändern
              </h3>
              Folgende Aussteller sind momentan gespeichert und können verändert
              werden.
            </div>

            <div class="md:grid md:grid-cols-2 lg:w-80vw gap-5">
              <div v-for="(jeweiligerAussteller, index) in aussteller" :key="index" class="
                flex
                pl-3
                pt-4
                pb-4
              text-white
              bg-green-900
                mb-3
                border border-gray-600
                gap-3
                justify-between
              ">
                <span class="inline-flex">{{ jeweiligerAussteller.aussteller_fullname }}</span>
                <div class="flex justify-center items-center mr-4 gap-5">
                  <button key:index @click="toggleEditPopup(index)"
                    class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                    edit
                  </button>
                  <button key:index @click="deleteAussteller(index)"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    delete
                  </button>
                </div>
              </div>
            </div>

            <!-- START EDIT POPUP -->
            <div class="popup-overlay" v-if="showEditPopup">
              <div class="popup">
                <button @click="closeEditPopup()" class="close-btn">&times;</button>
                <div class="shadow overflow-hidden sm:rounded-md">
                  <div class="px-4 py-5 bg-gray-300 sm:p-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Vor und Nachname</label>
                    <input v-model="formdata.aussteller_fullname" maxlength="30" type="text" id="full_name"
                      placeholder="Pflichtfeld" autocomplete="given-name" class="
                                mt-1
                                focus:ring-green-500
                                focus:border-green-500
                                block
                                w-full
                                shadow-sm
                                sm:text-sm
                                border-gray-300
                                rounded-md
                              " />
                    <label class="block text-sm font-medium text-gray-700">Handelsname (Branding-Name) des
                      Ausstellers</label>
                    <input maxlength="30" type="text" v-model="formdata.aussteller_brandingname" id="handelsname"
                      placeholder="Optional" autocomplete="given-name" class="
                                mt-1
                                focus:ring-green-500
                                focus:border-green-500
                                block
                                w-full
                                shadow-sm
                                sm:text-sm
                                border-gray-300
                                rounded-md
                              " />
                    <!--EMAIL START-->
                    <div class="col-span-6 sm:col-span-4">
                      <label for="email_address" class="block text-sm font-medium text-gray-700">Aussteller-E-Mail</label>
                      <input maxlength="100" type="text" v-model="formdata.aussteller_email" id="email_address"
                        autocomplete="email" placeholder="Optional" class="
                                  mt-1
                                  focus:ring-green-500
                                  focus:border-green-500
                                  block
                                  w-full
                                  shadow-sm
                                  sm:text-sm
                                  border-gray-300
                                  rounded-md
                                " />
                    </div>
                    <!--EMAIL END-->

                    <div>
                      <label for="company_website" class="block text-sm font-medium text-gray-700">
                        Aussteller-Website
                      </label>
                      <div class="mt-1 flex rounded-md shadow-sm">
                        <span class="
                                    inline-flex
                                    items-center
                                    px-3
                                    rounded-l-md
                                    border border-r-0 border-gray-300
                                    bg-gray-50
                                    text-gray-500 text-sm
                                  ">
                          http://
                        </span>
                        <input maxlength="50" type="text" v-model="formdata.aussteller_websiteurl" id="aussteller_website"
                          class="
                                    focus:ring-green-500
                                    focus:border-green-500
                                    flex-1
                                    block
                                    w-full
                                    rounded-none rounded-r-md
                                    sm:text-sm
                                    border-gray-300
                                  " placeholder="www.example.com" />
                      </div>
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                      <label for="email_address" class="block text-sm font-medium text-gray-700">Beschreibung</label>
                      <textarea maxlength="250" v-model="formdata.aussteller_beschreibung" id="beschreibung"
                        autocomplete="Beschreibung"
                        placeholder="Optional [Beschreibung inkl. der angebotenen Produkte des Ausstellers]" class="
                                  mt-1
                                  focus:ring-green-500
                                  focus:border-green-500
                                  block
                                  w-full
                                  shadow-sm
                                  sm:text-sm
                                  border-gray-300
                                  rounded-md
                                " />
                    </div>

                    <section class="flex justify-evenly mt-4">
                      <div>
                        <label for="street_address" class="block text-sm font-medium text-gray-700">Top Aussteller</label>
                        <input type="checkbox" v-model="formdata.aussteller_istopaussteller" :id="formdata.aussteller_id">
                      </div>
                      <div class="col-span-6">
                        <label for="street_address" class="block text-sm font-medium text-gray-700">Zonenfarbe am
                          Markt</label>
                        <!--COLORBUTTONS START-->
                        <div class="pt-3">
                          <label class="container" @click="assignColor(BLAU)">Blau
                            <div class="bg-blue-500 h-2 w-5 rounded-md" @click="assignColor(BLAU)"></div>
                            <input @click="assignColor(BLAU)" v-bind:checked="formdata.aussteller_zonenfarbe === BLAU"
                              type="radio" name="radio" />
                            <span @click="assignColor(BLAU)" class="checkmark"></span>
                          </label>
                          <label class="container" @click="assignColor(ROT)">Rot
                            <div @click="assignColor(ROT)" class="bg-red-600 h-2 w-5 rounded-md"></div>
                            <input @click="assignColor(ROT)" :checked="formdata.aussteller_zonenfarbe === ROT"
                              type="radio" name="radio" />
                            <span @click="assignColor(ROT)" class="checkmark"></span>
                          </label>
                          <label class="container" @click="assignColor(GELB)">Gelb
                            <div @click="assignColor(GELB)" class="bg-yellow-300 h-2 w-5 rounded-md"></div>
                            <input @click="assignColor(GELB)" :checked="formdata.aussteller_zonenfarbe === GELB"
                              type="radio" name="radio" />
                            <span @click="assignColor(GELB)" class="checkmark"></span>
                          </label>
                          <label class="container" @click="assignColor(GRUEN)">Grün
                            <div @click="assignColor(GRUEN)" class="bg-green-500 h-2 w-5 rounded-md"></div>
                            <input @click="assignColor(GRUEN)" :checked="formdata.aussteller_zonenfarbe === GRUEN"
                              type="radio" name="radio" />
                            <span @click="assignColor(GRUEN)" class="checkmark"></span>
                          </label>
                          <label class="container" @click="assignColor(BRAUN)">Braun
                            <div @click="assignColor(BRAUN)" class="bg-yellow-900 h-2 w-5 rounded-md"></div>
                            <input @click="assignColor(BRAUN)" :checked="formdata.aussteller_zonenfarbe === BRAUN"
                              type="radio" name="radio" />
                            <span @click="assignColor(BRAUN)" class="checkmark"></span>
                          </label>
                        </div>
                        <!--COLORBUTTONS END-->
                      </div>
                      <!-- 16 09 2021 -->
                      <div class="col-span-6">
                        <label for="street_address" class="block text-sm font-medium text-gray-700">Produktreiter</label>
                        <!--COLORBUTTONS START-->
                        <div class="pt-3">
                          <label class="container">Lebensmittel
                            <input type="checkbox" id="lebensmittel_checkbox"
                              :checked="formdata.aussteller_produktreiter.includes(1)" name="checkbox" />
                            <span @click="assignToLebensmittel" class="checkmark"></span>
                          </label>
                          <label class="container">Gastronomie
                            <input type="checkbox" id="gastronomie_checkbox"
                              :checked="formdata.aussteller_produktreiter.includes(2)" name="checkbox" />
                            <span @click="assignToGastronomie" class="checkmark"></span>
                          </label>
                          <label class="container" @click="assignToHandwerk">Handwerk
                            <input @click="assignToHandwerk" type="checkbox" id="handwerk_checkbox"
                              :checked="formdata.aussteller_produktreiter.includes(3)" name="checkbox" />
                            <span @click="assignToHandwerk" class="checkmark"></span>
                          </label>
                          <label class="container" @click="assignToTextil">Textil
                            <input @click="assignToTextil" type="checkbox" id="textil_checkbox"
                              :checked="formdata.aussteller_produktreiter.includes(4)" name="checkbox" />
                            <span @click="assignToTextil" class="checkmark"></span>
                          </label>
                          <label class="container" @click="assignToAllerlei">Allerlei
                            <input @click="assignToAllerlei" type="checkbox" id="allerlei_checkbox"
                              :checked="formdata.aussteller_produktreiter.includes(5)" name="checkbox" />
                            <span @click="assignToAllerlei" class="checkmark"></span>
                          </label>
                        </div>
                        <!--COLORBUTTONS END-->
                      </div>
                    </section>
                    <!-- 16 09 2021 END -->
                    <!--IMAGE FILE UPLOAD START-->
                    <div class="py-2 bg-green-900 text-white mb-1 px-2 text-center font-bold">
                      Aktuelles Foto
                      <div class="flex justify-center">
                        <img v-if="formdata.aussteller_bildurl" :src="formdataEditBildUrl()"
                          class="w-20 h-20 border border-gray-50 rounded-lg my-2" alt="Foto" />
                        <div v-else class="font-thin">Kein Foto</div>
                      </div>
                      <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        <strong>Achtung!</strong> Maximale Filesize: 1.9MB
                        <br />
                        Bsp: newsbildname.jpg oder newsbildname.png
                      </div>
                    </div>
                    <form @submit.prevent="upload" class="flex items-center justify-center mt-3">
                      <input @change="handleOnChange" type="file" class="text-xs sm:text-base" />
                      <button @click="showSubmitButton" class="
                                  bg-green-900
                                  text-xs
                                  sm:text-base
                                  p-1
                                  text-white
                                  border border-green-600
                                  rounded-md
                                  hover:bg-green-500
                                ">
                        Upload photo
                      </button>
                    </form>
                    <div class="flex items-center justify-center">
                      <button @click="showSubmitButton" class="
                                  bg-green-900
                                  text-xs
                                  sm:text-base
                                  p-1
                                  mt-2
                                  text-white
                                  border border-green-600
                                  rounded-md
                                  hover:bg-green-500
                                ">
                        Kein Ausstellerfoto uploaden
                      </button>
                    </div>
                    <!--IMAGE FILE UPLOAD END-->
                  </div>

                  <div class="
                              flex
                              justify-center
                              px-4
                              py-3
                              bg-gray-600
                              border-t-2 border-gray-800
                              text-right
                              sm:px-6
                            ">
                    <button id="submitbutton" @click="submitform" :class="submitvisibility" class="
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
                              ">
                      In DB Speichern
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- END EDIT POPUP -->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import repository from "./repository/repository";
import Swal from "sweetalert2";
import axios from "axios";
import MobileMenu from "./MobileMenu.vue";

export default {
  data() {
    return {
      name: "Ausstelleranlegen",
      loading: null,
      image: "",
      aussteller: [],
      error: null,
      submitvisibility: "hidden",
      showEditPopup: false,
      BLAU: "bg-blue-500",
      ROT: "bg-red-600",
      GELB: "bg-yellow-300",
      GRUEN: "bg-green-500",
      BRAUN: "bg-yellow-900",
      formdata: {
        aussteller_id: null,
        aussteller_fullname: null,
        aussteller_beschreibung: null,
        aussteller_zonenfarbe: null,
        aussteller_brandingname: null,
        aussteller_email: null,
        aussteller_websiteurl: null,
        aussteller_bildurl: null,
        aussteller_produktreiter: [],
        aussteller_istopaussteller: false
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
    this.loadAussteller();
    window._ = require("lodash");
    window.axios.defaults.headers.common = { "Authorization": `Bearer ${localStorage.getItem("token")}` };
    // this.aussteller_produktreiter();
  },
  methods: {
    deleteAussteller(index) {
      axios
        .delete("/api/aussteller/" + this.aussteller[index].id)
        .then((response) => {
          //console.log(response);
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
    async toggleEditPopup(index) {
      const ausstellerId = this.aussteller[index].id;

      await this.loadProduktReiter(ausstellerId);

      this.showEditPopup = !this.showEditPopup;
      if (this.showEditPopup) {
        this.fillFormDataByAusstellerIndex(index);
      }
    },

    isColorChecked(color) {
      return this.formdata.aussteller_zonenfarbe === color;
    },

    assignColor(color) {
      this.formdata.aussteller_zonenfarbe = color;
    },

    fillFormDataByAusstellerIndex(index) {
      this.formdata.aussteller_id = this.aussteller[index].id,
        this.formdata.aussteller_fullname = this.aussteller[index].aussteller_fullname,
        this.formdata.aussteller_beschreibung = this.aussteller[index].aussteller_beschreibung,
        this.formdata.aussteller_zonenfarbe = this.aussteller[index].aussteller_zonenfarbe,
        this.formdata.aussteller_brandingname = this.aussteller[index].aussteller_brandingname,
        this.formdata.aussteller_email = this.aussteller[index].aussteller_email,
        this.formdata.aussteller_websiteurl = this.aussteller[index].aussteller_websiteurl,
        this.formdata.aussteller_bildurl = this.aussteller[index].aussteller_bildurl,
        this.formdata.aussteller_istopaussteller = this.aussteller[index].aussteller_istopaussteller,
        console.log("fillFormDataByAusstellerIndex: " + this.formdata.aussteller_produktreiter)
    },
    closeEditPopup() {
      this.showEditPopup = false;
    },
    formdataEditBildUrl() {
      return "/images/aussteller/" + this.formdata.aussteller_bildurl;
    },
    async loadAussteller() {
      this.loading = true;
      let { data } = await repository.getAussteller();
      this.aussteller = data.data;
      //check the checked fields if aussteller-produktreiter is already set
      this.loading = false;
      // console.log("Aussteller geladen: " + this.aussteller[0].aussteller_produktreiter);
    },
    loadProduktReiter(id) {
      axios.get("/api/aussteller/" + id).then((response) => {
        //console.log("Debug status:" + response.status);
        if (response.status == 200) {
          // console.log("loadProduktreiter successful: ");
          // console.log(JSON.stringify(response.data, null, 2));
          response.data.forEach(produktreiter => {
            this.formdata.aussteller_produktreiter.push(produktreiter.id)
          });
          console.log("formdata produktreiter after loadProduktReiter:" + this.formdata.aussteller_produktreiter)

        }
      });
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
      this.formdata.aussteller_bildurl = null;
      const formData = new FormData();
      formData.set("image", this.image);
      axios.post("/api/imageupload", formData).then((response) => {
        //Server-Responseurl des Images zur aussteller_bildurl innerhalb der formdata adden
        this.formdata.aussteller_bildurl = response.data.filepath;
        Swal.fire({
          title: "Foto gespeichert!",
          heightAuto: false,
          confirmButtonText: "ok",
          confirmButtonColor: "#3cb371",
        });
      });
      //console.log(this.aussteller_bildurl);
    },
    produktreiterContains(number) {
      return this.formdata.aussteller_produktreiter.includes(number);
    },
    //assign to specific produktreiter
    assignToLebensmittel() {
      if (!this.produktreiterContains(1)) this.formdata.aussteller_produktreiter.push(1);
    },
    assignToGastronomie() {
      if (!this.produktreiterContains(2)) this.formdata.aussteller_produktreiter.push(2);
    },
    assignToHandwerk() {
      if (!this.produktreiterContains(3)) this.formdata.aussteller_produktreiter.push(3);
    },
    assignToTextil() {
      if (!this.produktreiterContains(4)) this.formdata.aussteller_produktreiter.push(4);
    },
    assignToAllerlei() {
      if (!this.produktreiterContains(5)) this.formdata.aussteller_produktreiter.push(5);
    },
    loggedIn() {
      if (localStorage.getItem("isLoggedIn") == "true") {
        return true;
      }
      else
        return false;
    },
    async handleLogout() {
      try {
        await axios.post("/api/admin/logout");
        //LocalStorage LoggedIn-Status löschen
        localStorage.removeItem("isLoggedIn");
        localStorage;
        this.$router.push({ name: "adminLogin" });
      }
      catch (error) {
        //console.log(error);
      }
    },
    submitform() {
      let formToJson = JSON.stringify(this.formdata);
      console.log(formToJson);
      //submit id aswell for manytomany laravel function
      this.aussteller.forEach((a) => {
        if (a.aussteller_fullname == this.formdata.aussteller_fullname) {
          console.log(a.id);
          this.formdata.aussteller_id = a.id;
        }
      });
      try {
        axios
          .put("/api/aussteller/", this.formdata)
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
      }
      catch (error) {
        //console.error(error.response.data);
      }
      finally {
        this.$router.push({ name: "ausstelleruebersicht" });
      }
    },
  },
  components: { MobileMenu }
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
.container:hover input~.checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked~.checkmark {
  background-color: #2196f3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked~.checkmark:after {
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

/* POPUP OVERLAY */
/* Styles for the overlay */
.popup-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  /* Dark background overlay */
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1000;
  /* Ensure the overlay is above other content */
}

/* Styles for the popup */
.popup {
  background-color: #D1D5DB;
  padding: 10px;
  border-radius: 8px;
  width: 90%;
  max-width: 100%;
  max-height: 90vh;
  /* Limit the maximum height to 90% of the viewport height */
  overflow-y: auto;
  /* Add vertical scroll if content overflows */
  position: relative;
}


.close-btn {
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 20px;
  cursor: pointer;
  background: none;
  border: none;
  padding: 0;
}
</style>

