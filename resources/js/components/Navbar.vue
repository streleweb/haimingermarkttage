<template>
  <header>
    <!-- Nav -->
    <nav class="navbar">
      <!--flex
        items-center
        justify-between
        flex-wrap
        p-3
        bg-green-900
        border-b-2 border-black border-opacity-60;-->
      <div
        id="#LOGO UND LI CONTAINER"
        class="flex items-center flex-shrink space-x-5 text-white mr-6"
      >
        <!--<svg
          class="fill-current h-8 w-8 mr-2"
          width="54"
          height="54"
          viewBox="0 0 54 54"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"
          />
        </svg>-->

        <router-link
          class="
            font-semibold
            text-xs text-center
            items-center
            sm:text-xl
            tracking-tight
            inline-flex
          "
          to="/app"
          ><img
            src="/../../images/icons/pngs/7272transparent.png"
            class="resizeLogo"
            alt="Logo"
          />Haiminger Markttage</router-link
        ><!-- Nicht vergessen anstatt to /app noch to haiminger-markttage.at bzw. / -->

        <router-link
          to="/app/philosophie"
          exact
          class="hidden philosophiebp:inline-flex"
          >Philosophie</router-link
        >
        <router-link to="/app/news" exact class="hidden newsbp:inline-flex"
          >News</router-link
        >
        <router-link
          to="/app/fotogalerie"
          exact
          class="hidden fotogaleriebp:inline-flex"
          >Fotogalerie</router-link
        >
      </div>
      <!--END-LOGOCONTAINER-->
      <!--START- Iconcontainer-->
      <div id="iconcontainer" class="hidden ssm:inline-flex pr-4 space-x-2">
        <a href="https://www.facebook.com/Haiminger.Markttage"
          ><img
            src="/images/icons/svgs/facebook-logo.svg"
            class="resize-icon filter-white-icons"
            alt="fb"
        /></a>

        <a href="http://www.haiminger-markttage.at/"
          ><img
            src="/images/icons/svgs/www.svg"
            class="resize-icon filter-white-icons"
            alt="website"
        /></a>

        <a href="mailto:info@haiminger-markttage.at" target="_newtab"
          ><img
            src="/images/icons/svgs/email.svg"
            class="resize-icon filter-white-icons"
            alt="email"
        /></a>
      </div>

      <!--START BUTTON-div-->
      <div class="block lg:hidden">
        <button
          id="app"
          class="
            fixed
            top-3
            right-4
            items-center
            text-white
            focus:outline-none
            border-white border
            rounded
            px-3
            py-2
          "
        >
          <svg
            class="fill-current h-4 w-3 -mt-1 text-white"
            viewBox="0 0 20 15"
            xmlns="http://www.w3.org/2000/svg"
          >
            <title>Menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
          </svg>
        </button>
      </div>
      <!--END BUTTON-div-->

      <!--START OLD List-Items
      <div
        class="w-full block flex-grow lg:flex lg:items-center lg:w-auto"
        id="menu"
      >
        <div class="text-sm lg:flex-grow">
          <router-link
            class="
              no-underline
              block
              mt-4
              lg:inline-block
              lg:mt-0
              text-white
              hover:text-white
              mr-4
            "
            to="/app/philosophie"
            exact
            >Philosophie</router-link
          >

          <a
            href="#responsive-header"
            class="
              no-underline
              block
              mt-4
              lg:inline-block
              lg:mt-0
              text-white
              hover:text-white
              mr-4
            "
          >
            News
          </a>
          <a
            href="#responsive-header"
            class="
              no-underline
              block
              mt-4
              lg:inline-block
              lg:mt-0
              text-white
              hover:text-white
            "
          >
            Foto-Galerie
          </a>
        </div>
        <div>
          <a
            href="#"
            class="
              no-underline
              inline-block
              text-sm
              px-4
              py-2
              leading-none
              border
              rounded
              text-white
              border-white
              hover:border-transparent
              hover:text-blue-dark
              hover:bg-white
              mt-4
              lg:mt-0
            "
            >Download</a
          >
        </div>
      </div>--END OLD List-Items (Philosophie, News...)-->
    </nav>
    <!-- END Nav -->
  </header>
  <!-- END Header -->
</template>

<script>
export default {
  name: "Navbar",
  data() {
    return {
      showMenu: false,
    };
  },
  methods: {
    toggleNavbar: function () {
      this.showMenu = !this.showMenu;
    },
  },
};
</script>