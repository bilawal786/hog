// 

import axios from "axios";

export default {
  namespaced: true,

  state: {
    userData: null
  },

  getters: {
    user: state => state.userData,
  },

  mutations: {
    setUserData(state, user) {
      state.userData = user;
      console.log(state.userData)
    }
  },

  actions: {
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
      commit("setErrors", {}, { root: true });
      return axios
        .post("/login", data)
        .then(response => {
         commit("setUserData", response.data.user);
          localStorage.setItem("authToken", response.data.token);
        });
    },
    sendRegisterRequest({ commit }, data) {
      commit("setErrors", {}, { root: true });
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
