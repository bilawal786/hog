<template>
    <div>
        <router-view></router-view>
    </div>
</template>
<script>
export default {
    data() {
        return {

            otherDetail:{
                Fname:null,
                Lname:null,
                email:null,
                phone:null,
                account:null,
                message:null,
                created_at:null

            },

        }
    },
    mounted() {

    },
    methods: {





    }
}
</script>
