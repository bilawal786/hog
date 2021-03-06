require('./vue-assets');
Vue.component('general-setting', require('./components/admin/generalSetting/generalSetting.vue').default);


import VueToastify from "vue-toastify";
Vue.use(VueToastify, {
    customNotifications: {
      clientError: {
        body: "You did it!",
        defaultTitle: false,
        icon: '<svg width="50" height="50">\n' +
                '<rect width="50" height="50" style="fill:rgb(0,0,255);" />\n' +
              '</svg> ',
        canTimeout: false
      },
      moreOfTheAbove: {
    },

  }
}
  );


// import VueLazyload from 'vue-lazyload';
 
// Vue.use(VueLazyload,{

//  loading: base_url+'images/loading.gif',

// });

var app = new Vue({
    el: '#admin'
});