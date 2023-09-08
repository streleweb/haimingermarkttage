<template>
  <DashboardLayout path="programmanlegen">
    <div class="w-full h-full bg-gray-900">
      <div class="bg-gray-800 flex flex-col justify-evenly p-4 md:p-10 lg:p-20">
        <div class="mt-10 sm:mt-0">
          <div class="">
            <div class="text-gray-400 pb-3">
              <h3 class="text-lg font-medium leading-6 text-white pb-1">
                Tagesprogramm anlegen oder löschen.
              </h3>
              Hier können Sie ein neues Tagesprogramm verfassen oder ein
              bestehendes bearbeiten, sowie löschen.
            </div>

            <div v-for="(jeweiligesProgramm, index) in programmArray" :key="index" class="
                      flex
                      justify-evenly
                      pl-3
                      text-white
                      bg-green-900
                      mb-3
                      border border-gray-600
                    ">
              <span class="flex w-32 items-center">{{
                jeweiligesProgramm.programm_titel
              }}</span>
              <img v-if="fotoEnthalten(index)" :src="urlOfFoto(index)"
                class="w-20 h-20 border border-gray-50 rounded-lg my-2" alt="Foto" />
              <div v-else class="flex w-20 h-20 justify-center items-center">
                Kein Foto
              </div>
              <div class="flex justify-center items-center gap-3">
                <button key:index @click="toggleEditPopup(index)"
                  class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
                  edit
                </button>
                <button key:index @click="deleteProgramm(index)"
                  class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                  delete
                </button>
              </div>

            </div>

            <!-- Edit Programm Popup START -->
            <div class="popup-overlay" v-if="showEditPopup">
              <div class="popup">
                <!-- Add a close button for the popup -->
                <button @click="closeEditPopup()" class="close-btn">&times;</button>

                <!-- INPUT ELEMENTS -->
                <div>
                  <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-gray-300 sm:p-6">
                      <label for="name" class="block text-sm font-medium text-gray-700">Programm-Titel</label>
                      <input v-model="formdataEdit.programm_titel" maxlength="70" type="text" id="programm_titel"
                        placeholder="Pflichtfeld" autocomplete="given-name" class="
                              mt-1
                              focus:ring-green-500 focus:border-green-500
                              block
                              w-full
                              shadow-sm
                              sm:text-sm
                              border-gray-300
                              rounded-md
                            " />

                      <div class="col-span-6 sm:col-span-4">
                        <label for="email_address"
                          class="block text-sm font-medium text-gray-700">Programmbeschreibung</label>
                        <textarea maxlength="2000" v-model="formdataEdit.programm_beschreibung" id="programm_beschreibung"
                          autocomplete="Beschreibung"
                          placeholder="Pflichtfeld. [Inhalt des Programms, wird unter dem Titel eingefügt] Maximal 2000 Zeichen"
                          class="
                                mt-1
                                focus:ring-green-500 focus:border-green-500
                                block
                                w-full
                                shadow-sm
                                sm:text-sm
                                border-gray-300
                                rounded-md
                              " />
                      </div>

                      <!--IMAGE FILE UPLOAD START-->
                      <div class="py-2 bg-green-900 text-white mb-1 px-2 text-center">
                        Aktuelles Foto
                        <div class="flex justify-center">
                          <img v-if="formdataEdit.programm_bild_url" :src="formdataEditBildUrl()"
                            class="w-20 h-20 border border-gray-50 rounded-lg my-2" alt="Foto" />
                        </div>
                        <div class="alert">
                          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                          <strong>Achtung!</strong> Maximale Filesize: 1.9MB
                          <br />
                          Bsp: programmbildname.jpg oder programmbildname.png
                        </div>
                      </div>
                      <form @submit.prevent="uploadFromEdit" class="flex items-center justify-center mt-3">
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
                          Kein Programm-Foto uploaden
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
                      <button id="submitbutton" @click="update" class="
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
                              focus:ring-2
                              focus:ring-offset-2
                              focus:ring-green-500
                            ">
                        In DB Speichern
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- INPUT ELEMENTS END -->


            <!-- Edit Programm Popup END -->

            <!-- Neues Programm anlegen START -->
            <div class="mt-5 md:mt-0 md:col-span-2" v-if="!showEditPopup">
              <div>
                <div class="shadow overflow-hidden sm:rounded-md">
                  <div class="px-4 py-5 bg-gray-300 sm:p-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">Neuer Programm-Titel</label>
                    <input v-model="formdata.programm_titel" maxlength="70" type="text" id="programm_titel"
                      placeholder="Pflichtfeld, max. 70 Zeichen" autocomplete="given-name" class="
                              mt-1
                              focus:ring-green-500 focus:border-green-500
                              block
                              w-full
                              shadow-sm
                              sm:text-sm
                              border-gray-300
                              rounded-md
                            " />

                    <div class="col-span-6 sm:col-span-4">
                      <label for="email_address"
                        class="block text-sm font-medium text-gray-700">Programm-Textinhalt</label>
                      <textarea maxlength="500" v-model="formdata.programm_beschreibung" id="programm_beschreibung"
                        autocomplete="Beschreibung"
                        placeholder="Optional. MIN 10 Zeichen! max. 500 Zeichen[Programmbeschreibung, wird unter dem Titel eingefügt]"
                        class="
                                mt-1
                                focus:ring-green-500 focus:border-green-500
                                block
                                w-full
                                shadow-sm
                                sm:text-sm
                                border-gray-300
                                rounded-md
                              " />
                    </div>

                    <!--IMAGE FILE UPLOAD START-->
                    <div class="py-2 bg-green-900 text-white mb-1 px-2">
                      Foto Upload
                      <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        <strong>Achtung!</strong> Maximale Filesize: 1.9MB
                        <br />
                        Bsp: bildname.jpg oder bildname.png
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
                        Kein Programm-Bild beifügen
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
                              focus:ring-2
                              focus:ring-offset-2
                              focus:ring-green-500
                            ">
                      In DB Speichern
                    </button>
                  </div>
                </div>
              </div>
            </div> <!-- Neues Programm anlegen END -->
          </div>
        </div>
      </div>
    </div>
  </DashboardLayout>
