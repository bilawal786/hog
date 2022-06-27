<template>
    <div>
        <router-view></router-view>


    </div>
</template>
<script>
export default {
    data() {
        return {

            questionDetail:{
                Fname:null,
                Lname:null,
                email:null,
                phone:null,
                account:null,
                invoice:null,
                message:null,
                created_at:null

            },

        }
    },
    mounted() {

    },
    methods: {

        getQuestionDetail: function (id) {
            this.panel.allQuestions = false
            this.panel.detail = true
            axios.get('admin/web/form/billing/request/' + id).then(response => {
                this.questionDetail = response.data
                console.log(response.data)
            })
        },



    }
}
</script>
