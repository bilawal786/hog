<template>
    <div class="panel panel-default card-view">
        <div class="panel-heading">
            <div class="pull-left">
                <h6 class="panel-title txt-dark">User List</h6>
            </div>
            <div class="pull-right">
                <a href="#" class="pull-left inline-block close-panel" data-effect="fadeOut">
                    <i class="zmdi zmdi-close"></i>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-wrapper collapse in">
            <div class="panel-body row">
                <div class="">
                    <div class="pl-15 pr-15 mb-15">
                        <div class="pull-left">
                            <i class="zmdi zmdi-accounts inline-block mr-10 font-16"></i>
                            <span class="inline-block txt-dark">Clients</span>
                        </div>
                        
                        <span class="inline-block txt-success pull-right weight-500">{{list.users}}</span>
                        <div class="clearfix"></div>
                    </div>
                    <hr class="light-grey-hr mt-0 mb-15" />
                    <div class="pl-15 pr-15 mb-15">
                        <div class="pull-left">
                            <i class="zmdi zmdi-truck inline-block mr-10 font-16"></i>
                            <span class="inline-block txt-dark">Drivers</span>
                        </div>
                        <span class="inline-block txt-success pull-right weight-500">{{list.drivers}}</span>
                        <div class="clearfix"></div>
                    </div>
                    <hr class="light-grey-hr mt-0 mb-15" />
                    <div class="pl-15 pr-15 mb-15">
                        <div class="pull-left">
                            <i class="zmdi zmdi-settings inline-block mr-10 font-16"></i>
                            <span class="inline-block txt-dark">Admins</span>
                        </div>
                        <span class="inline-block txt-success pull-right weight-500">{{list.admins}}</span>
                        <div class="clearfix"></div>
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
            list:null
        }
    },
    mounted(){
        this.getUserCount()
    },
    methods:{
        getUserCount: function(){
            axios.get('admin/web/admin/widget/user').then(response => {
                this.list = response.data
            })
        }
    }
}
</script>