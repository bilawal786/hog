<template>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Others</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="" class="table table-hover display  pb-30">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>E-mail</th>
                                        <th>Phone #</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-if="others.data == ''">
                                        <td colspan="5" class="tb-empty">No Record Found</td>
                                    </tr>
                                    <tr v-for="other in others.data" :key="other.id">
                                        <td>{{ other.Fname + ' ' + other.Lname }}</td>
                                        <td><a v-bind:href="'mailto:'+other.email">{{ other.email }}</a></td>
                                        <td><a v-bind:href="'tel:'+other.phone">{{ other.phone }}</a></td>
                                        <td>{{ other.message }}</td>
                                        <td>
                                            <router-link class="btn btn-default btn-icon-anim btn-circle btn-sm" :to="{name:'otherUpdate', params: { id:  other.id}}">
                                                <i class="fa fa-pencil"></i>
                                            </router-link>
                                            <router-link class="btn btn-success btn-icon-anim btn-circle btn-sm"
                                                    :to="'/form/other/detail/'+other.id"><i
                                                class="fa fa-eye"></i></router-link>
                                            <button class="btn btn-info btn-icon-anim btn-circle btn-sm" @click="deletebyid(other.id)"><i
                                                class="icon-trash"></i></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="">
                            <div class="pull-left" v-if="others">Showing {{others.from}} to {{others.to}} of {{others.total}} entries</div>
                            <div class="pull-right">
                                <pagination class="" :show-disabled="true" :router="false" :size="'small'" :limit="2" :data="others" :align="'right'" v-on:pagination-change-page="getOthers"></pagination>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "otherList",
    data(){
        return{
            others: null,
        }
    },
    mounted() {
        this.getOthers()
    },
    methods:{
        getOthers: function (page = 1) {
            axios.get('admin/web/form/others?page='+page).then(response => {
                this.others = response.data
            })
        },
        deletebyid: function (id) {
            Swal.fire({
                title: 'Are you sure ?',
                text: "You wanted to Delete this Billing Question",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'rgb(34 110 237 / 85%)',
                cancelButtonColor: '#ff2a00',
                confirmButtonText: 'Delete'
            }, () => {
            }).then((result) => {

                if (result.value) {
                    axios.delete('admin/web/form/billing/request/' + id).then(response => {
                        this.getOthers()
                        window.scrollTo(0, 0)
                        switch (response.data.type) {
                            case 'info':
                                toastr.info(response.data.messege);
                                break;
                            case 'success':
                                toastr.success(response.data.messege);
                                break;
                            case 'warning':
                                toastr.warning(response.data.messege);
                                break;
                            case 'error':
                                toastr.error(response.data.messege);
                                break;
                        }
                    })
                }
            })
        },
    }
}
</script>

<style scoped>

</style>
