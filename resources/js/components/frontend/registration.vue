<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="signup-form-wrap">
                    <h2 style="color: #cd9700;"><i class="fa fa-user-plus"></i> Sign Up</h2>
                    <form class="login-form">
                        <div class="row">
                            <div class="col-lg-6">
                                <input
                                    id="first_name"
                                    v-model="details.first_name"
                                    :class="{ 'server-input-vilidation': errors.first_name }"
                                    class="form-control"
                                    placeholder="First Name"
                                    required
                                    type="text"
                                />
                                <div class="text-left">
                                    <span v-if="errors.first_name" class="server-error">{{ errors.first_name[0] }}</span>
                                    <span v-if="!errors.first_name" class="server-error">&nbsp</span>
                                    <i class="validation"><span></span><span></span></i>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <input
                                    id="last_name"
                                    v-model="details.last_name"
                                    :class="{ 'server-input-vilidation': errors.last_name }"
                                    class="form-control"
                                    placeholder="Last Name"
                                    required
                                    type="text"
                                />
                                <div class="text-left">
                                    <span v-if="errors.last_name" class="server-error">{{ errors.last_name[0] }}</span>
                                    <span v-if="!errors.last_name" class="server-error">&nbsp</span>
                                    <i class="validation"><span></span><span></span></i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <input
                                    id="address"
                                    v-model="details.address"
                                    :class="{ 'server-input-vilidation': errors.address }"
                                    class="form-control"
                                    placeholder="Address"
                                    required
                                    type="text"
                                />
                                <div class="text-left">
                                    <span v-if="errors.address" class="server-error">{{ errors.address[0] }}</span>
                                    <span v-if="!errors.address" class="server-error">&nbsp</span>
                                    <i class="validation"><span></span><span></span></i>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <input
                                    id="city"
                                    v-model="details.city"
                                    :class="{ 'server-input-vilidation': errors.city }"
                                    class="form-control"
                                    placeholder="City"
                                    required
                                    type="text"
                                />
                                <div class="text-left">
                                    <span v-if="errors.city" class="server-error">{{ errors.city[0] }}</span>
                                    <span v-if="!errors.city" class="server-error">&nbsp</span>
                                    <i class="validation"><span></span><span></span></i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <input
                                    id="phone"
                                    v-model="details.phone"
                                    :class="{ 'server-input-vilidation': errors.phone }"
                                    class="form-control"
                                    placeholder="Phone Number"
                                    required
                                    type="text"
                                />
                                <div class="text-left">
                                    <span v-if="errors.phone" class="server-error">{{ errors.phone[0] }}</span>
                                    <span v-if="!errors.phone" class="server-error">&nbsp</span>
                                    <i class="validation"><span></span><span></span></i>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <input
                                    id="email"
                                    v-model="details.email"
                                    :class="{ 'server-input-vilidation': errors.email }"
                                    class="form-control"
                                    placeholder="E-mail"
                                    type="email"/>
                                <div class="text-left">
                                    <span v-if="errors.email" class="server-error">{{ errors.email[0] }}</span>
                                    <span v-if="!errors.email" class="server-error">
                            &nbsp
                            </span>
                                    <i class="validation"><span></span><span></span></i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <input
                                    id="password"
                                    v-model="details.password"
                                    :class="{ 'server-input-vilidation': errors.password }"
                                    class="form-control"
                                    placeholder="Password"
                                    type="password"/>
                                <div class="text-left">
                                    <span v-if="errors.password" class="server-error">{{ errors.password[0] }}</span>
                                    <span v-if="!errors.password" class="server-error">&nbsp</span>
                                    <i class="validation"><span></span><span></span></i>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <input
                                    id="password_confirmation"
                                    v-model="details.password_confirmation"
                                    :class="{ 'server-input-vilidation': errors.password }"
                                    class="form-control"
                                    placeholder="Confirm password"
                                    type="password"/>
                                <div class="text-left">
                                    <span v-if="errors.password" class="server-error">{{ errors.password[0] }}</span>
                                    <span v-if="!errors.password" class="server-error">&nbsp</span>
                                    <i class="validation"><span></span><span></span></i>
                                </div>
                            </div>
                        </div>
                            <button type="button" @click="register" :disabled="isloading">
                                <span v-if="isloading"><span class="fam fa fa-spinner fa-spin"></span>Loading</span>
                                <span v-else>Sign Up</span>
                            </button>
                            <span class="server-vilidation">&nbsp</span>
                    </form>
                    <div class="create-account-wrap">
                        <p>Already member ?
                            <router-link to="/signin">Sign In</router-link>
                        </p>
                    </div>
                    <!--create-account-wrap-->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters, mapActions} from "vuex";

export default {
    name: "Home",

    data: function () {
        return {
            isloading:false,
            details: {
                first_name: null,
                last_name: null,
                address: null,
                phone: null,
                city: null,
                email: null,
                password: null,
                password_confirmation: null,
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
        ...mapActions("auth", ["sendRegisterRequest"]),

        register: function () {
            this.isloading=true
            this.sendRegisterRequest(this.details).then(() => {
                this.isloading=false
                this.$router.push({name: "home"});
            }).catch(()=>{
                this.isloading = false
            });
        },
    },
};
</script>
