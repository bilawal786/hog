<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="login-form-wrap">
                    <h2 style="color: #cd9700;"><i class="fa fa-sign-in" style="margin-right: 10px;"></i>Sign In</h2>
                    <form class="login-form">
                        <p>
                            <input
                                type="email"
                                class="form-control"
                                :class="{ 'server-input-vilidation': errors.email }"
                                id="email"
                                v-model="details.email"
                                placeholder="Enter email"
                                required
                            />
                        <div class="text-left">
                            <span class="server-error" v-if="errors.email">{{ errors.email[0] }}</span>
                            <span class="server-error" v-if="!errors.email">
                            &nbsp
                            </span>
                            <i class="validation"><span></span><span></span></i>
                        </div>
                        </p>
                        <p>
                            <input
                                type="password"
                                class="form-control"
                                :class="{ 'server-input-vilidation': errors.password }"
                                id="password"
                                v-model="details.password"
                                placeholder="Password"/>
                        <div class="text-left">
                            <span class="server-error" v-if="errors.password">{{ errors.password[0] }}</span>
                            <span class="server-error" v-if="!errors.password">
                            &nbsp
                            </span>
                            <i class="validation"><span></span><span></span></i>
                        </div>
                        </p>
                        <p>
                            <button type="button" @click="login" :disabled="isloading">
                                <span v-if="isloading"><span class="fam fa fa-spinner fa-spin"></span>Loading</span>
                                <span v-else>Sign In</span>
                            </button>
                            <span class="server-vilidation">&nbsp</span>
                        </p>
                    </form>
                    <div class="create-account-wrap">
                        <p>Not a member?
                            <router-link to="/register">Sign Up</router-link>
                        </p>
                    </div>
                    <!--create-account-wrap-->
                </div>
                <!--login-form-wrap-->

            </div>
            <!--create-account-wrap-->
        </div>
        <!--login-form-wrap-->
    </div>
</template>
<script>
import {mapGetters, mapActions} from "vuex";
export default {
    data() {
        return {
            isloading:false,
            details: {
                email: "",
                password: "",
            },
        };
    },
    computed: {
        ...mapGetters("auth", ["errors"]),
    },

    mounted() {
        this.$store.commit("auth/setErrors", {});
    },
    methods: {
        ...mapActions("auth", ["sendLoginRequest"]),
        login: function () {
            this.isloading = true
            this.sendLoginRequest(this.details).then(response => {
                this.isloading = false
                this.$router.push({name: "home"});
            }).catch(()=>{
                this.isloading = false
            });
        },
    },
};
</script>
