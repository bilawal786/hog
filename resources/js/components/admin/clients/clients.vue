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
                                                <th>Client Name</th>
                                                <th>E-mail</th>
                                                <th>Phone #</th>
                                                <th>Address</th>
                                                <th>Created at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="client in clients" :key='client.id'>
                                                <td>{{ client.name }}</td>
                                                <td>{{ client.email }}</td>
                                                <td>{{ client.phone }}</td>
                                                <td>{{ client.address }}</td>
                                                <td><set-date :date="client.created_at" :year="'yes'"></set-date></td>
                                                <td>

                                                    <button class="btn btn-success btn-icon-anim btn-circle btn-sm"
                                                        @click="getClientDetail(client.id)"><i
                                                            class="fa fa-eye"></i></button>
                                                    <button class="btn btn-primary btn-icon-anim btn-circle btn-sm"><i
                                                            class="fa fa-lock"></i></button>
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
                                            <td class="border-none">Client Name:</td>
                                            <td class="border-none">{{ clientDetail.name }}</td>
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
        getClientData: function () {
            axios.get('admin/web/clients').then(response => {
                this.clients = response.data
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
        },
        dateFormate: function (date) {

            var today = Date(date);
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();

            today = mm + '/' + dd + '/' + yyyy;

            return today
        }
    }
}
</script>