</template>


<script>
import MobileMenu from "./ReusableComponents/MobileMenu";
import repository from "./repository/repository";
import Swal from "sweetalert2";
import { sortMostRecentFirst } from '../../utilityfunctions/utils'
import DashboardLayout from "./ReusableComponents/DashboardLayout.vue";

export default {
  data() {
    return {
      name: "ProgrammAnlegen",
      image: "",
      programmArray: [],
      error: null,
      submitvisibility: "hidden",
      showEditPopup: false,
      formdata: {
        programm_titel: null,
        programm_beschreibung: null,
        programm_bild_url: null,
      }, //Objekt zum Speichern der Model-Daten von oben
      formdataEdit: {
        id: null,
        programm_titel: null,
        programm_beschreibung: null,
        programm_bild_url: null,
      },
      formdataEditIndex: null
    };
  },
  created() {
    this.loadProgramm();
    window._ = require("lodash");
    window.axios.defaults.headers.common = { "Authorization": `Bearer ${localStorage.getItem("token")}` };
  },
  methods: {
    toggleEditPopup(index) {
      this.showEditPopup = !this.showEditPopup;
      if (this.showEditPopup) {
        this.fillFormDataByProgrammIndex(index)
      }
    },
    closeEditPopup() {
      this.showEditPopup = false;
    },
    formdataEditBildUrl() {
      return "/images/aussteller/" + this.formdataEdit.programm_bild_url;
    },
    fillFormDataByProgrammIndex(index) {
      this.formdataEdit = this.programmArray[index];
      console.log(this.formdataEdit)
    },
    fotoEnthalten(index) {
      return this.programmArray[index].programm_bild_url != null &&
        this.programmArray[index].programm_bild_url != ""
        ? true
        : false;
    },
    async loadProgramm() {
      this.loading = true;
      let { data } = await repository.getProgramm();
      this.programmArray = sortMostRecentFirst(data.data);
      this.loading = false;
      //console.log(this.programmArray);
    },
    urlOfFoto(index) {
      try {
        return ("/images/aussteller/" + this.programmArray[index].programm_bild_url);
      }
      catch (error) {
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
      this.formdata.programm_bild_url = null;
      const formData = new FormData();
      formData.set("image", this.image);
      axios.post("/api/imageupload", formData).then((response) => {
        //Server-Responseurl des Images zur bildurl innerhalb der formdata adden
        this.formdata.programm_bild_url = response.data.filepath;
        Swal.fire({
          title: "Foto gespeichert!",
          heightAuto: false,
          confirmButtonText: "ok",
          confirmButtonColor: "#3cb371",
        });
      });
    },
    uploadFromEdit() {
      //formdata reset, falls öfter aufgerufen wurde
      this.formdataEdit.programm_bild_url = null;
      const formDataEdit = new FormData();
      formDataEdit.set("image", this.image);
      axios.post("/api/imageupload", formDataEdit).then((response) => {
        //Server-Responseurl des Images zur bildurl innerhalb der formdata adden
        this.formdataEdit.programm_bild_url = response.data.filepath;
        Swal.fire({
          title: "Foto gespeichert!",
          heightAuto: false,
          confirmButtonText: "ok",
          confirmButtonColor: "#3cb371",
        });
      });
    },
    update() {
      try {
        axios
          .put("/api/programm/" + this.formdataEdit.id, this.formdataEdit)
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
            console.log(error);
            Swal.fire({
              title: "Beschreibung min:10|max:500, Titel min:2|max:70",
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
        setTimeout(function () {
          location.reload();
        }, 3000);
      }
    },
    deleteProgramm(index) {
      axios
        .delete("/api/programm/" + this.programmArray[index].id)
        .then((response) => {
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

    submitform() {
      let formToJson = JSON.stringify(this.formdata);
      //console.log(formToJson);
      try {
        axios
          .post("/api/programm", this.formdata)
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
              title: "Beschreibung min:10|max:500, Titel min:2|max:70",
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
        setTimeout(function () {
          location.reload();
        }, 3000);
      }
    },
  },
  components: { MobileMenu, DashboardLayout }
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
  padding: 20px;
  border-radius: 8px;
  width: 90%;
  max-width: 100%;
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


