<template>
  <div>
    <div class="hidden sm:block" aria-hidden="true">
      <div class="py-5">
        <div class="border-t border-gray-200"></div>
      </div>
    </div>

    <div class="mt-10 sm:mt-0">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
          <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium leading-6 text-white">
              Bitte persönliche Infos des Ausstellers angeben.
            </h3>
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
                      autocomplete="given-name"
                      class="
                        mt-1
                        focus:ring-indigo-500
                        focus:border-indigo-500
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
                      class="
                        mt-1
                        focus:ring-indigo-500
                        focus:border-indigo-500
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
                      class="
                        mt-1
                        focus:ring-indigo-500
                        focus:border-indigo-500
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
                    focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500
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

