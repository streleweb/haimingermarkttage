import { values } from 'lodash';
import Vue from 'vue';
import { VueLoaderPlugin } from 'vue-loader';
import Vuex from 'vuex';
import repository from '../repository/repository'; //alle Route-Requests importieren, welche genutzt werden sollen

Vue.use(Vuex);

export default new values.Store({
  modules: {
    //auth state
    auth: {
      state: () => ({
        user: null,
        usertoken: ''
      }),

      getters: {
        user: state => state.user,
        authenticated: state => state.user !== null,
      },

      mutations: {
        SET_USER(state, user) {
          state.user = user;
        }
      },

      //Backend-Call zum Admin Login
      actions: {
        async login({ state, commit }, user) {
          await repository.createSession(); //XSRF Token Cookie initialisieren
          const { data } = await repository.login(user)
          //user wird von Login.vue übergeben
          commit('SET_USER', data);
        }
      }
    }
  }
});
