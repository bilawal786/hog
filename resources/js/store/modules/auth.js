//

import axios from "axios";

export default {
  namespaced: true,

  state: {
    data:{
      userData: null,
      errors: [],
      setting:null
    }
  },

  getters: {
    settings: state => state.data.setting,
    user: state => state.data.userData,
    errors: state => state.data.errors
  },

  mutations: {
    setSettingData(state, settings) {
      state.data.setting = settings;
    },
    setUserData(state, user) {
      state.data.userData = user;
    },
    setErrors(state, errors) {
      state.data.errors = errors;
    }
  },

  actions: {
    getSettingData({ commit }) {
      axios
        .get("/general/setting", {
          headers: { Authorization: "" },
        })
        .then(response => {
          console.log(response)
          commit("setSettingData", response.data[0]);
        })
    },
    getUserData({ commit }) {
      axios
        .get("/user")
        .then(response => {
          commit("setUserData", response.data);
        })
        .catch(() => {
          localStorage.removeItem("authToken");
        });
    },
    sendLoginRequest({ commit }, data) {
      commit("setErrors", {});
      return axios
        .post("/login", data)
        .then(response => {
            if(response.data.user.role == 'user'){
                commit("setUserData", response.data.user);
                localStorage.setItem("authToken", response.data.token);
            }else{

            }
        });
    },
    sendRegisterRequest({ commit }, data) {
      commit("setErrors", {});
      return axios
        .post("/register", data)
        .then(response => {
          commit("setUserData", response.data.user);
          localStorage.setItem("authToken", response.data.token);
        });
    },
    sendLogoutRequest({ commit }) {
      axios.post("/logout").then(() => {
        commit("setUserData", null);
        localStorage.removeItem("authToken");
        this.router.push('/signin')
      });
    },
    // sendVerifyResendRequest() {
    //   return axios.get("/email/resend");
    // },
    // sendVerifyRequest({ dispatch }, hash) {
    //   return axios
    //     .get("/email/verify/" + hash)
    //     .then(() => {
    //       dispatch("getUserData");
    //     });
    // }
  }
};
