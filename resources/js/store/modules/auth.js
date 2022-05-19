import axios from "axios";
const state = {
  user:{}
}
const getters = {}
const actions = {
  getUser( {commit} ){
    axios.get('/user/currentUser').then( response => {
      commit('setUser', response.data);
    });
  },
  loginUser({}, user){
    axios.post('/login', {
      email:user.email,
      password:user.password
    }).then(response => {
      console.log( response.data.access_token)
      if(response.data.access_token){
        localStorage.setItem(
          "Bearer", 
          response.data.access_token
        )
        window.location.replace('/home')
      }
    })
  }
}
const mutations = {}
export default {
      namespaced: true,
      state,
      getters,
      actions,
      mutations,
      
  }