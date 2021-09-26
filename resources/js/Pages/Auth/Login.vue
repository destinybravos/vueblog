<template>
    <div class="min-h-screen w-full bg-gradient-to-br from-blue-900 to-blue-700 flex items-center justify-center">
        <div class="w-11/12 sm:w-9/12 md:w-2/5 lg:w-1/3 bg-gray-100 rounded p-4">
            <form @submit.prevent="loginUser()" class="pt-4">
                <div v-if="form.error">
                    sdsdsd
                </div>
                <div :class="form_group">
                    <label for="email" :class="labels">
                        <font-awesome :icon="['far', 'envelope']" /> Email Address
                    </label>
                    <input type="text" id="email" :class="inputs" v-model="form.email">
                </div>
                <div :class="form_group">
                    <label for="password" :class="labels">
                        <font-awesome :icon="['fas', 'key']" /> Password
                    </label>
                    <input type="password" id="password" :class="inputs" v-model="form.password">
                </div>
                <div :class="form_group">
                    <input type="checkbox" id="remember" v-model="form.remember">
                    <label for="remember" :class="labels" class="font-normal"> Remember Me </label>
                </div>
                <div :class="form_group">
                    <button type="submit" :class="btns" class="bg-blue-800 text-white">
                        <font-awesome :icon="['fas', 'sign-in-alt']" /> Sign In
                    </button>
                </div>
                <div class="flex items-center gap-5 my-8 sm:my-2">
                    <hr class="flex-grow">
                    <span class="flex-initial font-semibold">Or Sign In with</span>
                    <hr class="flex-grow">
                </div>

                <div class="grid grid-cols-2 gap-5 my-8 sm:my-4">
                    <a :href="route('google.auth.in')" class="flex items-center border bg-gray-50 rounded py-1 px-4 font-bold font-serif">
                        <img src="/img/google.webp" alt=" " class="h-6 w-6 mr-2"> Google
                    </a>
                    <a :href="route('facebook.auth.in')" class="flex items-center border bg-blue-900 text-white rounded py-1 px-4 font-bold font-san">
                        <img src="/img/fb_logo.png" alt=" " class="h-6 w-6 mr-2"> Facebook
                    </a>
                </div>
                <div class="text-center text-sm cursor-pointer text-blue-600 animate-pulse">
                    <Link :href="route('register')">
                        Don't have an account, Sign Up.
                    </Link>
                </div>
            </form>

            <div>
                
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'

export default {
    components:{
        Link,
        JetAuthenticationCardLogo
    },
    data(){
        return {
            form_group:'mb-4',
            inputs:'w-full h-8 rounded px-3 block',
            labels:'mb-1 font-bold',
            btns: 'px-4 py-1 rounded',
            form: this.$inertia.form({
                email : '',
                password : '',
                remember: false,
            }),
            errors:{
                email:[],
                password:[]
            }
        }
    },
    mounted(){
    },
    methods: {
        loginUser(){
            axios.get('/sanctum/csrf-cookie') //Set thr session cookies for CSRF-Token
            .then(() => {
                this.form.transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(route('login'), {
                        onFinish : () => {
                            this.form.reset('email', 'password');
                        }
                    })
            });


            // USING INERTIA HTTP REQUEST METHOD
            // this.$inertia.post(route('login'), this.form)

            // USING AXIOS METHOD
            // let formData = {
            //     email: this.email,
            //     password: this.password,
            //     remember: this.remember == true ? 'on':''
            // }
            // axios.post(route('login'), formData)
            // .then(res => {
            //     if(res.data.status == 'success'){
            //         localStorage.token = res.data.result.apitoken;
            //         this.$inertia.visit(route('dashboard'));
            //     }else{
            //         alert('An Error occured!')
            //     }
            // })
            // .catch(err => {
            //     if (err.response) {
            //         this.errors = err.response.data.errors
            //     } else {
            //         console.log('Network Error');
            //     }
            // })
        }
    }
}
</script>

<style>

</style>