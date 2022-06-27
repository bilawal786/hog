<template>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">FeedBacks</h6>
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
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <tr v-for="feedback in feedbacks" :key="feedback.id">
                                        <td>{{ feedback.Fname + ' ' + feedback.Lname }}</td>
                                        <td>{{ feedback.email }}</td>
                                        <td>{{ feedback.phone }}</td>
                                        <td>{{ feedback.account }}</td>
                                        <td>{{ feedback.message }}</td>
                                        <td>
                                            <router-link class="btn btn-default btn-icon-anim btn-circle btn-sm"
                                                         :to="'/admin/form/submit/feedback/edit/'+feedback.id"><i class="fa fa-pencil"></i></router-link>
                                            <router-link class="btn btn-success btn-icon-anim btn-circle btn-sm"
                                                         :to="'/admin/form/submit/feedback/detail/'+feedback.id"><i
                                                class="fa fa-eye"></i></router-link>
                                            <button class="btn btn-info btn-icon-anim btn-circle btn-sm" @click="deletebyid(feedback.id)"><i
                                                class="icon-trash"></i></button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
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
    name: "submitFeedBackList",
    data(){
        return{
            feedbacks: null,
        }
    },
    mounted(){
        this.getFeedbacks()
    },
    methods:{
        getFeedbacks: function () {
            axios.get('admin/web/form/submit/feedback').then(response => {
                this.feedbacks = response.data
                console.log(response.data)
            })
        },
        deletebyid: function (id) {
            Swal.fire({
                title: 'Are you sure ?',
                text: "You wanted to Delete this FeedBack",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'rgb(34 110 237 / 85%)',
                cancelButtonColor: '#ff2a00',
                confirmButtonText: 'Delete'
            }, () => {
            }).then((result) => {

                if (result.value) {
                    axios.delete('admin/web/form/submit/feedback/' + id).then(response => {
                        this.getFeedbacks()
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
