// 

import axios from "axios";

export default {
  namespaced: true,

  state: {
    data:{
      userData: null,
      errors: [],
    }
  },

  getters: {
    user: state => state.data.userData,
    errors: state => state.data.errors
  },

  mutations: {
    setUserData(state, user) {
      state.data.userData = user;
    },
    setErrors(state, errors) {
      state.data.errors = errors;
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
      commit("setErrors", {});
      return axios
        .post("/login", data)
        .then(response => {
          console.log(response)
         commit("setUserData", response.data.user);
          localStorage.setItem("authToken", response.data.token);
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
