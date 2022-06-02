<template>
  <div>
    <div class="row" v-show="panel.allDrivers">
      <div class="col-sm-12">
        <div class="panel panel-default card-view">
          <div class="panel-heading">
            <div class="pull-left">
              <h6 class="panel-title txt-dark">Drivers List</h6>
            </div>
            <div class="pull-right">
              <button
                class="btn btn-primary"
                alt="default"
                data-toggle="modal"
                data-target=".bs-example-modal-lg"
              >
                New Driver
              </button>
              <div
                class="modal fade bs-example-modal-lg"
                tabindex="-1"
                role="dialog"
                aria-labelledby="myLargeModalLabel"
                aria-hidden="true"
                style="display: none"
              >
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-hidden="true"
                      >
                        ×
                      </button>
                      <h5 class="modal-title" id="myLargeModalLabel">
                        New Drivers
                      </h5>
                    </div>
                    <form>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label
                                for="recipient-name"
                                class="control-label mb-10"
                                >Name:</label
                              >
                              <input
                                type="text"
                                class="form-control"
                                v-model="create.name"
                              />
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label
                                for="recipient-name"
                                class="control-label mb-10"
                                >E-mail:</label
                              >
                              <input
                                type="email"
                                class="form-control"
                                v-model="create.email"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label
                                for="recipient-name"
                                class="control-label mb-10"
                                >Phone:</label
                              >
                              <input
                                type="text"
                                class="form-control"
                                v-model="create.phone"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label
                                for="recipient-name"
                                class="control-label mb-10"
                                >Address:</label
                              >
                              <textarea
                                class="form-control"
                                v-model="create.address"
                              ></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label
                                for="message-text"
                                class="control-label mb-10"
                                >Password:</label
                              >
                              <input
                                type="password"
                                class="form-control"
                                v-model="create.password"
                              />
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label
                                for="message-text"
                                class="control-label mb-10"
                                >Retype Password:</label
                              >
                              <input
                                type="password"
                                class="form-control"
                                v-model="create.comfirm_password"
                              />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button
                          type="button"
                          class="btn btn-default"
                          data-dismiss="modal"
                        >
                          Close
                        </button>
                        <button
                          type="button"
                          class="btn btn-success"
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
                        <td>{{ Date(driver.created_at).toLocaleString() }}</td>
                        <td>
                          <button
                            class="
                              btn btn-default btn-icon-anim btn-circle btn-sm
                            "
                          >
                            <i class="fa fa-pencil"></i>
                          </button>
                          <button class="btn btn-success btn-icon-anim btn-circle btn-sm" @click="showDriverDetail(driver.id)">
                            <i class="fa fa-eye"></i>
                          </button>
                          <button
                            class="
                              btn btn-primary btn-icon-anim btn-circle btn-sm
                            "
                          >
                            <i class="fa fa-lock"></i>
                          </button>
                          <button
                            class="btn btn-info btn-icon-anim btn-circle btn-sm"
                          >
                            <i class="icon-trash"></i>
                          </button>
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
    <div class="row" v-show="panel.detail">
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
                        <td>{{ driverDetail.created_at }}</td>
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
    showDriverDetail: function(id){
        this.panel.allDrivers = false
        this.panel.detail = true
        axios.get('admin/web/drivers/' + id).then(response => {
                this.driverDetail = response.data
                console.log(response)
            })
    },
    backToList: function(){
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