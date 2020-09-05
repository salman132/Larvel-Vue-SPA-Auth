<template>
    <div class="header">
       <div class="col-md-12">
           <div class="row">
               <div class="col-md-6 py-3">
                    <router-link :to="{ name: 'Welcome'}">My Website</router-link>
               </div>
               <div class="col-md-6">
                   <nav class="navbar navbar-expand-lg navbar-light bg-light">

                       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                       </button>
                       <div class="collapse navbar-collapse" id="navbarNav">
                           <ul class="navbar-nav">
                                <li class="nav-item">
                                    <router-link :to="{ name: 'Welcome'}" class="nav-link">Home</router-link>
                                </li>
                               <li class="nav-item">
                                   <a class="nav-link" href="#">Features</a>
                               </li>
                               <li class="nav-item">
                                   <a class="nav-link" href="#">Pricing</a>
                               </li>
                               <li class="nav-item dropdown">
                                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       {{ app.user ? app.user.name : 'Account' }}
                                   </a>
                                   <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                       <router-link :to="{name: 'Register'}" class="dropdown-item" v-if="!app.user">Register</router-link>

                                       <router-link :to="{name: 'Login'}" class="dropdown-item" v-if="!app.user">Login</router-link>
                                       <a class="dropdown-item" href="#" v-if="app.user" @click="logout">Logout</a>
                                   </div>
                               </li>
                           </ul>
                       </div>
                   </nav>
               </div>
           </div>
       </div>
    </div>
</template>


<script>
    export default {
        name: 'Navbar',
        props: ['app'],
        data(){
            return{

            }
        },
        methods:{
            logout:function () {
                const url = 'auth/logout';
                this.app.req.post(url).then(()=>{
                    this.app.user = null;
                    this.$router.push({name: 'Login'});
                })
            }
        }
    }
</script>
