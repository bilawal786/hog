<template>
    <div>
        <router-view></router-view>

    </div>
</template>
<script>
export default {
    data() {
        return {

            feedbackDetail:{
                Fname:null,
                Lname:null,
                email:null,
                phone:null,
                account:null,
                message:null,
                created_at:null

            },
            panel: {
                allfeedbacks: true,
                detail: false
            }
        }
    },
    mounted() {

    },
    methods: {




        backToList: function () {
            this.panel.allfeedbacks = true
            this.panel.detail = false

        },
    }
}
</script>
