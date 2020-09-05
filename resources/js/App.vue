<template>
    <div>
        <Navbar :app="this"></Navbar>
        <Spinner v-if="loading"></Spinner>
        <div v-else="initiate">
            <router-view :app="this"></router-view>
        </div>

    </div>
</template>

<script>
    import Navbar from "./components/Navbar";
    import Spinner from 'vue-simple-spinner'

    export default {
        name: 'App',
        components:{
            Navbar: Navbar,
            Spinner:Spinner
        },
        data(){
            return{
                user:null,
                loading:false,
                initiate: false,
                req: axios.create({
                    baseUrl :this.BASE_URL
                })
            }
        },
        created(){
            this.init();
        },

        methods:{
            init:function(){
                this.loading = true;
                this.req.get('/auth/init').then(response =>{

                    this.user = response.data.user
                    this.loading = false;
                    this.initiate = true;
                })
            }
        }
    }
</script>
