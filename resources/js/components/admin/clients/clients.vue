<template>
    <div>
        <div class="row" v-show="panel.allClients">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Clients List</h6>
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
                                                <td>{{ client.email }}</td>
                                                <td>{{ client.phone }}</td>
                                                <td>

                                                    {{ client.address }}

                                                </td>
                                                <td>

                                                        {{ client.city }}

                                                </td>
                                                <td>
                                                    <span class="text-primary">
                                                        <set-date :date="client.created_at" :year="'yes'"></set-date>
                                                    </span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-success btn-icon-anim btn-circle btn-sm"
                                                        @click="getClientDetail(client.id)"><i
                                                            class="fa fa-eye"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
        <div class="row" v-show="panel.detail">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Client detail</h6>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-primary btn-anim btn-sm" @click="backToList()"><i
                                    class="fa fa-arrow-left" style="color: #FFF;"></i><span
                                    class="btn-text">back</span></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>

            <div class="col-sm-6">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Clients Personal Details</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table  mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="border-none">First Name:</td>
                                            <td class="border-none">{{ clientDetail.first_name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border-none">Last Name:</td>
                                            <td class="border-none">{{ clientDetail.last_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Client E-mail:</td>
                                            <td>{{ clientDetail.email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Client Phone</td>
                                            <td>{{ clientDetail.phone }}</td>
                                        </tr>
                                        <tr>
                                            <td>Client Address</td>
                                            <td>{{ clientDetail.address }}</td>
                                        </tr>
                                        <tr>
                                            <td>Client city</td>
                                            <td>{{ clientDetail.city }}</td>
                                        </tr>
                                        <tr>
                                            <td>Client Register Date</td>
                                            <td><set-date :date="clientDetail.created_at" :year="'yes'"></set-date></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                 </div>
            </div>
            <div class="col-sm-6">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Clients Ride Request</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">

                            </div>
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
    data() {
        return {
            clients: null,
            clientDetail: {
                name: null,
                email: null,
                phone: null,
                address: null,
                created_at: null
            },
            panel: {
                allClients: true,
                detail: false
            }
        }
    },
    mounted() {
        this.getClientData()
    },
    methods: {
        getClientData: function (page = 1) {
            axios.get('admin/web/clients?page='+page).then(response => {
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

        getClientDetail: function (id) {
            this.panel.allClients = false
            this.panel.detail = true
            axios.get('admin/web/clients/' + id).then(response => {
                this.clientDetail = response.data
            })
        },
        backToList: function () {
            this.panel.allClients = true
            this.panel.detail = false
            this.clientDetail.name = null
            this.clientDetail.email = null
            this.clientDetail.phone = null
            this.clientDetail.phone = null
            this.clientDetail.address = null
            this.clientDetail.created_at = null
        }

    }
}
</script>
