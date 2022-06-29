<template>
<div>
    {{lead}}
    {{rideId}}
</div>
</template>

<script>
export default {
    name: "leadInfo",
    props: {
        rideId:null
    },
    data(){
        return{
            lead:null,
            id:this.rideId
        }
    },
    mounted(){
        this.getinfo(this.rideId)
    },
    methods:{
        getinfo: function (id){
            axios.get('/admin/web/show/lead/'+id).then(response => {
                this.lead = response.data
            });
        }
    }
}
</script>

<style scoped>

</style>
