<template>
    <div>
        <div v-show="panel.allDrivers" class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Drivers List</h6>
                        </div>
                        <div class="pull-right">
                            <button
                                alt="default"
                                class="btn btn-primary"
                                data-target=".bs-example-modal-lg"
                                data-toggle="modal"
                            >
                                New Driver
                            </button>
                            <div
                                aria-hidden="true"
                                aria-labelledby="myLargeModalLabel"
                                class="modal fade bs-example-modal-lg"
                                role="dialog"
                                style="display: none"
                                tabindex="-1"
                            >
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button
                                                aria-hidden="true"
                                                class="close"
                                                data-dismiss="modal"
                                                type="button"
                                            >
                                                ×
                                            </button>
                                            <h5 id="myLargeModalLabel" class="modal-title">
                                                New Drivers
                                            </h5>
                                        </div>
                                        <form>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                class="control-label mb-10"
                                                                for="recipient-name"
                                                            >Name:</label
                                                            >
                                                            <input
                                                                v-model="create.name"
                                                                class="form-control"
                                                                type="text"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label mb-10" for="recipient-name">E-mail:</label>
                                                            <input
                                                                v-model="create.email"
                                                                class="form-control"
                                                                type="email"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                class="control-label mb-10"
                                                                for="recipient-name"
                                                            >Phone:</label
                                                            >
                                                            <input
                                                                v-model="create.phone"
                                                                class="form-control"
                                                                type="text"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                class="control-label mb-10"
                                                                for="recipient-name"
                                                            >Address:</label
                                                            >
                                                            <textarea
                                                                v-model="create.address"
                                                                class="form-control"
                                                            ></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                class="control-label mb-10"
                                                                for="message-text"
                                                            >Password:</label
                                                            >
                                                            <input
                                                                v-model="create.password"
                                                                class="form-control"
                                                                type="password"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                class="control-label mb-10"
                                                                for="message-text"
                                                            >Retype Password:</label
                                                            >
                                                            <input
                                                                v-model="create.comfirm_password"
                                                                class="form-control"
                                                                type="password"
                                                            />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button
                                                    class="btn btn-default"
                                                    data-dismiss="modal"
                                                    type="button"
                                                >
                                                    Close
                                                </button>
                                                <button
                                                    class="btn btn-success"
                                                    type="button"
                                                    @click="saveDriverData()"
                                                >
                                                    Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="" class="table table-hover display pb-30">
                                        <thead>
                                        <tr>
                                            <th>Driver Name</th>
                                            <th>E-mail</th>
                                            <th>Phone #</th>
                                            <th>Address</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr v-for="driver in drivers" :key="driver.id">
                                            <td>{{ driver.name }}</td>
                                            <td>{{ driver.email }}</td>
                                            <td>{{ driver.phone }}</td>
                                            <td>
                                                <div class="st-ad">{{ driver.address }}</div>
                                            </td>
                                            <td>
                                                <set-date :date="driver.created_at" :year="'yes'"></set-date>
                                            </td>
                                            <td>
                                                <button
                                                    class="
                              btn btn-default btn-icon-anim btn-circle btn-sm
                            "
                                                >
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                <button class="btn btn-success btn-icon-anim btn-circle btn-sm"
                                                        @click="showDriverDetail(driver.id)">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                                <button class="btn btn-danger btn-icon-anim btn-circle btn-sm" v-if="driver.status==1" @click="block(driver.id)"><i class="fa fa-lock"></i></button>
                                                <button class="btn btn-warning btn-icon-anim btn-circle btn-sm" v-if="driver.status==0" @click="unblock(driver.id)"><i class="fa fa-unlock"></i></button>
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
        <!-- /Row -->
        <div v-show="panel.detail" class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Driver detail</h6>
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
                            <h6 class="panel-title txt-dark">Drivers List</h6>
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
                                            <td class="border-none">{{ driverDetail.name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Driver E-mail:</td>
                                            <td>{{ driverDetail.email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Driver Phone</td>
                                            <td>{{ driverDetail.phone }}</td>
                                        </tr>
                                        <tr>
                                            <td>Driver Address</td>
                                            <td>{{ driverDetail.address }}</td>
                                        </tr>
                                        <tr>
                                            <td>Driver Register Date</td>
                                            <td>
                                                <set-date :date="driverDetail.created_at" :year="'yes'"></set-date>
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
    </div>
</template>
<script>
export default {
    data() {
        return {
            drivers: null,
            create: {
                name: null,
                phone: null,
                email: null,
                address: null,
                password: null,
                comfirm_password: null,
            },
            formShow: false,
            driverDetail: {
                name: null,
                email: null,
                phone: null,
                address: null,
                created_at: null,
            },
            panel: {
                allDrivers: true,
                detail: false
            }
        };
    },
    mounted() {
        this.getDriverData();
    },
    methods: {
        getDriverData: function () {
            axios.get("admin/web/drivers").then((response) => {
                this.drivers = response.data;
            });
        },
        saveDriverData: function () {
            axios.post("admin/web/drivers", this.create).then((response) => {
                console.log(response);
            });
        },
        showDriverDetail: function (id) {
            this.panel.allDrivers = false
            this.panel.detail = true
            axios.get('admin/web/drivers/' + id).then(response => {
                this.driverDetail = response.data
                console.log(response)
            })
        },
        block(id) {
            Swal.fire({
                title: 'Are you sure ?',
                text: "You wanted to block this driver",

                showCancelButton: true,
                confirmButtonColor: 'rgb(34 110 237 / 85%)',
                cancelButtonColor: '#ff2a00',
                confirmButtonText: 'Block'
            }, () => {
            }).then((result) => {
                if (result.value) {
                    axios.put('admin/web/block/driver/' + id, {
                        'status': '0'
                    }).then(response => {
                        this.getDriverData()
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
        unblock(id) {
            Swal.fire({
                title: 'Are you sure ?',
                text: "You wanted to unblock this driver",

                showCancelButton: true,
                confirmButtonColor: 'rgb(34 110 237 / 85%)',
                cancelButtonColor: '#ff2a00',
                confirmButtonText: 'Unblock'
            }, () => {
            }).then((result) => {
                if (result.value) {
                    axios.put('admin/web/unblock/driver/' + id, {
                        'status': '1'
                    }).then(response => {
                        this.getDriverData()
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
        backToList: function () {
            this.panel.allDrivers = true
            this.panel.detail = false
        }
    },
};
</script>
<style scoped>
.st-ad {
    white-space: nowrap;
    width: 150px;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>
