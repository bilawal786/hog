<template>
    <div class="panel panel-default card-view">
        <div class="panel-heading">
            <div class="pull-left">
                <h6 class="panel-title txt-dark">Ride Requests</h6>
            </div>
            <div class="pull-right">
                <a href="#" class="pull-left inline-block close-panel" data-effect="fadeOut">
                    <i class="zmdi zmdi-close"></i>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-wrapper collapse in">
            <div class="panel-body">
                <div>
                    <span class="pull-left inline-block capitalize-font txt-dark">
                        User Requests
                    </span>
                    <span class="inline-block txt-primary pull-right weight-500">{{list.users}}</span>
                    <div class="clearfix"></div>
                    <hr class="light-grey-hr row mt-10 mb-10" />
                    <span class="pull-left inline-block capitalize-font txt-dark">
                        Guest Requests
                    </span>
                    <span class="inline-block txt-primary pull-right weight-500">{{list.guests}}</span>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default{
    data(){
        return{
            list:null
        }
    },
    mounted(){
        this.getUnsignedRequest()
    },
    methods:{
        getUnsignedRequest: function(){
            axios.get('admin/web/admin/widget/leads/unassign').then(response => {
                this.list = response.data
            })
        }
    }
}
</script>