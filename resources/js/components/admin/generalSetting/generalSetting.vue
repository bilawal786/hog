<template>
    <div class="form-wrap">
        <form class="form-horizontal">
           
            <div class="form-body">
                <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Logo Upload</h6>
                <hr class="light-grey-hr" />
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Header logo</label>
                            <div class="col-md-9">

                                <div class="clearfix"></div>
                                <p class="text-muted">Your logo size<code>50 x 50</code></p>
                                <div class="mt-40">
                                    <vue-dropify  required data-max-file-size="1M" :src="header_src" @upload="headerLogoUpload($event)" @change="headerLogoChange()"></vue-dropify>
                                    <!-- <input type="file" id="input-file-now-custom-1" class="dropify" name="header_logo"
                                        v-bind:data-default-file="generalSetting.header_logo" /> -->
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Footer logo</label>
                            <div class="col-md-9">

                                <div class="clearfix"></div>
                                <p class="text-muted">Your logo size<code>50 x 50</code></p>
                                <div class="mt-40">
                                    <!-- <vue-dropify  required data-max-file-size="1M" :src="footer_src" @upload="footerLogoUpload($event)" @change="footerLogoChange()"></vue-dropify> -->
                                    <input type="file" id="input-file-now-custom-1" class="dropify" name="footer_logo" 
                                        :data-default-file="foot_logo"  />
                                </div>
                                <br>
                            </div>
                        </div>

                    </div>
                </div>
                <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>About's Info</h6>
                <hr class="light-grey-hr" />
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3" for="inputEmail">E-mail</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" id="inputEmail" placeholder="Email"
                                    data-error="Bruh, that email address is invalid" required name="email"
                                    v-model="generalSetting.email">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Phone No.</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Phone No." name="phone"
                                     v-model="generalSetting.phone">

                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!-- /Row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Footer About</label>
                            <div class="col-md-9">
                                <textarea class="form-control" rows="5"
                                    name="footer_about" v-model="generalSetting.footer_about"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account-box mr-10"></i>Address</h6>
                <hr class="light-grey-hr" />
                <!-- /Row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Mailing Address</label>
                            <div class="col-md-9">
                                <textarea class="form-control" rows="5"
                                    name="mailing_address" v-model="generalSetting.mailing_address"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3">Office Address</label>
                            <div class="col-md-9">
                                <textarea class="form-control" rows="5"
                                    name="office_address" v-model="generalSetting.office_address" ></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /Row -->
            </div>
            <div class="form-actions mt-10">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="button" @click="updateGeneralSetting()" class="btn btn-success  mr-10">Update</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
import VueDropify from 'vue-dropify';
export default{
    data(){
        return{
            generalSetting:{
                head_logo: null,
                foot_logo: null,
                email: null,
                phone: null,
                footer_about: null,
                mailing_address: null,
                office_address: null
            },
            header_src: null,
            footer_src: null,
            foot_logo: null
        }
    },
    components: {
    'vue-dropify': VueDropify
  },
  mounted(){
      this.getSettingData()
  },
  methods:{
      getSettingData: function(){
          axios.get('admin/web/general/setting')
                .then(response => {
                    this.generalSetting = response.data,
                    this.header_src = response.data.header_logo
                    this.footer_src = response.data.footer_logo
                })
      },
      headerLogoUpload(event){
          console.log(event.target.files[0])
        //   this.generalSetting.head_logo = event.target.files[0]
      },
      headerLogoChange(){
          this.header_src=null
      },
      footerLogoUpload(event){
          console.log(event.target.files[0])
        //   this.generalSetting.foot_logo = event.target.files[0]
         // console.log(e.file)
            // let file = e.target.files[0];
            // let reader = new FileReader();  
            //     if(file['size'] < 2111775)
            //     {
            //         reader.onloadend = (file) => {
            //         console.log('RESULT', reader.result)
            //          this.form.avatar = reader.result;
            //         }              
            //          reader.readAsDataURL(file);
            //     }else{
            //         alert('File size can not be bigger than 2 MB')
            //     }
      },
      footerLogoChange(){
          this.footer_src=null
      },
      updateGeneralSetting: function(){


           Swal.fire({
            title: 'Are you sure ?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'rgb(34 110 237 / 85%)',
            cancelButtonColor: '#ff2a00',
            confirmButtonText: 'Yes, Change it!'
        },() => {
        }).then((result) => {
            if (result.value) {
                axios.put('admin/web/general/setting/1', this.generalSetting)
                .then(response => {
                    window.scrollTo(0, 0)
                    if(response.status == 200){
                        this.$vToastify.success("successfully Updated");
                    }else{

                    }
                })
            }
        }) 







           
      }
  }
}
</script>