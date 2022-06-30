<template>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Billing Questions</h6>
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
                                        <th>Account</th>
                                        <th>invoice</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr v-if="questions.data == ''">
                                        <td colspan="7" class="tb-empty">No Record Found</td>
                                    </tr>
                                    <tr v-else v-for="question in questions.data" :key="question.id">
                                        <td>{{ question.Fname + ' ' + question.Lname }}</td>
                                        <td>{{ question.email }}</td>
                                        <td>{{ question.phone }}</td>
                                        <td>{{ question.account }}</td>
                                        <td>{{ question.invoice }}</td>
                                        <td>{{ question.message }}</td>
                                        <td>
                                            <router-link class="btn btn-default btn-icon-anim btn-circle btn-sm"
                                                :to="'/admin/form/billing/question/edit/'+question.id"><i class="fa fa-pencil"></i></router-link>
                                            <router-link class="btn btn-success btn-icon-anim btn-circle btn-sm"
                                                    :to="'/admin/form/billing/question/detail/'+question.id"><i class="fa fa-eye"></i></router-link>
                                            <button class="btn btn-info btn-icon-anim btn-circle btn-sm" @click="deletebyid(question.id)"><i
                                                class="icon-trash"></i></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="">
                            <div class="pull-left" v-if="questions">Showing {{questions.from}} to {{questions.to}} of {{questions.total}} entries</div>
                            <div class="pull-right">
                                <pagination class="" :show-disabled="true" :router="false" :size="'small'" :limit="2" :data="questions" :align="'right'" v-on:pagination-change-page="getquestions"></pagination>
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
    name: "billingRequestList",
    data(){
        return{
            questions: null,

        }
    },
    mounted(){
        this.getquestions()
    },
    methods:{
        getquestions: function (page = 1) {
            axios.get('admin/web/form/billing/request?page='+page).then(response => {
                this.questions = response.data
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
                        this.getquestions()
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
