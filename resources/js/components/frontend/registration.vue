<template>
    <div>
        <top-header></top-header>
        <navigation-bar></navigation-bar>
        <div class="row">
          <div class="col-md-12">
            <div class="login-form-wrap">
                    <h2><i class="fa fa-user login-icon"></i> Registration</h2>
                    <form class="login-form">
                        <p>
                            <input
                               type="text"
                                class="form-control"
                                :class="{ 'server-input-vilidation': errors.name }"
                                id="name"
                                v-model="details.name"
                                placeholder="Enter name"
                                required
                            />
                            <span class="server-vilidation" v-if="errors.name">
                                {{ errors.name[0] }}
                            </span>
                            <span class="server-vilidation" v-if="!errors.name">
                            &nbsp
                            </span>
                            <i class="validation"><span></span><span></span></i>
                        </p>
                        <p>
                            <input
                                type="email"
                                class="form-control"
                                :class="{ 'server-input-vilidation': errors.email }"
                                id="password"
                                v-model="details.email"
                                placeholder="Enter email"/>
                                <span class="server-vilidation" v-if="errors.email">
                                {{ errors.email[0] }}
                                </span>
                                <span class="server-vilidation" v-if="!errors.email">
                                &nbsp
                                </span>
                                <i class="validation"><span></span><span></span></i>
                        </p>
                        <p>
                            <input
                                type="password"
                                class="form-control"
                                :class="{ 'server-input-vilidation': errors.password }"
                                id="password"
                                v-model="details.password"
                                placeholder="Password"/>
                                <span class="server-vilidation" v-if="errors.password">
                                {{ errors.password[0] }}
                                </span>
                                <span class="server-vilidation" v-if="!errors.password">
                                &nbsp
                                </span>
                                <i class="validation"><span></span><span></span></i>
                        </p>
                        <p>
                            <input
                                type="password"
                                class="form-control"
                                :class="{ 'server-input-vilidation': errors.password }"
                                 id="password_confirmation"
                                v-model="details.password_confirmation"
                                placeholder="Confirm password"/>
                                <span class="server-vilidation" v-if="errors.password">
                                {{ errors.password[0] }}
                                </span>
                                <span class="server-vilidation" v-if="!errors.password">
                                &nbsp
                                </span>
                                <i class="validation"><span></span><span></span></i>
                        </p>
                        <p>
                          <button
                            type="button"
                            @click="register"
                        >
                            Register
                        </button>
                        <span class="server-vilidation" >&nbsp</span>
                        </p>
                    </form>
                    <div class="create-account-wrap">
                        <p>Already member ? <router-link to="/login">Login</router-link></p>
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
import { mapGetters, mapActions } from "vuex";

export default {
    name: "Home",

    data: function () {
        return {
            details: {
                name: null,
                email: null,
                password: null,
                password_confirmation: null,
            },
        };
    },
    components: { TopHeader, NavigationBar, WebFooter },
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
                this.$router.push({ name: "dashboard" });
            });
        },
    },
};
</script>
