//resources/js/store/index.js
import Vue from "vue";
import Vuex from "vuex";
Vue.use(Vuex);
import auth from "./modules/auth.js";
export default new Vuex.Store({
  modules: {
    auth,
  },
});