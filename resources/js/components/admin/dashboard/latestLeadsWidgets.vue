<template>
    <div class="panel panel-default card-view panel-refresh">
        <div class="refresh-container">
            <div class="la-anim-1"></div>
        </div>
        <div class="panel-heading">
            <div class="pull-left">
                <h6 class="panel-title txt-dark">Process Leads</h6>
            </div>
            <div class="pull-right">
                <a href="#" class="pull-left inline-block refresh mr-15">
                    <i class="zmdi zmdi-replay"></i>
                </a>
                <a href="#" class="pull-left inline-block full-screen mr-15">
                    <i class="zmdi zmdi-fullscreen"></i>
                </a>
                <a href="#" class="pull-left inline-block close-panel" data-effect="fadeOut">
                    <i class="zmdi zmdi-close"></i>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-wrapper collapse in">
            <div class="panel-body row pa-0">
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Client Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Budget</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="lead in leads" :key="lead.id">
                                    <td><span class="txt-dark weight-500">{{lead.leads.Fname+' '+lead.leads.Lname}}</span></td>
                                    <td><set-date :date="lead.leads.trip_date" :year="'yes'"></set-date></td>
                                    <td><span class="txt-success">
                                        <set-time :date="lead.leads.trip_date"></set-time>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="txt-dark weight-500">${{lead.leads.cost}}</span>
                                    </td>
                                    <td>
                                        <span class="label label-primary" v-if="lead.status == 'assign'">Assign</span>
                                        <span class="label label-warning" v-if="lead.status == 'process'">Process</span>
                                        <span class="label label-danger" v-if="lead.status == 'reject'">Canceled</span>
                                        <span class="label label-success" v-if="lead.status == 'complete'">Complete</span>
                                    </td>
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
export default{
    data(){
        return{
            leads:null
        }
    },
    mounted(){
        this.getLatesLeadsWidget()
    },
    methods:{
        getLatesLeadsWidget: function(){
            axios.get('admin/web/admin/widget/leads/latest/5').then(response => {
                this.leads = response.data
            })
        }
    }
}
</script>
