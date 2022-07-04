<template>
    <div class="panel panel-default card-view">
        <div class="panel-heading">
            <div class="pull-left">
                <h6 class="panel-title txt-dark">New Driver</h6>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-wrapper collapse in">
            <div class="panel-body">
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                            <tr>
                                <td class="border-none">Driver Name:</td>
                                <td class="border-none">
                                    {{detail}}
<!--                                    {{ selectdriver.name }}-->
                                </td>
                            </tr>
                            <tr>
                                <td>Driver E-mail:</td>
<!--                                <td>{{ selectdriver.email }}</td>-->
                            </tr>
                            <tr>
                                <td>Driver Phone</td>
<!--                                <td>{{ selectdriver.phone }}</td>-->
                            </tr>
                            <tr>
                                <td>Driver Address</td>
<!--                                <td>{{ selectdriver.address }}</td>-->
                            </tr>
                            <tr>
                                <td>Driver Register Date</td>
                                <td>
<!--                                    <set-date :date="selectdriver.created_at" :year="'yes'"></set-date>-->
                                </td>
                            </tr>
                            <tr>
                                <td>Lead Status</td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "leadStatus",
    props:{
        id:null
    },
    data(){
        return{
            detail:null
        }
    },
    mounted() {

    },
    methods:{
        getData(){
            axios.get('admin/web/show/driver/leads/'+this.id).then(response => {
                this.detail = response.data
            })

        }
    }
}
</script>

<style scoped>

</style>
