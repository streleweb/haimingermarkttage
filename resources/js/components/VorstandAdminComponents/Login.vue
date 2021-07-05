<template>
  <div
    class="
      min-h-screen
      flex
      items-center
      justify-center
      bg-gray-50
      py-12
      px-4
      sm:px-6
      lg:px-8
      w-screen
    "
  >
    <div
      class="
        max-w-md
        w-full
        space-y-8
        flex flex-col
        justify-center
        items-center
      "
    >
      <p v-if="loading">
        <img
          src="/images/icons/gifs/loadingtransparent.gif"
          alt="loading..."
          class="resize-loadinggif"
        />
      </p>

      <div
        class="text-red-500 text-center content-center"
        v-if="error"
        id="fehler"
      >
        {{ error }}
      </div>
      <div>
        <img
          class="mx-auto h-20 w-auto border border-green-500"
          src="/images/icons/pngs/icon-512x512.png"
          alt="Workflow"
        />
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
          Admin login
        </h2>
      </div>
      <div class="mt-8 space-y-6 w-5/6 md:w-100">
        <input type="hidden" name="remember" value="true" />
        <div class="rounded-md shadow-sm -space-y-px">
          <div>
            <label for="email-address" class="sr-only">Email address</label>
            <input
              v-model="user.email"
              :class="{ 'border-red-600': inputfieldred }"
              id="email-address"
              name="email"
              type="email"
              autocomplete="email"
              required
              class="
                appearance-none
                rounded-none
                relative
                block
                w-full
                px-3
                py-2
                border border-gray-300
                placeholder-gray-500
                text-gray-900
                rounded-t-md
                focus:outline-none
                focus:ring-green-500
                focus:border-green-500
                focus:z-10
                sm:text-sm
              "
              placeholder="E-Mail Adresse"
            />
          </div>
          <div>
            <label for="password" class="sr-only">Passwort</label>
            <input
              v-model="user.password"
              :class="{ 'border-red-600': inputfieldred }"
              id="password"
              name="password"
              type="password"
              autocomplete="current-password"
              required
              class="
                appearance-none
                rounded-none
                relative
                block
                w-full
                px-3
                py-2
                border border-gray-300
                placeholder-gray-500
                text-gray-900
                rounded-b-md
                focus:outline-none
                focus:ring-green-500
                focus:border-green-500
                focus:z-10
                sm:text-sm
              "
              placeholder="Passwort"
            />
          </div>
        </div>

        <div class="flex items-center justify-between"></div>

        <div>
          <button
            @click="handleLogin()"
            class="
              group
              relative
              w-full
              flex
              justify-center
              py-2
              px-4
              border border-transparent
              text-sm
              font-medium
              rounded-md
              text-white
              bg-green-900
              hover:bg-green-700
              focus:outline-none
              focus:ring-2 focus:ring-offset-2 focus:ring-green-500
            "
          >
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <!-- Heroicon name: solid/lock-closed -->
              <svg
                class="h-5 w-5 text-white group-hover:text-gray-50"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
                aria-hidden="true"
              >
                <path
                  fill-rule="evenodd"
                  d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                  clip-rule="evenodd"
                />
              </svg>
            </span>
            Sign in
          </button>
        </div>
      </div>
    </div>
  </div>
</template>



<script>
import Swal from "sweetalert2";

export default {
  name: "Login",

  data() {
    return {
      user: {
        email: null,
        password: null,
      },
      loading: false,
      error: null,
      inputfieldred: false,
    };
  },

  beforeCreate() {
    if (localStorage.getItem("isLoggedIn") == "true") {
      this.$router.push({ name: "admindashboard" });
    }
  },

  watch: {
    error() {
      if (this.error != null) {
        this.inputfieldred = true;
      }
    },
  },

  methods: {
    async handleLogin() {
      this.loading = true;
      this.error = null;
      try {
        await axios
          .create({
            withCredentials: true, //siehe CORS-config Laravel
          })
          .get("http://localhost:8000/api/sanctum/csrf-cookie")
          .then((response) => {
            axios
              .post("http://localhost:8000/api/admin/login", this.user)
              .then((response) => {
                //debug
                //console.log(response.data.token);
                if (response.status == 201) {
                  //LoggedIn-Status in localStorage abspeichern
                  localStorage.setItem("isLoggedIn", "true");
                  this.$router.push({ name: "admindashboard" });
                } else {
                  localStorage.setItem("isLoggedIn", "false");
                  Swal.fire({
                    title: "Login nicht erfolgreich!",
                    text: "Überprüfen Sie bitte Ihre Login-Daten",
                    confirmButtonText: "ok",
                    confirmButtonColor: "#3cb371",
                  });
                }
              })
              .catch((err) => {
                if (err.response) {
                  //Wenn Client error response bekommen hat (5xx, 4xx)
                  this.error =
                    "Login nicht erfolgreich.. Überprüfen Sie bitte Ihre Login-Daten";
                  console.log(response);
                } else if (err.request) {
                  //wenn Client keine Response bekommt, oder der Request nicht gesendet wurde
                  this.error =
                    "Konnte keine Server-Response erhalten, bitte überprüfen Sie ihre Internet-Connection";
                } else {
                  this.error =
                    "Ihre Logindaten stimmen, es ist ein anderer Fehler aufgetreten.";
                }
              });
          });
      } catch (error) {
        console.log("Try: " + error);
      } finally {
        this.loading = false;
        this.error = null;
      }
    },
  },
};
</script>




