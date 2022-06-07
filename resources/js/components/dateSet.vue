<template>
    <div>
        {{this.SetDate(this.date, this.year)}}
    </div>
</template>
<script>
export default{
    props:{
        date:null,
        year:null
    },
    data(){
        return{

        }
    },
    methods:{
        SetDate: function(de, y){
            let d = new Date(de);
            let ye = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(d);
            let mo = new Intl.DateTimeFormat('en', { month: 'short' }).format(d);
            let da = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(d);
            if(y == 'yes'){
                return `${da}-${mo}-${ye}`;
            }else{
                return `${da}-${mo}`;
            }
            
        }
    }
}
</script>