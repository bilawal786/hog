<template>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Clients List</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body" v-if="clients != null">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <div class="dataTables_wrapper">
                                    <div class="dataTables_length">
                                        <label>Show
                                            <select class="" v-model="limit" v-on:change="getClientData()">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> entries
                                        </label>
                                    </div>
                                    <div class="dataTables_filter">
                                        <label>Search:
                                            <input type="search" class="" v-model="search" v-on:input="getClientData()" placeholder="Search Driver">
                                        </label>
                                    </div>
                                    <table id="" class="table table-hover display  pb-30">
                                        <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>last Name</th>
                                            <th>E-mail</th>
                                            <th>Phone #</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-if="clients.data == ''">
                                            <td colspan="7" class="tb-empty">No Record Found</td>
                                        </tr>
                                        <tr v-else v-for="client in clients.data" :key='client.id'>
                                            <td>{{ client.first_name }}</td>
                                            <td>{{ client.last_name }}</td>
                                            <td><a v-bind:href="'mailto:'+client.email">{{ client.email }}</a></td>
                                            <td><a v-bind:href="'tel:'+client.phone">{{ client.phone }}</a></td>
                                            <td>{{ client.address }}</td>
                                            <td>{{ client.city }}</td>
                                            <td>
                                            <span class="text-primary">
                                                <set-date :date="client.created_at" :year="'yes'"></set-date>
                                            </span>
                                            </td>
                                            <td>
                                                <router-link class="btn btn-success btn-icon-anim btn-circle btn-sm" :to="'/client/detail/'+client.id">
                                                    <i class="fa fa-eye"></i>
                                                </router-link>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="pull-left" v-if="clients">Showing {{clients.from}} to {{clients.to}} of {{clients.total}} entries</div>
                            <div class="pull-right">
                                <pagination class="" :show-disabled="true" :router="false" :size="'small'" :limit="2" :data="clients" :align="'right'" v-on:pagination-change-page="getClientData"></pagination>
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
    name: "clientsList",
    data(){
        return{
            clients: null,
            search:'',
            limit:10
        }
    },
    mounted() {
        this.getClientData()
    },
    methods:{
        getClientData: function (page = 1) {
            axios.get('admin/web/clients?page='+page+"&search="+this.search+"&limit="+this.limit).then(response => {
                this.clients = response.data
            })
        },
        block(id){
            Swal.fire({
                title: 'Are you sure ?',
                text: "You wanted to block this client",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'rgb(34 110 237 / 85%)',
                cancelButtonColor: '#ff2a00',
                confirmButtonText: 'Block'
            }, () => {
            }).then((result) => {
                if (result.value) {
                    axios.put('admin/web/block/client/'+id, {
                        'status': '0'
                    }).then(response=>{
                        this.getClientData()
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
        unblock(id){
            Swal.fire({
                title: 'Are you sure ?',
                text: "You wanted to unblock this client",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'rgb(34 110 237 / 85%)',
                cancelButtonColor: '#ff2a00',
                confirmButtonText: 'Unblock'
            }, () => {
            }).then((result) => {
                if (result.value) {
                    axios.put('admin/web/unblock/client/'+id, {
                        'status':'1'
                    }).then(response=>{
                        this.getClientData()
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
