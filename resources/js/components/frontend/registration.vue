<template>
    <div>
        <top-header></top-header>
        <navigation-bar></navigation-bar>
        <div class="row">
            <div class="col-md-12">
                <div class="login-form-wrap">
                    <h2 style="color: #cd9700;"><i class="fa fa-user-plus"></i> Sign Up</h2>
                    <form class="login-form">
                        <p>
                            <input
                                type="text"
                                class="form-control"
                                :class="{ 'server-input-vilidation': errors.first_name }"
                                id="name"
                                v-model="details.first_name"
                                placeholder="Enter First Name"
                                required
                            />
                        <div class="text-left">
                        <span class="server-error" v-if="errors.first_name">{{ errors.first_name[0] }}</span>
                        <span class="server-error" v-if="!errors.first_name">
                            &nbsp
                            </span>
                        <i class="validation"><span></span><span></span></i>
                        </div>
                        </p>
                        <p>
                            <input
                                type="text"
                                class="form-control"
                                :class="{ 'server-input-vilidation': errors.last_name }"
                                id="name"
                                v-model="details.last_name"
                                placeholder="Enter Last Name"
                                required
                            />
                        <div class="text-left">
                            <span class="server-error" v-if="errors.last_name">{{ errors.last_name[0] }}</span>
                            <span class="server-error" v-if="!errors.last_name">
                            &nbsp
                            </span>
                            <i class="validation"><span></span><span></span></i>
                        </div>
                        </p>
                        <p>
                            <input
                                type="text"
                                class="form-control"
                                :class="{ 'server-input-vilidation': errors.phone }"
                                id="name"
                                v-model="details.phone"
                                placeholder="Enter Phone Number"
                                required
                            />
                        <div class="text-left">
                            <span class="server-error" v-if="errors.phone">{{ errors.phone[0] }}</span>
                            <span class="server-error" v-if="!errors.phone">
                            &nbsp
                            </span>
                            <i class="validation"><span></span><span></span></i>
                        </div>
                        </p>
                        <p>
                            <input
                                type="text"
                                class="form-control"
                                :class="{ 'server-input-vilidation': errors.address }"
                                id="name"
                                v-model="details.address"
                                placeholder="Enter Address"
                                required
                            />
                        <div class="text-left">
                            <span class="server-error" v-if="errors.address">{{ errors.address[0] }}</span>
                            <span class="server-error" v-if="!errors.address">
                            &nbsp
                            </span>
                            <i class="validation"><span></span><span></span></i>
                        </div>
                        </p>
                        <p>
                            <input
                                type="text"
                                class="form-control"
                                :class="{ 'server-input-vilidation': errors.city }"
                                id="name"
                                v-model="details.city"
                                placeholder="Enter City"
                                required
                            />
                        <div class="text-left">
                            <span class="server-error" v-if="errors.city">{{ errors.city[0] }}</span>
                            <span class="server-error" v-if="!errors.city">
                            &nbsp
                            </span>
                            <i class="validation"><span></span><span></span></i>
                        </div>
                        </p>
                        <p>
                            <input
                                type="email"
                                class="form-control"
                                :class="{ 'server-input-vilidation': errors.email }"
                                id="email"
                                v-model="details.email"
                                placeholder="Enter email"/>
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
                            <input
                                type="password"
                                class="form-control"
                                :class="{ 'server-input-vilidation': errors.password }"
                                id="password_confirmation"
                                v-model="details.password_confirmation"
                                placeholder="Confirm password"/>
                        <div class="text-left">
                            <span class="server-error" v-if="errors.password">{{ errors.password[0] }}</span>
                            <span class="server-error" v-if="!errors.password">
                            &nbsp
                            </span>
                            <i class="validation"><span></span><span></span></i>
                        </div>
                        </p>
                        <p>
                            <button
                                type="button"
                                @click="register"
                            >Sign Up
                            </button>
                            <span class="server-vilidation">&nbsp</span>
                        </p>
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


        <web-footer></web-footer>
    </div>
</template>

<script>
import TopHeader from "./includes/TopHeader.vue";
import NavigationBar from "./includes/navigationbar.vue";
import WebFooter from "./includes/footer.vue";
import {mapGetters, mapActions} from "vuex";

export default {
    name: "Home",

    data: function () {
        return {
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
    components: {TopHeader, NavigationBar, WebFooter},
    computed: {
        ...mapGetters("auth", ["errors"]),
    },

    mounted() {
        this.$store.commit("auth/setErrors", {});
    },

    methods: {
        ...mapActions("auth", ["sendRegisterRequest"]),

        register: function () {
            this.sendRegisterRequest(this.details).then(() => {
                this.$router.push({name: "dashboard"});
            });
        },
    },
};
</script>
