<template>
    <div class="login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Login</div>

                        <div class="card-body">
                            <form @submit.prevent="makeLogin">


                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email"  required autocomplete="email" v-model="email">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" v-model="password">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">

                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" v-model="rememberMe">
                                            <label class="form-check-label" for="remember">
                                               Remember Me
                                            </label>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0 py-4">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                          Login
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        name: 'Login',
        props: ['app'],
        data(){
            return{
                email:null,
                password:null,
                rememberMe:null,
            }
        },
        methods:{
            makeLogin:function () {
                if(this.email && this.password){
                    const url = '/auth/login';
                    axios.post(url,{
                        email: this.email,
                        password: this.password,
                        remember_me: this.rememberMe,
                    }).then(response=>{
                        console.log(response)
                        this.app.user = response.data.user;
                    }).catch(error =>{
                        console.log(error)
                    })
                }
            }
        },
        created() {
            console.log(this.app)
        }

    }
</script>
