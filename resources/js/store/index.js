// //resources/js/store/index.js
// import Vue from "vue";
// import Vuex from "vuex";
// Vue.use(Vuex);
// import auth from "./modules/auth.js";
// export default new Vuex.Store({
//   modules: {
//     auth,
//   },
// });

import Vue from "vue";
import Vuex from "vuex";
import auth from "./modules/auth.js";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    errors: []
  },

  getters: {
    errors: state => state.errors
  },

  mutations: {
    setErrors(state, errors) {
      state.errors = errors;
    }
  },

  actions: {},

  modules: {
    auth
  }
});
