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
                                <div class="dataTables_wrapper">
                                    <div class="dataTables_length">
                                        <label>Show
                                            <select class="" v-model="limit" v-on:change="getquestions()">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> entries
                                        </label>
                                    </div>
                                    <div class="dataTables_filter">
                                        <label>Search:
                                            <input type="search" class="" v-model="search" v-on:input="getquestions()" placeholder="Search Driver">
                                        </label>
                                    </div>
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
                                            <td v-if="question.user_id == null">{{ question.Fname + ' ' + question.Lname }}</td>
                                            <td v-else><a v-bind:href="'/client/detail/'+question.user_id">{{ question.Fname + ' ' + question.Lname }}</a></td>
                                            <td><a v-bind:href="'mailto:'+question.email">{{ question.email }}</a></td>
                                            <td><a v-bind:href="'tel:'+question.phone">{{ question.phone }}</a></td>
                                            <td>{{ question.account }}</td>
                                            <td>{{ question.invoice }}</td>
                                            <td>{{ question.message }}</td>
                                            <td>
                                                <router-link class="btn btn-default btn-icon-anim btn-circle btn-sm"
                                                             :to="'/question/edit/'+question.id"><i class="fa fa-pencil"></i></router-link>
                                                <router-link class="btn btn-success btn-icon-anim btn-circle btn-sm"
                                                             :to="'/question/detail/'+question.id"><i class="fa fa-eye"></i></router-link>
                                                <button class="btn btn-info btn-icon-anim btn-circle btn-sm" @click="deletebyid(question.id)"><i
                                                    class="icon-trash"></i></button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
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
            search:'',
            limit:10

        }
    },
    mounted(){
        this.getquestions()
    },
    methods:{
        getquestions: function (page = 1) {
            axios.get('admin/web/form/billing/request?page='+page+"&search="+this.search+"&limit="+this.limit).then(response => {
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
