<template>
    <div class="header-modal-area">
    <!-- Modal Search -->
    <div class="overlay-sidebar">
        <div class="author-area">
            <a href="#" class="closebtn">&times;</a>

            <div class="auth-form-wrap" v-if="registration==true">
                <h2><i class="fa fa-user login-icon"></i> Login</h2>
                <form id="login-form">
                    <p>
                    <input type="email" id="email" name="email" placeholder="Email Address" required><i class="validation"><span></span><span></span></i>
                    </p>
                     <p>
                    <input type="password" id="password" name="password" placeholder="password" required><i class="validation"><span></span><span></span></i>
                    </p>
                    <p>
                    <input type="submit" id="login" value="Login">
                    </p>
                </form>
                <div id="create-account-wrap">
                    <p>Not a member? <a href="#" v-on:click="changetoggle">Create Account</a></p>
                </div><!--create-account-wrap-->
            </div><!--login-form-wrap-->
            

            <div class="auth-form-wrap" v-if="registration==false">
                <h2><i class="fa fa-user login-icon"></i> Registration</h2>
                <form id="login-form">
                    <p>
                    <input type="text" id="Fname" name="Fname" placeholder="Fist Name" required>
                    </p>
                    <p>
                    <input type="text" id="Lname" name="Lname" placeholder="Last Name" required>
                    </p>
                    <p>
                    <input type="email" id="email" name="email" placeholder="Email Address" required><i class="validation"><span></span><span></span></i>
                    </p>
                     <p>
                    <input type="password" id="password" name="password" placeholder="Password" required><i class="validation"><span></span><span></span></i>
                    </p>
                    <p>
                    <input type="password" id="vpassword" name="vpassword" placeholder="Verify Password" required><i class="validation"><span></span><span></span></i>
                    </p>
                    <p>
                    <input type="submit" id="login" value="Login">
                    </p>
                </form>
                <div id="create-account-wrap">
                    <p>Not a member? <a href="#" v-on:click="changetoggle">Login</a></p>
                </div><!--create-account-wrap-->
            </div><!--login-form-wrap-->


            <!-- <div class="author-area-content">
                <div class="login-author">

                    <div class="author-info">
                        <div class="author-image yellow-border">
                            <img src="assets/images/driver/driver-03.png" alt="author-image" />
                        </div>
                        <div class="author-des">
                            <h4 class="author-name">Mr. Johan Smith</h4>
                            <p class="author-description">Programmer</p>
                        </div>
                    </div>

                    <div class="author-menu">
                        <ul class="yellow-color">
                            <li><a href=""><i class="fa fa-user-circle-o"></i>Author Dashboard</a></li>
                            <li><a href=""><i class="fa fa-envelope-open"></i>Your Inbox</a></li>
                            <li><a href=""><i class="fa fa-location-arrow"></i>Track your texi</a></li>
                            <li><a href=""><i class="fa fa-area-chart"></i>Your Bookings Status</a></li>
                            <li><a href=""><i class="fa fa-automobile"></i>New Bookings</a></li>
                            <li><a href=""><i class="fa fa-archive"></i>Your Bookings</a></li>
                            <li><a href=""><i class="fa fa-money"></i>Your Deposit - $150.00</a></li>
                            <li><a href=""><i class="fa fa-sign-out"></i>Sign Out</a></li>
                        </ul>
                    </div>
                    
                </div>
            </div> -->



        </div><!-- /.author-area -->
    </div><!-- /.overlay-sidebar -->
</div><!-- /.header-modal-area -->
</template>
<script>
export default {
    data(){
        return{
            registration:true
        }
    },
    methods: {
        changetoggle () {
            this.registration = !this.registration

        },
    }
}
</script>