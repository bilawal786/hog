<template>
    <div>
        {{this.SetTime(this.date)}}
    </div>
</template>
<script>
export default{
    props:{
        date:null,
    },
    data(){
        return{

        }
    },
    methods:{
        SetTime: function(de, f){
            let d = new Date(de);
            let ho = new Intl.DateTimeFormat('en', { hour: '2-digit', minute: '2-digit' }).format(d);
            return `${ho}`;
        }
    }
}
</script>